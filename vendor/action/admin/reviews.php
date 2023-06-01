<? 
include '../../components/connect.php';
if(isset($_POST['answer'])){
    $answer = $link->query("UPDATE `rewiews` SET `answer`='{$_POST['otv_rev']}' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['ban_rev'])){
    $link->query("UPDATE `rewiews` SET `status`= '1' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['del_answer'])){
    $link->query("UPDATE `rewiews` SET `answer`='0' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['razban_rev'])){
    $link->query("UPDATE `rewiews` SET `status`= '0' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['two_ban'])){
    $link->query("UPDATE `rewiews` SET `status`= '3' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>