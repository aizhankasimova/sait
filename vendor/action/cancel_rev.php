<? 
session_start();
include '../components/connect.php';
if(isset($_POST['canc_order'])){
    $sql = $link->prepare("UPDATE `carpet` SET `status`= ? WHERE `id` = ?");
    $sql->execute(array(2,$_POST['id_order']));
    header('Location:' . $_SERVER['HTTP_REFERER']);
}
?>