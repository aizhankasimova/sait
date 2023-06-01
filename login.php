<? 
session_start();
include 'vendor/components/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/log_reg.css">
</head>

<body>
    <? include "vendor/components/header.php" ?>
    <main class="all">
        <div class="login_form">
            <div class="login_top">
                <div class="login_button">
                    <button id="login_button_one">Вход</button>
                </div>
                <div class="registration_button">
                    <button id="reg_button_one">Регистрация</button>
                </div>
            </div>
            <div class="login_bottom">
                <form class="form_autorization" action="" method="post">
                    <input name="email" class="login_email" type="email" placeholder="Введите ваш E-mail" required>
                    <input name="password" class="login_password" type="text" placeholder="Введите ваш пароль" required>
                    <div class="autorization_button">
                        <button type="submit" name="login">Войти на сайт</button>
                    </div>
                    <div id="errLog"></div>
                </form>
            </div>
        </div>
        <div class="registration_form">
            <div class="reg_form_left">
                <div class="reg_form_top">
                    <div class="reg_form_log_reg">
                        <div class="login_button">
                            <button id="login_button_two">Вход</button>
                        </div>
                        <div class="registration_button">
                            <button id="reg_button_two">Регистрация</button>
                        </div>
                    </div>
                </div>
                <div class="form_reg">
                    <form class="form_reg_fiz" action="" method="post">
                        <input name="email" class="reg_email" type="text" placeholder="Введите ваш E-mail" required>
                        <input name="password" class="reg_password" type="text" placeholder="Введите ваш пароль" required>
                        <input name="tel" class="reg_tel" type="text" placeholder="Введите номер телефона" required>
                        <input name="name" class="reg_fio" type="text" placeholder="Введите Имя" required>
                        <div class="registration_buttontwo">
                            <button type="submit" name="registration">Зарегистрироваться</button>
                        </div>
                        <div id="erconts"></div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <? include "vendor/components/footer.php" ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="/assets/js/login.js"></script>
</body>

</html>