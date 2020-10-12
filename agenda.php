<?php
session_start();
if ($_SESSION["status"] != "ok") {
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include 'templates/header.php'; ?>

<body>
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
  <main>
    <div class="container my-4">
      <div class="row mb-2">
        <div class="col-4"></div>
        <div class="col-4">
          <h1 class="h4 ml-5">Bem-vindo(a) <?php echo $_SESSION['user']; ?>!</h1>
        </div>
        <div class="col-4"></div>
      </div>
      <div class="row">
        <div id="dados" class="col-4">
          <section class="w-100 mx-auto position-relative d-flex flex-column align-items-center justify-content-center" style="max-width: 1200px;">
            <div id="top-bar" class="bg-info position-absolute fixed-top rounded d-flex align-items-center w-100 mx-auto" style="height: 50px;">
              <svg class="ml-2" style="color: white;" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-bar-chart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5h-2v12h2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
              </svg>
              <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Dados da agenda</h2>
            </div>
          </section>
          <section class="container h-100 bg-light p-3 pt-4" style="position: relative; top: 50px;">
            <div id="dados-agenda" class="row">
              <?php
              include('config/conecta.php');
              // Registros de usuários
              $usuarios = mysqli_query($conn, "SELECT COUNT(*) AS usuarios FROM usuario");
              $numUsuarios = mysqli_fetch_array($usuarios);

              // Registros de pessoas
              $pessoas = mysqli_query($conn, "SELECT COUNT(*) AS pessoas FROM pessoa");
              $numPessoas = mysqli_fetch_array($pessoas);

              // Liberar memória
              mysqli_free_result($usuarios);
              mysqli_free_result($pessoas);
              mysqli_close($conn);
              ?>
              <div class="col-6">
                <h5 class="h4 text-center"><?php echo $numUsuarios['usuarios']; ?></h5>
                <p class="text-center">Usuários</p>
              </div>
              <div class="col-6">
                <h5 class="h4 text-center"><?php echo $numPessoas['pessoas']; ?></h5>
                <p class="text-center">Pessoas</p>
              </div>
            </div>
            <div id="fisicas-juridicas" class="row">
              <?php
              include('config/conecta.php');
              // Registros de pessoas físicas
              $fisicas = mysqli_query($conn, "SELECT COUNT(*) AS fisicas FROM pessoa WHERE tipo = 'Fisica'");
              $numFisicas = mysqli_fetch_array($fisicas);

              // Registros de pessoas jurídicas
              $juridicas = mysqli_query($conn, "SELECT COUNT(*) AS juridicas FROM pessoa   WHERE tipo = 'Juridica'");
              $numJuridicas = mysqli_fetch_array($juridicas);

              mysqli_free_result($fisicas);
              mysqli_free_result($juridicas);
              mysqli_close($conn);
              ?>
              <div class="col-6">
                <h5 class="h4 text-center"><?php echo $numFisicas['fisicas']; ?></h5>
                <p class="text-center">Pessoas físicas</p>
              </div>
              <div class="col-6">
                <h5 class="h4 text-center"><?php echo $numJuridicas['juridicas']; ?></h5>
                <p class="text-center">Pessoas jurídicas</p>
              </div>
            </div>
          </section>
        </div>
        <div id="aniversariantes" class="col-4">
          <section class="w-100 mx-auto position-relative d-flex flex-column align-items-center justify-content-center" style="max-width: 1200px;">
            <div id="top-bar" class="bg-info position-absolute fixed-top rounded d-flex align-items-center w-100 mx-auto" style="height: 50px;">
              <svg class="ml-2" style="color: white;" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-calendar-date" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
              </svg>
              <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Aniversariante(s) do mês</h2>
            </div>
          </section>
          <section class="h-100 bg-light p-3" style="position: relative; top: 50px;">
            <?php
            include('config/conecta.php');

            // Registros de aniversariantes do mês
            $res = mysqli_query($conn, "SELECT nome, id FROM pessoa WHERE MONTH(datanascimento) = MONTH(CURDATE())");
            $aniversariantes = mysqli_fetch_all($res, MYSQLI_ASSOC);

            // mysqli_free_result($res);
            mysqli_close($conn);
            ?>
            <?php if (mysqli_num_rows($res) == 0) { ?>
              <!-- Não existem aniversariantes -->
              <p class="h5 text-center">Não existem aniversariantes esse mês</p>
            <?php } else { ?>
              <!-- Existem aniversariantes -->
              <ul>
                <?php foreach ($aniversariantes as $aniversariante) : ?>
                  <li><a href="config/verpessoa.php?id=<?php echo $aniversariante['id']; ?>"><?php echo $aniversariante['nome']; ?></a></li>
                <?php endforeach; ?>
              </ul>
              <p class="text-center mb-0" style="font-size: 2em;">&#127881;</p>
              <p class="text-center mt-1" style="font-size: 2em;">Parabéns!</p>
            <?php } ?>
          </section>
        </div>
        <div id="pesquisa-rapida" class="col-4">
          <section class="w-100 mx-auto position-relative d-flex flex-column align-items-center justify-content-center" style="max-width: 1200px;">
            <div id="top-bar" class="bg-info position-absolute fixed-top rounded d-flex align-items-center w-100 mx-auto" style="height: 50px;">
              <svg class="ml-2" style="color: white;" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
              </svg>
              <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Pesquisa rápida</h2>
            </div>
          </section>
          <section id="pesquisa" class="bg-light h-100 p-3" style="position: relative; top: 50px;">
            <form action="pessoas.php" method="GET" class="text-center">
              <div class="input-group">
                <input type="text" name="nome-procurar" class="form-control" placeholder="Digite um nome" required>
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
            <div id="grid-search" class="container mt-3">
              <?php
              include('config/conecta.php');
              $alfabeto = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

              $letrasExistentes = mysqli_query($conn, "SELECT DISTINCT LEFT(nome, 1) AS letra FROM pessoa ORDER BY letra");
              $iniciais = mysqli_fetch_all($letrasExistentes, MYSQLI_ASSOC);
              $gridCount = 0;

              foreach ($alfabeto as $letra) {
                foreach ($iniciais as $inicial) {
                  if ($inicial['letra'] == $letra) {
                    if ($gridCount == 0) {
                      echo "<div class='row mb-2'>";
                      echo "<div class='col-3 text-center'><a href='pessoas.php?letra=$letra' class='text-decoration-none btn btn-primary w-100'>$letra</a></div>";
                      $gridCount++;
                    } else if ($gridCount < 3) {
                      echo "<div class='col-3 text-center'><a href='pessoas.php?letra=$letra' class='text-decoration-none btn btn-primary w-100'>$letra</a></div>";
                      $gridCount++;
                    } else {
                      echo "<div class='col-3 text-center'><a href='pessoas.php?letra=$letra' class='text-decoration-none btn btn-primary w-100'>$letra</a></div>";
                      echo "</div>";
                      $gridCount = 0;
                    }
                  }
                }
                $c = 0;
                foreach ($iniciais as $inicial) {
                  if ($inicial['letra'] != $letra) {
                    $c++;
                  }
                }
                if ($c == count($iniciais)) {
                  if ($gridCount == 0) {
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-3 text-center'><a href='#' id='move-up' class='text-decoration-none btn btn-secondary w-100' style='cursor: default;'>$letra</a></div>";
                    $gridCount++;
                  } else if ($gridCount < 3) {
                    echo "<div class='col-3 text-center'><a href='#' id='move-up' class='text-decoration-none btn btn-secondary w-100' style='cursor: default;'>$letra</a></div>";
                    $gridCount++;
                  } else {
                    echo "<div class='col-3 text-center'><a href='#' id='move-up' class='text-decoration-none btn btn-secondary w-100' style='cursor: default;'>$letra</a></div>";
                    echo "</div>";
                    $gridCount = 0;
                  }
                }
              }

              // LIBERAR MEMÓRIA
              mysqli_free_result($letrasExistentes);
              mysqli_close($conn);
              ?>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>
  <?php include 'templates/footer.php'; ?>
</body>

</html>