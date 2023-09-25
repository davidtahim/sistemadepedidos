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
  <main>
  <h1>Sistema de Pedidos</h1>
  <form action="salvar_pedido.php">
   <p> <label for="data">Data: </label><input type="datetime-local" name="data" id="data"></p>
    <p><label for="cliente">Cliente: </label><input type="text" name="cliente" id="cliente"></p>
    <p><label for="produto">Produto: </label><input type="text" name="produto" id="produto"></p>
    <p><label for="valor">Valor: </label><input type="number" name="valor" id="valor"></p>
    <p><input type="submit" value="Enviar"></p>
  </form>
  <hr>
  <h2>Meus pedidos</h2>
  <table>
    <thead>
      <tr>
        <th>Data</th>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Valor</th>
        <th>Ações</th>
      </tr>
    </thead>
  </table>
  </main>
  <footer>
    <!-- place footer here -->
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