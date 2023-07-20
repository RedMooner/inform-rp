<h1>Авторизация</h1>
<form action="" method="POST">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit">
</form>

<?php
if (isset($_POST['login'])) {
    if (isset($_POST['password'])) {
        $_SESSION['isAuth'] = "true";
        header('Location: ' . 'index.php');
    }
}
?>