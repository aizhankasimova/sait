<?
session_start(); 
include 'vendor/components/connect.php';
$masters = $link->prepare("SELECT * FROM `masters` WHERE `id` = ?");
$masters->execute(array($_GET['id_master']));
$master = $masters->fetch(PDO::FETCH_ASSOC);
$gallarys = $link->prepare("SELECT * FROM `gallary` WHERE `id_master` = ?");
$gallarys->execute(array($_GET['id_master']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $master['name'] ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.google.com/?preview.size=24" type="text/css">
    <link rel="stylesheet" href="/assets/css/usl_masters.css">
    <link rel="stylesheet" href="/assets/plagins/jquery-ui/jquery-ui.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="main_mas">
        <p id="" class="p_articles"><? echo $master['name'] ?></p>
        <div class="usluga">
            <div class="usl_title">
                <div class="ust">
                    <div class="mas_text">
                        <div class="mas_har">
                            <div class="mas_stage">
                                <h2>Опыт работы:</h2>
                                <p><? echo $master['stage'] ?></p>
                            </div>
                            <div class="mas_style">
                                <h2>Специализация:</h2>
                                <?php
                                $uslugi = $link->prepare("SELECT * FROM `uslugi` WHERE `id` IN (SELECT `id_usl` FROM `styles` WHERE `id_master` = ?)");
                                $uslugi->execute(array($_GET['id_master']));
                                foreach ($uslugi->fetchAll(PDO::FETCH_ASSOC) as $usl) {
                                ?>
                                    <p class="about_ser"><?php echo $usl['title'] ?></p>
                                <? }  ?>
                            </div>
                        </div>
                        <div class="mas_text">
                            <p><? echo $master['desc'] ?></p>
                        </div>
                    </div>
                    <div class="foto">
                        <picture><img src="vendor/images/<? echo $master['foto'] ?>" alt=""></picture>
                    </div>
                </div>
            </div>
        </div>
        <? if ($gallarys->rowCount() > 0) { ?>
            <p id="" class="p_articles">Работы мастера</p>
            <div class="block_slider">
                <div class="slider">
                    <div class="line_slider">
                        <? foreach($gallarys->fetchAll(PDO::FETCH_ASSOC) as $gallary){ ?>
                            <picture><img class="slider_img" src="vendor/images/<? echo $gallary['img'] ?>" alt=""></picture>
                        <? } ?>
                    </div>
                    <div class="slider_buttons">
                        <button id="prev" class="slider_button"> <img src="vendor/images/short_right.png" alt=""> </button>
                        <button id="next" class="slider_button"> <img class="rotate" src="vendor/images/short_right.png"></button>
                    </div>
                </div>
            </div>
        <? } ?>
        <? if(isset($_SESSION['user'])){ ?>
    <p id="p_zap" class="p_articles">Записаться</p>
    <div class="zap">
        <div class="feedback_form" id="form_two">
            <form class="form_feedback" method="post">
                <span>Ваше имя:</span>
                <input type="text" placeholder="Ваше имя*" class="input_name" name="name" value="<?=$_SESSION['user']['name'] ?>" required>
                <span>Ваш email:</span>
                <input type="email" placeholder="Email" id="em" class="input_email" name="email" value="<?=$_SESSION['user']['email'] ?>"required>
                <span>Ваш номер телефона:</span>
                <input type="tel" placeholder="Телефон*" class="input_tel" name="tel" value="<?=$_SESSION['user']['tel'] ?>" required>
                <input type="hidden" name="id_master" value="<?=$master['id'] ?>">
                <input type="hidden" name="name_master" value="<?=$master['name'] ?>">
                <span>Выберите дату и время:</span>
                <div class="date">
                    <input name="date" type="text" class="datepicker" placeholder="Выберите дату" readonly required>
                </div>
                <div class="time">

                </div>
                <input type="hidden" class="time_input" name="time" value="">
                <input type="submit" value="Отправить" class="input_submit" name="send">
                <div class="erconts"></div>
            </form>
        </div>
    </div>
    <? } else { echo '<p id="p_zap" class="p_articles"><a style="color:#BB8C5F;" href="login.php">Авторизуйтесь</a> для того чтобы записаться</p>'; } ?>
    </main>
    <? include 'vendor/components/footer.php' ?>
    <script src="/assets/plagins/jquery-ui/external/jquery/jquery.js"></script>
    <script src="/assets/js/slider.js"></script>
    <script src="/assets/js/feedback.js"></script>
    <script src="/assets/plagins/jquery-ui/jquery-ui.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>