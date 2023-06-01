<?
include '../connect.php';
?>
<div class="table_masters">
    <h1 style="text-align: center;color:black;margin:20px 0;">Записи</h1>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Мастер</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?
            $sql = $link->query("SELECT * FROM `carpet` WHERE `status` = 0");
            $sql->execute();
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($array as $value) :
            ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td>
                        <? 
                        $master = $link->query("SELECT * FROM `masters` WHERE `id` = '{$value['id_master']}'");
                        $master->execute();
                        $master = $master->fetch(PDO::FETCH_ASSOC);
                        echo $master['name'];
                        ?>
                    </td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['tel'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['date'] ?></td>
                    <td><?= $value['time']?></td>
                    <td>
                        <select data-id="<?= $value['id'] ?>" name="status" id="">
                            <option value="0">Записан</option>
                            <option value="1">Услуга оказана</option>
                            <option value="2">Отменить</option>
                        </select>
                    </td>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
</div>