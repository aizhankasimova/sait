<header>
    <div class="logo">
        <div class="deep">
            <a href="index.php">
                <p class="a_deep" href="">YONI</p>
                <p class="a_tattoo" href="">Beauty Studio</p>
            </a>
        </div>
    </div>
    <nav class="header">
        <div class="navigation">
            <ul id="drop_menu" class="menu">
                <li id="li_navigation" class="li_navigation"><a class="a_navigation" href="/index.php">Главная</a></li>
                <li class="li_navigation"><a class="a_navigation" href="/index.php #p_about">О студии</a></li>
                <li id="li_navigation" class="li_navigation"><a class="a_navigation" href="/index.php #p_price">Услуги</a></li>
                <li id="li_navigation" class="li_navigation"><a class="a_navigation" href="/index.php #speci">Мастера</a></li>
                <li id="li_navigation" class="li_navigation"><a class="a_navigation" href="/index.php #p_question">Задать вопрос</a></li>
                <li class="li_navigation"><a class="a_navigation" href="/index.php #p_contact">Контакты</a></li>
                <?php 
                if(isset($_SESSION['user'])){
                ?>
                <?php if($_SESSION['user']['status'] == 1){ ?>
                <li class="li_navigation"><a class="a_navigation" href="/admin.php">Админ панель</a></li>
                <?php } ?>
                <li class="li_navigation"><a class="a_navigation" href="/reviews.php">Отзывы</a></li>
                <li class="li_navigation"><a class="a_navigation" href="/zap.php">Мои записи</a></li>
                <li class="li_navigation"><a class="a_navigation" href="/vendor/action/logOut.php">Выход</a></li>
                <?php 
                } else {
                ?>
                <li class="li_navigation"><a class="a_navigation" href="/login.php">Авторизация</a></li>
                <?php 
                }
                ?>
            </ul>
        </div>
        <button onclick="myFunction()" class="dropbutton">Меню</button>
    </nav>
</header>