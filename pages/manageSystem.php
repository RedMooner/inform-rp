<form action="update_record.php" method="POST">
    <input type="hidden" name="id" value="значение_id_записи_для_изменения">

    <label for="title">Заголовок:</label>
    <input type="text" name="title"="title" value="текущее_значение_заголовка">

    <label for="owner">Владелец:</label>
    <select>
        <?php
        $sql = "SELECT id, FIO FROM Owners";
        if ($result = $conn->query($sql)) {
            // Генерация опций выпадающего списка
            foreach ($result as $owner) {
                echo '<option value="' . $owner['id'] . '">' . $owner['FIO'] . '</option>';
            }
        }
        ?>
    </select>

    <input type="submit" value="Изменить">
</form>