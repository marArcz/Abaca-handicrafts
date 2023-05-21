<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "abaca_handicraft";

$dsn = "mysql:host=$host;dbname=$database";

try {
    $pdo = new PDO($dsn,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    die($th->getMessage());
}

?>