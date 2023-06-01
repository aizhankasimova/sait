<?
session_start();
include '../../components/connect.php';

if (isset($_POST['add_rev'])) {
    $reviews = $link->prepare("SELECT * FROM `rewiews` WHERE `id_user` = ?");
    $reviews->execute(array($_SESSION['user']['id']));
    echo $reviews->rowCount();
    if ($reviews->rowCount() == 0) {
        $add = $link->prepare("INSERT INTO `rewiews`(`id_user`,`estimation`, `plus`, `minus`, `comment`, `date`) VALUES (?,?,?,?,?,?)");
        $add->execute(array($_SESSION['user']['id'],$_POST['estimation'],$_POST['plus'],$_POST['minus'],$_POST['comment'],$_POST['date']));
        header('Location:../../../reviews.php');
    } else {
        $rev = $reviews->fetch(PDO::FETCH_ASSOC);
        if($rev['status'] == 0){
        $upd = $link->prepare("UPDATE `rewiews` SET `estimation`= ?,`plus`= ?,`minus`= ?,`comment`= ?,`date`= ? WHERE `id_user` = ?");
        $upd->execute(array($_POST['estimation'],$_POST['plus'],$_POST['minus'],$_POST['comment'],$_POST['date'],$_SESSION['user']['id']));
        header('Location:../../../reviews.php');
        } else {
            $upd = $link->prepare("UPDATE `rewiews` SET `estimation`= ?,`plus`= ?,`minus`= ?,`comment`= ?,`date`= ?,`status`= 2 WHERE `id_user` = ?");
            $upd->execute(array($_POST['estimation'],$_POST['plus'],$_POST['minus'],$_POST['comment'],$_POST['date'],$_SESSION['user']['id']));
            header('Location:../../../reviews.php');
        }
    }
}
