
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <title>ГБУ-РПБД</title>
</head>

<body>

    <header>
        <div class="logo-content">
            <div class="logo"></div>
            <p>ИСБд</p>
        </div>
        <nav>
            <ul>
                <li><a href="?page=is">Информационные системы</a></li>
                <li><a href="?page=owners">Руководители проектов</a></li>
                <li><a href="?page=vms">Виртуальные машины</a></li>
            </ul>
        </nav>
        <?php

        if($_SESSION['isAuth'] == "true"){
            echo '<button onclick="document.location=\'?page=logout\'">Выйти</button>';

        }else{
            echo '<button onclick="document.location=\'?page=login\'">Войти</button>';
        }
      
        ?>
    </header>
    <?php 
?>