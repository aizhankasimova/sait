<?php
if ($_SESSION['user']['status'] == 1) {
?>
    <div style="display:flex;gap:100px;">
        <form class="addMast" action="vendor/action/gallary.php" method="post" enctype="multipart/form-data">
            <h1 style="text-align: center;color:black;margin:20px 0;">Добавить изображения</h1>
            <input type="hidden" name="id_master" value="<?php echo $_GET['id'] ?>">
            Фото: <input type="file" name="foto[]" multiple>
            <input type="submit" name="add">
        </form>
    </div>
    <div class="table_masters">
        <h1 style="text-align: center;color:black;margin:20px 0;">Изображения</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Фото</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?
                $sql = $link->query("SELECT * FROM `gallary` WHERE `id_master` = '{$_GET['id']}'");
                $sql->execute();
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($array as $value) :
                ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><img width="150px" src="vendor/images/<?= $value['img'] ?>" alt=""></td>
                        <td><a href="/vendor/action/gallary.php?id=<?php echo $value['id'] ?>">Удалить</a></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
<? } ?>
</main>