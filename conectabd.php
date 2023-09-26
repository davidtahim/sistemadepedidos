<?php
//conectar ao banco de dados
$host = 'localhost';
$dbname = 'pedidos';
$username ='root';
$password ='';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
?>