<?php
session_start(); 
include 'vendor/components/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEAUTY STUDIO</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.google.com/?preview.size=24" type="text/css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main>
        <p id="" class="p_article">Cтудия моделирования взгляда</p>
        <div class="block_slider">
            <div class="slider">
                <div class="line_slider">
                    <picture><img class="slider_img" src="vendor/images/13.png" alt=""></picture>
                    <picture><img class="slider_img" src="vendor/images/14.png" alt=""></picture>
                    <picture><img class="slider_img" src="vendor/images/15.png" alt=""></picture>
                </div>
                <div class="slider_buttons">
                    <button id="prev" class="slider_button"> <img src="vendor/images/short_right.png" alt=""> </button>
                    <button id="next" class="slider_button"> <img class="rotate" src="vendor/images/short_right.png"></button>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="about">
            <p id="p_about" class="p_articles">О Нас</p>
            <div class="abouts">
                <div class="abouts-one">
                    <div class="abouts-text-one">
                        <h1 id="h_abouts" class="h_abouts-one">О cалоне красоты</h1>
                        <p id="p_abouts" class="p_abouts-one"> Салон красоты «BEAUTY STUDIO» рад открыть свои двери перед ценителями прекрасного! Мы работаем для того, чтобы делать мир красивее, а вас, наши дорогие посетители, еще и счастливее.
                            Вы будете крайне удивлены, узнав, что способны выглядеть обворожительно, не утратив при этом естественность. Каждый человек природой задуман уникальным, каждый обладает своим собственным набором черт, которые очаровывают других. Не стоит терять свою природную уникальность. </p>
                    </div>
                    <img class="img-abouts-right" src="vendor/images/8.jpg" alt="">
                </div>
                <div class="abouts-two">
                    <img class="img-abouts-left" src="vendor/images/7.jpg" alt="">
                    <div class="abouts-text-two">
                        <h1 id="h_abouts" class="h_abouts-two">Деятельность салоны</h1>
                        <p id="p_abouts" class="p_abouts-two"> BEAUTY STUDIO представляет уникальную концепцию студии, специализирующейся на дизайне ресниц, бровей.Мы на самом высоком уровне воплощаем в реальность пожелания гостей! К вашим услугам только дипломированные мастера.Мы предлагаем полный спектр lash & brow услуг: наращивание ресниц, ламинирование ресниц, уход за бровями – ламинирование бровей,моделирование бровей, окрашивание бровей и коррекция бровей. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="articles">
            <p id="p_price" class="p_articles">Услуги</p>
            <div class="articles_art">
                <?php 
                        $uslugi = $link->prepare("SELECT * FROM `uslugi`");
                        $uslugi->execute();
                        foreach($uslugi->fetchAll(PDO::FETCH_ASSOC) as $usl){
                ?>
                <div class="articles_about">
                    <a href="usluga.php?id_usl=<? echo $usl['id'] ?>"><img class="img_articles" src="vendor/images/<? echo $usl['img'] ?>" alt=""></a>
                    <p class="a_articles"><? echo $usl['title'] ?> </p>
                    <p class="a_articles"><? echo $usl['price'] ?> </p>
                    <a href="">
                        <div class="articles_about_button">
                            <a href="usluga.php?id_usl=<? echo $usl['id'] ?>"><p>Подробнее</p></a>
                        </div>
                    </a>
                </div>
                <? } ?>
            </div>
        </div>
        <div class="text_center" id="p_master">

            <p id="speci" class="p_cent_two">Наши специалисты</p>
            <div class="border"></div>
        </div>
        <div class="master">
            <?php
            $masters = $link->prepare("SELECT * FROM `masters`");
            $masters->execute();
            foreach($masters->fetchAll(PDO::FETCH_ASSOC) as $master){
            ?>
                <div class="master_card">
                    <div class="master_foto">
                        <picture><a href="masters.php?id_master=<?php echo $master['id'] ?>"><img src="vendor/images/<?php echo $master['foto'] ?>" alt=""></a></picture>
                    </div>
                    <div class="about_master">
                        <p><?php echo $master['name'] ?></p>
                        <p>Специализация:</p>
                            <?php
                                $uslugi = $link->prepare("SELECT * FROM `uslugi` WHERE `id` IN (SELECT `id_usl` FROM `styles` WHERE `id_master` = ?)");
                                $uslugi->execute(array($master['id']));
                                foreach($uslugi->fetchAll(PDO::FETCH_ASSOC) as $usl){
                            ?>
                            <p class="about_ser"><?php echo $usl['title'] ?></p>
                            <?php }  ?>
                        <p>Опыт работы: <?php echo $master['stage'] ?></p>
                    </div>
                </div>
            <? }  ?>
        </div>
        <p id="p_question" class="p_articles">Задать вопрос</p>
        <form class="form" method="post">
            <input name="name" class="input" type="text" placeholder="Введите ваше Имя" required></input><br>
            <input name="email" class="input" type="email" placeholder="Введите ваш E-mail" required></input><br>
            <input name="tel" class="input" type="tel" placeholder="Введите ваш Номер телефона" required></input><br>
            <textarea name="message" class="area" placeholder="Введите ваше сообщение"></textarea><br>
            <input name="otp" class="a_question" type="submit" value="Отправить">
            <div id="erconts"></div>
        </form>
        <p id="p_contact" class="p_articles">Контакты</p>
        <div class="contact">
            <div class="contact-left">
                <div class="contacts">
                    <h1 class="h_contacts"> Контакты "Beauty Studio"</h1>
                    <p id="p_contacts" class="p_contacts-one">Адрес: г.Омск, Гагарина 10</p>
                    <p id="p_contacts" class="p_contacts-two">Телефон: 8-908-754-75-87</p>
                    <p id="p_contacts" class="p_contacts-three">Режим работы: Ежедневно с 10:00 до 22:00 </p>
                    <p id="p_contacts" class="p_contacts-three">mail: beautystudio55.com </p>
                </div>
            </div>
            <div class="contact-right">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2224.102315697447!2d73.37736628545737!3d54.98583906853459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43aafe1a80e84ef1%3A0x2addd6e022097507!2z0J7QvNGB0LrQuNC5INCw0LLRgtC-0YLRgNCw0L3RgdC_0L7RgNGC0L3Ri9C5INC60L7Qu9C70LXQtNC2!5e0!3m2!1sru!2sru!4v1652973600656!5m2!1sru!2sru" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/slider.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="assets/js/feedback.js"></script>
</body>

</html>