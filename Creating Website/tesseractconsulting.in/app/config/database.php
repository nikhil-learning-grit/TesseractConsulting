<?php 

require_once __DIR__ .'/config/php'; 

$host = $_ENV['DB_HOST'];
$name = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];

$dsn = "mysql:host=$host;dbname=$name;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION
    );

    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE, 
        PDO::FETCH_ASSOC
    );
} catch (PDOException $e) {
    die('Database Connection Failed');
}
?>
