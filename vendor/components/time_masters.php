<?
include 'connect.php';
$date = $_POST['date'];
$date = date('Y-m-d',strtotime($date));
$times = $link->prepare("SELECT `time` FROM `carpet` WHERE `date` = ? AND `id_master` = ? AND `status` = ?");
$times->execute(array($date,$_POST['id_master'],'0'));
$array = $times->fetchAll(PDO::FETCH_ASSOC);
$time_two = date("H") + 3;
$time_two = date("$time_two:i");
if($times->rowCount() > 0){
        for ($i = 0, $a = 60; $i < 11; $i++) { //время с 8:00 до 21:00
            $time = date("H:i", strtotime("08:00 + $a minutes"));
            foreach($array as $value){
                if ($time == $value['time']) {
                    $class = 'class="disabled"';
                    goto forIt;
                }
                if ($time != $value['time']) {
                    $class = 'class="enabled"';
                    continue;
                }
            }
            forIt:
            if($_POST['date'] == date("d.m.Y")){
                if($time < $time_two){
                    $class = 'class="disabled"';
                }
            }
            ?>
            <p <?= $class ?>><?= $time ?></p>
            <?
            $a += 60;
        }
} else {
    for ($i = 0, $a = 60; $i < 11; $i++) { //время с 8:00 до 21:00
        $time = date("H:i", strtotime("08:00 + $a minutes"));
        $class = 'class="enabled"';
        if($_POST['date'] == date("d.m.Y")){
            if($time < $time_two){
                $class = 'class="disabled"';
            }
        }
    ?>
        <p <?= $class ?>><?= $time ?></p>
    <?
        $a += 60;
    }
}
?>