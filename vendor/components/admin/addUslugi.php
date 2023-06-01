<?php
if ($_SESSION['user']['status'] == 1) {
?>
    <div style="display:flex;gap:100px;">
        <form class="addMast" action="vendor/action/addUslugi.php" method="post" enctype="multipart/form-data">
            <h1 style="text-align: center;color:black;margin:20px 0;">Добавить Услугу</h1>
            <input type="text" name="title" placeholder="Название" required>
            <input type="text" name="price" placeholder="Цена" required>
            <textarea name="text" id="" cols="30" rows="10" placeholder="Описание" required></textarea>
            Фото:<input type="file" name="foto">
            <input type="submit" name="add">
        </form>
    </div>
    <div class="table_masters">
        <h1 style="text-align: center;color:black;margin:20px 0;">Услуги</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?
                $sql = $link->query("SELECT * FROM `uslugi` WHERE 1");
                $sql->execute();
                $array = $sql->fetchAll(PDO::FETCH_ASSOC);
                foreach ($array as $value) :
                ?>
                    <tr>
                        <td><?= $value['id'] ?></td>
                        <td><img width="100px" src="vendor/images/<?= $value['img'] ?>" alt=""></td>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['text'] ?></td>
                        <td><?= $value['price'] ?></td>
                        <td><a href="?id=<?= $value['id'] ?>&upd_uslugi=1&upd=1">Изменить</a></td>
                    </tr>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
<? } ?>
</main>