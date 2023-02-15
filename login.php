<?php

$host = 'localhost';
$data = 'bookstore';
$user = 'webapp';
$pass = 'password';
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$data", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $e) {
    // Handle connection errors
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

?>