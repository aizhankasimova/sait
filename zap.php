<?php
session_start();
include 'vendor/components/connect.php';
$filename = 'zap.php';
$page = $_GET['page'];
if(empty($_GET['page'])){
    $page = 1;
}
$kol = 10; //количество записей для вывода
$art = ($page * $kol)-$kol; // определяем, с какой записи нам выводить
$res = $link->prepare("SELECT COUNT(*) FROM `carpet` WHERE `id_user` = ?");
$res->execute(array($_SESSION['user']['id']));
$row = $res->fetch(PDO::FETCH_ASSOC);
$total = $row["COUNT(*)"]; // всего записей
$str_pag = ceil($total / $kol); //узнаем сколько страниц будет
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deep Art</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <? include "vendor/components/header.php" ?>
    <main class="all">
        <section class="my_orders">
            <?
            $carpets = $link->prepare("SELECT * FROM `carpet` WHERE `id_user` = ? ORDER BY `carpet`.`status` ASC LIMIT $art,$kol");
            $carpets->execute(array($_SESSION['user']['id']));
            $array = $carpets->fetchAll(PDO::FETCH_ASSOC);
            foreach($array as $carpet):
                $date = date('d-m-Y', strtotime($carpet['date']));
            ?>
                <div class="block_my_order">
                    <div class="my_order_header">
                        <div class="info_my_order">
                            <div class="name_my_order">Запись GG-<?= $carpet['id'] ?> на <?= $date ?></div>
                            <div class="status_my_order"><? if ($carpet['status'] == 0) {echo 'Вы записаны';} elseif ($carpet['status'] == 1) {echo 'Услуга оказана';} elseif ($carpet['status'] == 2) {echo 'Отменена';} ?></div>
                        </div>
                        <form method="POST" action="vendor/action/cancel_rev.php" class="order_header_del_btn">
                            <input type="hidden" name="id_order" value="<?= $carpet['id'] ?>">
                            <? if ($carpet['status'] == 0) : ?>
                                <input type="submit" name="canc_order" class="btn_del_order" value="Отменить">
                            <? endif; ?>
                        </form>
                    </div>
                    <?
                    $masters = $link->prepare("SELECT * FROM `masters` WHERE `id` = ?");
                    $masters->execute(array($carpet['id_master']));
                    $master = $masters->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="order_body order_body_click">
                        <div class="order_price_block">
                            <div class="order_price">Вы записаны на <?= $carpet['time'] ?></div>
                            <div class="order_price">Мастер - <?= $master['name']?></div>
                        </div>
                    </div>
                </div>
            <?
            endforeach;
            ?>
            <? include 'vendor/components/nav_block_pagination.php' ?>
            <? if ($carpets->rowCount() == 0) : ?>
                <div class="tovar_rev_block">
                    <div class="tovar_rev">
                        <div style="text-align: center;" class="rev_title">Вы еще не записывались</div>
                    </div>
                </div>
            <? endif; ?>
        </section>
    </main>
    <? include "vendor/components/footer.php" ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>