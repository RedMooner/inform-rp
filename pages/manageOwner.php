<?php
if (isset($_GET['update_owner'])) {
    $id = $_GET['update_owner'];
}
$title = "";
$owner_id = -1;

if (isset($_GET['update_owner']))
    $sql = "SELECT * FROM Owners where id = " . $id;

if (isset($_GET['update_owner']))
    if ($result = $conn->query($sql)) {
        foreach ($result as $owner) {
            $title = $owner['FIO'];
        }
    }


?>
<div class="login-form update-form">
    <form action="" method="POST">
        <input type="hidden" name="id" value="">

        <label for="title">Фамилия,имя отчетсво:</label>
        <?php
        if (isset($_GET['update_owner'])) { ?>
            <input type="text" name="fio" value="<?php echo $title ?>">
            <?php
        } else {
            echo '<input type="text" name="fio" value="">';
        }
        ?>
        <input type="submit" value="<?php if(isset($_GET['update_owner'])) echo 'Изменить'; else echo 'Добавить';  ?>">
    </form>
</div>

<?php
if (isset($_GET['update_owner'])) {
    if (isset($_POST['fio'])) {
        $sql = "update Owners set FIO='" . $_POST['fio'] . "' where id=" . $id;
        $result = $conn->query($sql);
        header('Location: ' . 'index.php?page=owners');
    }
} else {
    if (isset($_POST['fio'])) {
        $sql = "insert into Owners values(null,'" . $_POST['fio'] . "')";
        echo $sql;
        $result = $conn->query($sql);
        header('Location: ' . 'index.php?page=owners');
    }
}

?>