<?php
$host = 'localhost'; // Database host
$db = 'info'; // Database name
$user = 'root'; // MySQL username
$pass = ''; // MySQL password (leave blank if none)

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
