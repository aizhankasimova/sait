<?
session_start(); 
include '../components/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$tel = $_POST['tel'];
$name = $_POST['name'];
$password = md5($password . "whtrwhbrw");
$i = 0;
$users = $link->prepare("SELECT * FROM `users` WHERE `email` = ?");
$users->execute(array($email));
if($users->rowCount() == 0){
    $i++;
} else {
    echo 1;
}
$users = $link->prepare("SELECT * FROM `users` WHERE `tel` = ?");
$users->execute(array($tel));
if($users->rowCount() == 0){
    $i++;
} else {
    echo 2;
}
if($i == 2){
    $sql = $link->prepare("INSERT INTO `users`(`email`, `password`, `tel`, `name`) VALUES (?,?,?,?)");
    $sql->execute(array($email,$password,$tel,$name));
    $users = $link->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
    $users->execute(array($email,$password));
    $user = $users->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email'],
        'tel' => $user['tel'],
        'name' => $user['name'],
        'status' => $user['status'],
    ];
    echo 3;
}
?>