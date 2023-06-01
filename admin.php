<?php
session_start();
include 'vendor/components/connect.php';
if($_SESSION['user']['status'] != 1){
    header("Location:index.php");
}
if(empty($_GET['upd'])){
    $href = 'admin.php';
 } else {
    $href = $_SERVER['HTTP_REFERER'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deep Art</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <? include "vendor/components/header.php" ?>
    <main>
        <div class="adm">
            <div class="adm_nav">
            <? 
            if(empty($_GET)){
                echo '<a href="?mod" class="a_btn">Модерация отзывов</a>';
                echo '<a class="a_btn" href="?masters">Мастера</a>';
                echo '<a class="a_btn" href="?uslugi">Услуги</a>';
                echo '<a class="a_btn" href="?zap">Записи</a>';
            } elseif(isset($_GET['amstel'])) {
                echo '<a style="margin-bottom:20px;" class="a_btn" href="?masters">Вернуться назад</a>';
            } else {
                echo '<a style="margin-bottom:20px;" class="a_btn" href="'.$href.'">Вернуться назад</a>';
            }
            echo '</div>';
            echo '<div class="adm_section">';

            if(isset($_GET['masters'])){
                include 'vendor/components/admin/addMast.php';
            }

            if(isset($_GET['uslugi'])){
                include 'vendor/components/admin/addUslugi.php';
            }
            if(isset($_GET['gallary'])){
                include 'vendor/components/admin/gallary.php';
            }

            if(isset($_GET['zap'])){
                echo '<div class="zap_teble"></div>';
            }

            if(isset($_GET['upd_master'])){
                include 'vendor/components/admin/upd_master.php';
            }

            if(isset($_GET['upd_uslugi'])){
                include 'vendor/components/admin/upd_uslugi.php';
            }
            
            if(isset($_GET["mod"])){
                include 'vendor/components/admin/moder_rev.php';
            }

            ?>
            </div>
        </div>
    </main>
    <? include "vendor/components/footer.php" ?>
    <div ID = "toTop"> ^ Наверх </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/toTop.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>