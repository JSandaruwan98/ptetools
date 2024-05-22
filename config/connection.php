<?php

$host     = 'localhost';
$db       = 'pte_lms_admin';
$user     = 'root';
$password = 'Cod$Tech90sh$';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
     echo $e->getMessage();
}
