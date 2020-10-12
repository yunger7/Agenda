<?php
session_start();

if ($_SESSION["status"] != "ok") {
  header('location: index.php');
}

if ($_SESSION["tipo"] != "admin") {
  header("location: agenda.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include 'templates/header.php'; ?>

<body>
  <header class="my-4 d-flex justify-content-between align-items-center">
    <a href="agenda.php" class="text-decoration-none" style="color: #212529;"><h2 class="h4 ml-4"><span><img src="images/agenda.svg" alt="Logo" width="50" height="50" class="mb-1 mr-2"></span>Sistema de Agenda</h2></a>
    <ul class="mr-4 list-unstyled">
      <li class="d-inline mr-2">Olá <?php echo $_SESSION["user"]; ?>!</li>
      <li class="d-inline"><a href="config/sair.php" class="btn btn-outline-danger">Sair</a></li>
    </ul>
  </header>
  <nav>
    <?php include 'templates/menu.php'; ?>
  </nav>
  <main>
    <?php
    include('config/conecta.php');

    $res = mysqli_query($conn, "SELECT * FROM expessoa ORDER BY nome");

    if (mysqli_num_rows($res) == 0) {
      // não existe registros
      $existe = 0;
    } else {
      // existe registros
      $existe = 1;
      $pessoas = mysqli_fetch_all($res, MYSQLI_ASSOC);
      mysqli_free_result($res);
    }

    mysqli_close($conn);
    ?>
    <?php if ($existe === 0) { ?>
      <!-- Não existe resultados -->
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
      </table>
      <p class="text-center h5 mt-4">Nenhuma pessoa foi excluida ＞﹏＜</p>
    <?php } else { ?>
      <!-- Existe resultados -->
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
          <?php foreach ($pessoas as $pessoa) : ?>
            <tr>
              <td><?php echo $pessoa['tipo']; ?></td>
              <td><?php echo $pessoa['nome']; ?></td>
              <td><?php echo $pessoa['celular']; ?></td>
              <td><?php echo $pessoa['email']; ?></td>
              <td>
                <a href="config/restaurar-pessoa.php?id=<?php echo $pessoa['id']; ?>" class="btn btn-success">Restaurar</a>
                <a href="config/excluir-pessoa-permanentemente.php?id=<?php echo $pessoa['id']; ?>" class="btn btn-danger">Excluir Permanentemente</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php } ?>
  </main>
  <?php include 'templates/footer.php'; ?>
</body>

</html>