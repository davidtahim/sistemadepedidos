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
  <!doctype html>
  <html lang="pt-br">
  
  <head>
    <title>Sistema de Pedidos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
  </head>
  
  <body>
    <header>
    <nav class="navbar navbar-expand navbar-light bg-light">
       <ul class="nav navbar-nav">
           <li class="nav-item">
               <a class="nav-link active" href="#" aria-current="page">Nav 1 <span class="visually-hidden">(current)</span></a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="#">Nav 2</a>
           </li>
       </ul>
   </nav>
    </header>
    <main class="mx-4">
    <h1>Editar Pedido</h1>
  <form class="row" method="POST" action="editar_pedido.php?id=<?php echo $id; ?>">
 <div class="col-md-3 py-2">
    <label>Data:</label>
    <input type="date" name="data" value="<?php echo $pedido['data']; ?>">
 </div>
  <div class="col-md-3 py-2">
    <label>Cliente:</label>
    <input type="text" name="cliente" value="<?php echo $pedido['cliente']; ?>"><br>
  </div>
  <div class="col-md-3 py-2">
    <label>Produto:</label>
    <input type="text" name="produto" value="<?php echo $pedido['produto'];
    ?>">
  </div>
  <div class="col-md-3 py-2">
    <label>Valor:</label>
    <input type="number" name="valor" value="<?php echo $pedido['valor']; ?>"><br>
  </div>
  
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Salvar Alterações
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Salvar Alterações</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ao clicar você irá alterar os valores do pedido.
      </div>
      <div class="modal-footer">
      <input  class="btn btn-primary" type="submit" value="Salvar Alterações">
      </div>
    </div>
  </div>
</div>  
</form>

  
    </main>
    <footer class="fixed-bottom">
    <?php include 'footer.php'; ?>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  </body>
  
  </html>