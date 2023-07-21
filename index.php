<?php
session_start();
require('./ config/connetion.php');
?>

<?php include('./templates/header.php') ?>

<main>

    <?php
    if ($_SESSION['isAdmin'] == "true") {
        if (isset($_GET['delete'])) {
            $sql = "delete from InformSystems where id = " . $_GET['delete'];
            $result = $conn->query($sql);
            header('Location: ' . 'index.php');
        }
    }
    if ($_SESSION['isAuth'] == "true") {
        if ($_GET['page'] == "is" || !isset($_GET['page'])) {
            include('./tables/informSystems.php');
        } elseif ($_GET['page'] == "owners") {
            include('./tables/owners.php');
        } elseif ($_GET['page'] == "vms") {
            echo '<h1>Функция находится в разработке!</h1>';
        } elseif ($_GET['page'] == 'logout') {
            unset($_SESSION['isAuth']); // удаляем из сессии конкретное значение
            session_unset(); // удаляет из сессии все переменные
            session_destroy(); // уничтожает сессию, включая и сам сессионный файл;
            header('Location: ' . 'index.php');
        } else {
            echo '<h1>Страница не найдена!</h1>';
        }
    } elseif ($_GET['page'] == "login") {
        include('./pages/login.php');
    } else {
        echo '<h1>Вы не авторизированы!</h1>';
    }

    ?>
</main>

<?php include('./templates/footer.php') ?>