<?
$id = $_GET['id'];
$sql = $link->query("SELECT * FROM `masters` WHERE `id` = '$id'");
$sql->execute();
$arr = $sql->fetch(PDO::FETCH_ASSOC);
?>
<h1 style="text-align: center;color:black;margin:20px 0;">Изменить данные мастера</h1>
<form class="addMast" action="vendor/action/addMast.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $arr['id'] ?>">
    <input type="hidden" name="filename" value="<?= $arr['foto'] ?>">
    <input type="text" name="name" value="<?= $arr['name'] ?>" placeholder="Имя мастера">
    <input type="text" name="stage" value="<?= $arr['stage'] ?>" placeholder="стаж мастера">
    <textarea style="white-space: normal;" name="desc" id="" cols="50" rows="15" placeholder="Про мастера"><?= $arr['desc'] ?></textarea>
    Фото:<input type="file" name="foto">
    <input type="submit" name="upd" value="Изменить">
    <input type="submit" name="del" value="Удалить">
</form>
<h1 style="text-align: center;color:black;margin:20px 0;">Изменить стили</h1>
<div>
    <?
    $uslugi = $link->prepare("SELECT * FROM `uslugi` WHERE `id` IN (SELECT `id_usl` FROM `styles` WHERE `id_master` = ?)");
    $uslugi->execute(array($id));
    foreach ($uslugi->fetchAll(PDO::FETCH_ASSOC) as $val) {
    ?>
        <form style="margin-bottom: 30px;" class="addMast" action="vendor/action/addMast.php" method="post">
            <input type="hidden" name="id" value="<?= $val['id'] ?>">
            <input type="hidden" name="id_master" value="<?= $id ?>">
            <div style="display: flex; gap:20px;">
                <input readonly type="text" name="uslugi" value="<?= $val['title'] ?>">
                <input type="submit" name="st_del" value="Удалить">
            </div>
        </form>
    <? } ?>
</div>