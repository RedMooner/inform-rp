<form class="login-form" action="" method="POST">
    <div class="logo-content">
        <div class="logo"></div>
    </div>
    <h1 class="login-header">Авторизация</h1>

    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit">
</form>

<?php
if (isset($_POST['login'])) {
    if (isset($_POST['password'])) {
        require('./ config/connetion.php');
        $sql = "select * from users where username='" . $_POST['login'] . "' and password = '" . $_POST['password'] . "'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['isAuth'] = "true";
            foreach ($result as $row) {
                var_dump($row['role']);
                if ($row['role'] == "1") {
                    $_SESSION['isAdmin'] = "true";
                } else {
                    $_SESSION['isAdmin'] = "false";
                }
            }
           header('Location: ' . 'index.php');
        } else {
            echo "<h1>Ошибка входа!</h1>";
        }
    }
}
?>