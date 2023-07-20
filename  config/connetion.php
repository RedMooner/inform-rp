<?php
require_once 'config.php';
$conn = new mysqli("localhost", "root", "", "rp_db");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}