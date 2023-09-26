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

//receber os valores

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do pedido do formulário
    $data = $_POST['data'];
    $cliente = $_POST['cliente'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];

//inserir os dados na tabela pedidos
$sql = "INSERT INTO pedidos (data,cliente,produto,valor) VALUES (:data,:cliente,:produto,:valor)"; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':data', $data);
$stmt->bindValue(':cliente', $cliente);
$stmt->bindValue(':produto', $produto);
$stmt->bindValue(':valor', $valor);
$stmt->execute();

//retorna ao index
header('Location: index.php');
exit();
}
?>

