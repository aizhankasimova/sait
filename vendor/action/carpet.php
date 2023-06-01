<?
session_start();
include '../components/connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $id_master = $_POST['id_master'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $services = $_POST['service'];
    $name_master = $_POST['name_master'];
    $surname_master = $_POST['surname_master'];
    $date = date('Y-m-d',strtotime($date));
    $i = 0;
    if($date == NULL || $date == '1970-01-01'){
        echo 'err_date';
    } else {
        $i++;
    }
    if($time == NULL){
        echo 'err_time';
    } else {
        $i++;
    }

    if($i == 2){
        $carpet = $link->prepare("SELECT * FROM `carpet` WHERE `date` = ? AND `id_master` = ? AND 'time' = ?");
        $carpet->execute(array($date,$id_master,$time));
        if($carpet->rowCount() > 0){
            echo 'error';
        } else {
            $user_carpet = $link->prepare("SELECT * FROM `carpet` WHERE `id_user` = ? AND `date` = ? AND `status` = ?");
            $user_carpet->execute(array($_SESSION['user']['id'],$date,0));
            if($user_carpet->rowCount() > 0){
                echo 'err_user';
            } else{
                $carpet = $link->prepare("INSERT INTO `carpet`(`id_master`, `id_user`, `name`, `tel`, `email`, `date`, `time`) VALUES (?,?,?,?,?,?,?)");
                $carpet->execute(array($id_master,$_SESSION['user']['id'],$name,$tel,$email,$date,$time));
                echo 'suc';
            }
        }
    }
?>