<?php
if ($_SESSION['user']['status'] == 1) {
?>
    <div style="display:flex;gap:100px;">
        <form class="addMast" action="vendor/action/addMast.php" method="post" enctype="multipart/form-data">
            <h1 style="text-align: center;color:black;margin:20px 0;">Добавить мастера</h1>
            <input type="text" name="name" placeholder="Имя мастера" required>
            <input type="text" name="stage" placeholder="стаж мастера" required>
            <textarea name="desc" id="" cols="30" rows="10" placeholder="Про мастера" required></textarea>
            Фото:<input type="file" name="foto">
            <input type="submit" name="addMast">
        </form>
        <form class="addMast" action="vendor/action/addMast.php" method="post">
            <h1 style="text-align: center;color:black;margin:20px 0;">Добавить стили</h1>
            <span>Выберите мастера:</span>
            <select name="master" id="">
                <?
                $sql = $link->query("SELECT * FROM `masters` WHERE 1");
                $sql->execute();
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($array as $value) {
                ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <? } ?>
            </select>
            <select name="uslugi" id="">
                <?
                $sql = $link->query("SELECT * FROM `uslugi` WHERE 1");
                $sql->execute();
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($array as $value) {
                ?>
                    <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                <? } ?>
            </select>
            <?php ?>
            <input type="submit" name="addStyle">
        </form>
    </div>
    <div class="table_masters">
        <h1 style="text-align: center;color:black;margin:20px 0;">Мастера</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Фото</th>
                    <th>Имя мастера</th>
                    <th>Стаж</th>
                    <th>Описание</th>
                    <th>Стили</th>
                    <th>Галерея</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?
                $sql = $link->query("SELECT * FROM `masters` WHERE 1");
                $sql->execute();
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($array as $value) :
                ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><img width="100px" src="vendor/images/<?= $value['foto'] ?>" alt=""></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['stage'] ?></td>
                        <td>
                            <div style="width: 500px;white-space:normal"><?= $value['desc'] ?></div>
                        </td>
                        <td>
                            <?php
                            $uslugi = $link->prepare("SELECT * FROM `uslugi` WHERE `id` IN (SELECT `id_usl` FROM `styles` WHERE `id_master` = ?)");
                            $uslugi->execute(array($value['id']));
                            foreach ($uslugi->fetchAll(PDO::FETCH_ASSOC) as $usl) {
                            ?>
                                <p class="about_ser"><?php echo $usl['title'] ?></p>
                            <?php }  ?>
                        </td>
                        <td><a href="?id=<?= $value['id'] ?>&gallary=1&amstel=1">Смотреть</a></td>
                        <td><a href="?id=<?= $value['id'] ?>&upd_master=1&amstel=1">Изменить</a></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
<? } ?>
</main>