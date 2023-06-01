<?php
session_start();
include '../components/connect.php';

$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password . "whtrwhbrw");
$users = $link->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ?");
$users->execute(array($email,$password));
if($users->rowCount() == 0){
    echo 1; 
}else{
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
