<? 
include '../components/connect.php';
$sql = $link->query("UPDATE `carpet` SET `status`= '{$_POST['value']}' WHERE `id` = '{$_POST['id']}'");
?>