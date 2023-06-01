<?php
include "../components/connect.php";

if(isset($_POST['addMast'])){
    $name = $_POST['name'];
    $stage = $_POST['stage'];
    $desc = $_POST['desc'];
    $style = $_POST['style'];
    $fileName =  md5($_FILES['foto']['name'].time()*100) . ".jpg" ;
    $tempName = $_FILES ['foto']['tmp_name'];
    $folder = "../images/" . $fileName ;
    $sql = $link->prepare("INSERT INTO `masters`(`name`, `stage`, `desc`, `foto`) VALUES (?,?,?,?)");
    $sql->execute(array($name,$stage,$desc,$fileName));
    move_uploaded_file($tempName,$folder);
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['addStyle'])){
    $sql = $link->prepare("INSERT INTO `styles`(`id_master`, `id_usl`) VALUES (?,?)");
    $sql->execute(array($_POST['master'],$_POST['uslugi']));
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
    $sql = $link->query("UPDATE `masters` SET `name`='{$_POST['name']}',`stage`='{$_POST['stage']}',`desc`='{$_POST['desc']}',`foto`= '$fileName' WHERE `id` = '{$_POST['id']}'");
    move_uploaded_file($tempName,$folder);
    header("Location:../../admin.php?masters");
}

if(isset($_POST['del'])){
    $sql = $link->query("DELETE FROM `masters` WHERE `id` = '{$_POST['id']}'");
    header("Location:../../admin.php?masters");
}

if(isset($_POST['st_del'])){
    $sql = $link->query("DELETE FROM `styles` WHERE `id_usl` = '{$_POST['id']}' AND `id_master` = '{$_POST['id_master']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}