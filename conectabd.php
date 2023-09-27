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
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do pedido do formulário
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    // Atualiza os dados do pedido na tabela 'pedidos'
    $sql = "UPDATE pedidos SET data = :data, cliente = :cliente, produto = :produto,
    valor = :valor WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':data', $data);
    $stmt->bindValue(':cliente', $cliente);
    $stmt->bindValue(':produto', $produto);
    $stmt->bindValue(':valor', $valor);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    // Redireciona para a página principal após salvar as alterações
    header('Location: index.php');
    exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Pedido</title>
</head>
<body>
<h1>Editar Pedido</h1>
<form method="POST" action="editar_pedido.php?id=<?php echo $id; ?>">
<label>Data:</label>
<input type="text" name="data" value="<?php echo $pedido['data']; ?>"><br>
<label>Cliente:</label>
<input type="text" name="cliente" value="<?php echo $pedido['cliente']; ?>"><br>
<label>Produto:</label>
<input type="text" name="produto" value="<?php echo $pedido['produto'];
?>"><br>
<label>Valor:</label>
<input type="text" name="valor" value="<?php echo $pedido['valor']; ?>"><br>
<input type="submit" value="Salvar Alterações">
</form>
</body>
</html>