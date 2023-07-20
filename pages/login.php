<form class="login-form" action="" method="POST">
    <div class="logo-content">
        <div class="logo"></div>
    </div>
<h1 class="login-header">Авторизация</h1>

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