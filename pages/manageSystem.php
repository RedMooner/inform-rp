<?php
$id = $_GET['update'];
$title = "";
$owner_id = -1;


$sql = "SELECT * FROM InformSystems where id = " . $id;


if ($result = $conn->query($sql)) {
    foreach ($result as $owner) {
        $title = $owner['title'];
        $owner_id = $owner['owner'];
    }
}


?>
<div class="login-form update-form">
    <form action="" method="POST">
        <input type="hidden" name="id" value="">

        <label for="title">Название информационной системы:</label>
        <input type="text" name="title" value="<?php echo $title ?>">

        <label for="owner">Владелец:</label>
        <select name="owner">
            <?php

            $sql = "SELECT id, FIO FROM Owners";
            if ($result = $conn->query($sql)) {
                // Генерация опций выпадающего списка
                foreach ($result as $owner) {
                    if ((int) $owner['id'] === (int) $owner) {
                        echo '<option selected="selected" value="' . $owner['id'] . '">' . $owner['FIO'] . '</option>';
                    } else {
                        echo '<option value="' . $owner['id'] . '">' . $owner['FIO'] . '</option>';
                    }
                }
            }
            ?>
        </select>

        <input type="submit" value="Изменить">
    </form>
</div>

<?php
if (isset($_POST['title'])) {
    if (isset($_POST['owner'])) {
        $sql = "update InformSystems set title='" . $_POST['title'] . "', owner=" . $_POST['owner'] . ' where id=' . $id;
        $result = $conn->query($sql);
        header('Location: ' . 'index.php');
    }
}
?>