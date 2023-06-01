<?php
session_start();
include 'vendor/components/connect.php';
$filename = 'reviews.php';
$carpet = $link->prepare("SELECT * FROM `carpet` WHERE `id_user` = ? AND `status` = ?");
$carpet->execute(array($_SESSION['user']['id'], 1));
$reviewsU = $link->prepare("SELECT * FROM `rewiews` WHERE `id_user` = ?");
$reviewsU->execute(array($_SESSION['user']['id']));
$revArr = $reviewsU->fetch(PDO::FETCH_ASSOC);
$page = $_GET['page'];
if (empty($_GET['page'])) {
    $page = 1;
}
$kol = 5; //количество записей для вывода
$art = ($page * $kol) - $kol; // определяем, с какой записи нам выводить
$res = $link->prepare("SELECT COUNT(*) FROM `rewiews` WHERE `status` = ?");
$res->execute(array(0));
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
    <div class="all">
        <section>
            <h1 style="text-align: center;">Отзывы</h1>
            <div class="tovar_rev_block">
                <? if ($_SESSION['user']) : ?>
                    <div class="tovar_rev">
                        <?
                        if ($carpet->rowCount() > 0) :
                            if ($reviewsU->rowCount() == 0) :
                        ?>
                                <a class="add_rev" href="add_review.php">Добавить отзыв</a>
                                <? else :
                                if ($revArr['status'] == 0) :
                                ?>
                                    <a class="add_rev" href="add_review.php">Изменить отзыв</a>
                                <? endif;
                                if ($revArr['status'] == 1) : ?>
                                    <a class="add_rev" href="add_review.php">Ваш отзыв заблокирован. Измените его для рассмотрения на разблокировку</a>
                                <? endif;
                                if ($revArr['status'] == 2) : ?>
                                    <span>Ваш отзыв на рассмотрении на разблокировку</span>
                                <? endif;
                                if ($revArr['status'] == 3) : ?>
                                    <span>Ваш отзыв заблокирован</span>
                            <? endif;
                            endif;  ?>

                        <? else : ?>
                            <div style="text-align: center;" class="rev_title">После оказания услуги можно оставить отзыв</div>
                        <? endif; ?>
                    </div>
                <? else : ?>
                    <div class="tovar_rev">
                        <div style="text-align: center;" class="rev_title"><a href="login.php">Авторизуйтесь</a> чтобы оставить отзыв</div>
                    </div>
                <? endif; ?>
                <?
                $rewiews = $link->prepare("SELECT * FROM `rewiews` WHERE `status` = ? LIMIT $art,$kol");
                $rewiews->execute(array(0));
                $arrRewiews = $rewiews->fetchAll(PDO::FETCH_ASSOC);
                if ($rewiews->rowCount() == 0) :
                ?>
                    <div class="tovar_rev">
                        <div style="text-align: center;" class="rev_title">Отзывов нет</div>
                    </div>
                    <?
                endif;
                foreach ($arrRewiews as $review) :
                    $user = $link->prepare("SELECT * FROM `users` WHERE `id` = ?");
                    $user->execute(array($review['id_user']));
                    $user = $user->fetch(PDO::FETCH_ASSOC);
                    if ($review['status'] == 0) :
                    ?>
                        <div class="tovar_rev">
                            <div class="rev_header">
                                <div class="rev_user_name"><?= $user['name'] ?></div>
                                <div class="rev_date"><?= $review['date'] ?></div>
                            </div>
                            <div class="stars">
                                <? if ($review['estimation'] == 1) : ?>
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                <? endif; ?>
                                <? if ($review['estimation'] == 2) : ?>
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                <? endif; ?>
                                <? if ($review['estimation'] == 3) : ?>
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                <? endif; ?>
                                <? if ($review['estimation'] == 4) : ?>
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star.png" alt="">
                                <? endif; ?>
                                <? if ($review['estimation'] == 5) : ?>
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                    <img src="vendor/images/star_bacg.png" alt="">
                                <? endif; ?>
                            </div>
                            <div class="rev_body">
                                <div class="rev_plus">
                                    <div class="rev_title">Достоинства:</div>
                                    <div class="rev_desc"><?= $review['plus'] ?></div>
                                </div>
                                <div class="rev_minus">
                                    <div class="rev_title">Недостатки:</div>
                                    <div class="rev_desc"><?= $review['minus'] ?></div>
                                </div>
                                <div class="rev_comment">
                                    <div class="rev_title">Комментарий:</div>
                                    <div class="rev_desc"><?= $review['comment'] ?></div>
                                </div>
                                <? if ($review['answer'] != '0') : ?>
                                    <input data-id="<?= $review['id'] ?>" type="submit" class="add_rev" value="Посмотреть ответ администратора">
                                <? endif; ?>
                            </div>
                            <? if ($_SESSION['user']['status'] == 1) : ?>
                                <div class="mod_rev">
                                    <form action="vendor/action/admin/reviews.php" method="post">
                                        <input type="hidden" name="id" value="<?= $review['id'] ?>">
                                        <? if ($review['answer'] == '0') : ?>
                                            <span>Ответить на отзыв:</span>
                                            <textarea name="otv_rev" id="" cols="30" rows="2"></textarea>
                                            <input type="submit" name="answer" value="Добавить ответ">
                                        <? else : ?>
                                            <input type="submit" name="del_answer" value="Удалить ответ на отзыв">
                                        <? endif; ?>
                                        <input type="submit" name="ban_rev" value="Забанить отзыв">
                                    </form>
                                </div>
                            <? endif; ?>
                        </div>
                        <? if ($review['answer'] != '0') : ?>
                            <div data-id="<?= $review['id'] ?>" class="answer_rew">
                                <div class="tovar_rev">
                                    <div class="rev_header">
                                        <div class="rev_user_name">Ответ администратора</div>
                                    </div>
                                    <div class="rev_body">
                                        <div class="rev_comment">
                                            <div class="rev_desc"><?= $review['answer'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? endif; ?>
                <? endif;
                endforeach; ?>
                <? include 'vendor/components/nav_block_pagination.php' ?>
            </div>
        </section>
    </div>
    <? include "vendor/components/footer.php" ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>