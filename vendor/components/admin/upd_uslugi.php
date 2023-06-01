<? 
$id = $_GET['id'];
$sql = $link->query("SELECT * FROM `uslugi` WHERE `id` = '$id'");
$sql->execute();
$arr = $sql->fetch(PDO::FETCH_ASSOC);
?>
<h1 style="text-align: center;color:black;margin:20px 0;">Изменить данные мастера</h1>
<form class="addMast" action="vendor/action/addUslugi.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$arr['id']?>">
    <input type="hidden" name="filename" value="<?=$arr['img']?>">
    <input type="text" name="title" value="<?=$arr['title']?>" placeholder="Название">
    <input type="text" name="price" value="<?=$arr['price']?>" placeholder="Цена">
    <textarea style="white-space: normal;" name="text" id="" cols="50" rows="15" placeholder="Про мастера"><?=$arr['text']?></textarea>
    Фото:<input type="file" name="foto">
    <input type="submit" name="upd" value="Изменить">
    <input type="submit" name="del" value="Удалить">
</form>