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
        if (isset($_GET['update'])) {
            include('./pages/manageSystem.php');
            return;
        }
        if (isset($_GET['addis'])) {
            include('./pages/manageSystem.php');
            return;
        }
        if (isset($_GET['delete_owner'])) {
            echo 'delete';
            $sql = "delete from Owners where id = " . $_GET['delete_owner'];
            $result = $conn->query($sql);
            header('Location: ' . 'index.php?page=owners');
        }
        if (isset($_GET['update_owner'])) {
            include('./pages/manageOwner.php');
            return;
        }
        if(isset($_GET['addowner'])){
            include('./pages/manageOwner.php');
            return;
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
        // echo '<h1>Вы не авторизированы!</h1>';
        // echo '
        // <div class="center-block">
        //      <div class="block">
        //          <p>Для создания учетной записи необходимо написать по адресу:</p>
        //         <p>ammotyrev@it.permkrai.ru</p>
        //     </div>
        // </div>
        // ';
        include('./pages/login.php');
    }

    ?>
</main>

<?php include('./templates/footer.php') ?>