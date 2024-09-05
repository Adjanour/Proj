<?php
// config/db.php

$host = 'localhost';
$db_name = 'orphanage_db';
$username = 'root';  // Replace with your DB username
$password = '';      // Replace with your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
