<?php
// Conectar ao banco de dados
$host = 'localhost';
$dbname = 'pedidos';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configurar para lançar exceções em caso de erros
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
// Verifica se o ID do pedido foi fornecido como parâmetro
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit();
  }
  // Obtém o ID do pedido a ser editado
  $id = $_GET['id'];
  // Busca o pedido correspondente na tabela 'pedidos'
  $sql = "SELECT * FROM pedidos WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  $pedido = $stmt->fetch();
  // Verifica se o pedido existe
  if (!$pedido) {
  header('Location: index.php');
  exit();
  }
  // Exclui os dados do pedido na tabela 'pedidos'
  $sql = "DELETE FROM pedidos WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  // Redireciona para a página principal após salvar as alterações
  header('Location: index.php');
  exit();
  ?>