<?php
session_start();

if ($_SESSION["status"] != "ok") {
  header('location: index.php');
}

include('config/conecta.php');

// BUSCAR REGISTROS
$sql = "SELECT id, tipo, nome, celular, email FROM pessoa ORDER BY nome";
$resultado = mysqli_query($conn, $sql);
$pessoas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

// LIBERAR MEMÓRIA
mysqli_free_result($resultado);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda</title>

  <link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/galaxy-open-line-gradient-i/200/account-256.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <style>
    body {
      width: 100vw;
      height: 100vh;
      overflow: hidden;
    }

    #move-up {
      position: relative;
      top: 0;
      transition: top ease 150ms;
    }

    #move-up:hover {
      top: -5px;
    }
  </style>
</head>

<body style="width: initial; height: initial; overflow: initial;">
  <header class="my-4 d-flex justify-content-between align-items-center">
    <h2 class="h4 ml-4"><span><img src="images/agenda.svg" alt="Logo" width="50" height="50" class="mb-1 mr-2"></span>Sistema de Agenda</h2>
    <ul class="mr-4 list-unstyled">
      <li class="d-inline mr-2">Olá <?php echo $_SESSION["user"]; ?>!</li>
      <li class="d-inline"><a href="config/sair.php" class="btn btn-outline-danger">Sair</a></li>
    </ul>
  </header>
  <nav>
    <?php include 'templates/menu.php'; ?>
  </nav>
  <section id="top-bar" class="my-3 d-flex justify-content-between align-items-center">
    <a href="cadastrar-pessoas.php" class="btn btn-info ml-4">Cadastrar pessoas</a>
    <ul class="m-0 ml-3 list-unstyled">
      <?php
        include('config/conecta.php');
        $alfabeto = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

        $letrasExistentes = mysqli_query($conn, "SELECT DISTINCT LEFT(nome, 1) AS letra FROM pessoa ORDER BY letra");
        $iniciais = mysqli_fetch_all($letrasExistentes, MYSQLI_ASSOC);

        echo "<span class='text-info' style='cursor: default;'> | </span>";
        foreach($alfabeto as $letra){
          foreach($iniciais as $inicial){
            if($inicial['letra'] == $letra){
              echo "<li class='d-inline font-weight-bold'><a href='config/procurar-letra.php?letra=$letra' id='move-up' class='text-decoration-none'>$letra</a></li>";
            }
          }
          $c = 0;
          foreach($iniciais as $inicial){
            if($inicial['letra'] != $letra){
              $c++;
            }
          }
          if($c == count($iniciais)){
            echo "<li class='d-inline'><a href='#' id='move-up' class='text-decoration-none text-secondary' style='cursor: default;'>$letra</a></li>";
          }
          echo "<span class='text-info' style='cursor: default;'> | </span>";
        }

        // LIBERAR MEMÓRIA
        mysqli_free_result($letrasExistentes);
        mysqli_close($conn);
      ?>
    </ul>
    <form action="config/procurar.php" method="GET" class="mr-4">
      <div class="input-group">
        <input type="text" name="nome-procurar" class="form-control" placeholder="Digite um nome">
        <div class="input-group-append">
          <button type="submit" class="btn btn-outline-info">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
            </svg>
          </button>
        </div>
      </div>
    </form>
  </section>
  <hr class="m-0">
  <main>
    <table class="table table-hover text-center mb-0 border">
      <thead>
        <tr>
          <th scope="col">Tipo</th>
          <th scope="col">Nome</th>
          <th scope="col">Celular</th>
          <th scope="col">Email</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pessoas as $pessoa): ?>
          <tr>
            <td><?php echo $pessoa['tipo']; ?></td>
            <td><?php echo $pessoa['nome']; ?></td>
            <td><?php echo $pessoa['celular']; ?></td>
            <td><?php echo $pessoa['email']; ?></td>
            <td>
              <a href="config/verpessoa.php?id=<?php echo $pessoa['id']?>" class="btn btn-primary">Ver</a>
              <a href="config/editar-pessoa.php?id=<?php echo $pessoa['id']; ?>" class="btn btn-info">Editar</a>
              <a href="config/excluir-pessoa.php?id=<?php echo $pessoa['id']; ?>" class="btn btn-danger">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>
  <?php include 'templates/footer.php'; ?>
</body>

</html>
