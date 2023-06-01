<?php
include '../components/connect.php';
if (isset($_POST['add'])) {
    // проверяем, были ли загружены файлы
    if (isset($_FILES['foto'])) {

        // определяем количество загруженных файлов
        $file_count = count($_FILES['foto']['name']);

        // проходим в цикле по каждому файлу
        for ($i = 0; $i < $file_count; $i++) {

            // проверяем, был ли файл успешно загружен
            if ($_FILES['foto']['error'][$i] == UPLOAD_ERR_OK) {

                // получаем имя и расширение файла
                $file_name = $_FILES['foto']['name'][$i];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                // генерируем уникальное имя файла
                $new_file_name = uniqid() . '.' . $file_ext;

                // определяем путь для сохранения файла
                $upload_dir = '../images/';
                $upload_file = $upload_dir . $new_file_name;

                // перемещаем загруженный файл в указанную директорию
                move_uploaded_file($_FILES['foto']['tmp_name'][$i], $upload_file);
                $sql = $link->query("INSERT INTO `gallary`(`id_master`, `img`) VALUES ('{$_POST['id_master']}','$new_file_name')");
                // сохраняем информацию о файле в базу данных или выполняем другие операции
                header('Location:../../admin.php?id='.$_POST['id_master'].'&gallary=1&amstel=1');
            } else {
                // обрабатываем ошибку загрузки файла
                echo "Ошибка загрузки файла: " . $_FILES['foto']['error'][$i];
            }
        }
    }
}
if(isset($_GET['id'])){
    $sql = $link->query("DELETE FROM `gallary` WHERE `id` = '{$_GET['id']}'");
    header('Location:../../admin.php?id='.$_POST['id_master'].'&gallary=1&amstel=1');
}