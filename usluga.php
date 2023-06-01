<?
session_start(); 
include 'vendor/components/connect.php';
$id_usl = $_GET['id_usl'];
$uslugi = $link->prepare("SELECT * FROM `uslugi` WHERE `id` = ?");
$uslugi->execute(array($_GET['id_usl']));
$usl = $uslugi->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $usl['title'] ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.google.com/?preview.size=24" type="text/css">
    <link rel="stylesheet" href="/assets/css/usl_masters.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="main_usl">
        <p id="" class="p_articles"><? echo $usl['title'] ?></p>
        <div class="usluga">
            <div class="usl_title">
                <div class="ust">
                    <div class="ust_left">
                        <div class="ust_price">
                            <h1>Стоимость: <? echo $usl['price'] ?></h1>
                        </div>
                        <div class="ust_text"><? echo $usl['text'] ?></div>
                    </div>
                    <div class="foto">
                        <picture><img src="vendor/images/<? echo $usl['img'] ?>" alt=""></picture>
                    </div>
                </div>
                <p id="" class="p_articles">мастер который оказывает услугу</p>
                <div class="master_usl">
                    <? 
                    $masters = $link->prepare("SELECT * FROM `masters` WHERE `id` IN (SELECT `id_master` FROM `styles` WHERE `id_usl` = ?)");
                    $masters->execute(array($_GET['id_usl']));
                    foreach($masters->fetchAll(PDO::FETCH_ASSOC) as $master){
                    ?>
                    <div class="master_card">
                        <div class="master_foto">
                            <picture><a href="masters.php?id_master=<? echo $master['id'] ?>"><img src="vendor/images/<? echo $master['foto'] ?>" alt=""></a></picture>
                        </div>
                        <div class="about_master">
                            <p><? echo $master['name'] ?></p>
                            <p>Опыт работы: <? echo $master['stage'] ?></p>
                        </div>
                    </div>
                    <? }  ?>
                </div>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
    <script src="assets/js/delGET.js"></script>
</body>

</html>