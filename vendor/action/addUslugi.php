<?php
include "../components/connect.php";

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $text = $_POST['text'];
    $style = $_POST['style'];
    $fileName =  md5($_FILES['foto']['name'].time()*100) . ".jpg" ;
    $tempName = $_FILES ['foto']['tmp_name'];
    $folder = "../images/" . $fileName ;
    $sql = $link->prepare("INSERT INTO `uslugi`(`title`, `price`, `text`, `img`) VALUES (?,?,?,?)");
    $sql->execute(array($title,$price,$text,$fileName));
    move_uploaded_file($tempName,$folder);
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['upd'])){
    if(file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $fileName =  md5($_FILES['foto']['name'].time()*100) . ".jpg" ;
        $tempName = $_FILES ['foto']['tmp_name'];
        $folder = "../images/" . $fileName ;
    } else {
        $fileName = $_POST['filename'];
    }
    $sql = $link->query("UPDATE `uslugi` SET `title`='{$_POST['title']}',`price`='{$_POST['price']}',`text`='{$_POST['text']}',`img`= '$fileName' WHERE `id` = '{$_POST['id']}'");
    move_uploaded_file($tempName,$folder);
    header("Location:../../admin.php?uslugi");
}

if(isset($_POST['del'])){
    $sql = $link->query("DELETE FROM `uslugi` WHERE `id` = '{$_POST['id']}'");
    header("Location:../../admin.php?uslugi");
}
