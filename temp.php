<?php
session_start();
include('conecta.php');

if ($_SESSION["status"] != "ok") {
  header('location: ../index.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM pessoa WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);
$pessoa = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

// LIBERAR MEMORIA
mysqli_free_result($resultado);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('../templates/header.php'); ?>

<body style="width: initial; height: initial; overflow: initial;">
  <header class="my-4 d-flex justify-content-between align-items-center">
    <h2 class="h4 ml-4"><span><img src="../images/agenda.svg" alt="Logo" width="50" height="50" class="mb-1 mr-2"></span>Sistema de Agenda</h2>
    <ul class="mr-4 list-unstyled">
      <li class="d-inline mr-2">Olá <?php echo $_SESSION["user"]; ?>!</li>
      <li class="d-inline mr-1"><a href="../pessoas.php" class="btn btn-secondary">Voltar</a></li>
      <li class="d-inline"><a href="sair.php" class="btn btn-outline-danger">Sair</a></li>
    </ul>
  </header>
  <hr class="m-0">
  <main class="mt-4 d-flex align-items-start justify-content-between">
    <section id="dados" class="w-50 position-relative d-flex flex-column align-items-center justify-content-center">
      <div id="top-bar" class="bg-info position-absolute fixed-top rounded d-flex align-items-center w-75 mx-auto" style="height: 50px;">
        <svg class="ml-3" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: white;">
          <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
          <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        </svg>
        <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Dados de <?php echo $pessoa['nome']; ?></h2>
      </div>
      <form class="p-5 w-100 bg-light my-3" style="max-width: 600px; border-radius: 15px;">
        <label for="nome" style="margin-bottom: 0.2em;">Nome: </label>
        <input type="text" id="nome" class="form-control bg-white mb-2" value="<?php echo $pessoa['nome']; ?>" disabled>
        <label for="email">Email: </label>
        <input type="email" id="email" class="form-control bg-white mb-2" value="<?php echo $pessoa['email']; ?>" disabled>
        <label for="celular">Celular: </label>
        <input type="text" id="celular" class="form-control bg-white mb-2" value="<?php echo $pessoa['celular']; ?>" disabled>
        <label for="endereco">Endereco: </label>
        <input type="text" id="endereco" class="form-control bg-white mb-2" value="<?php echo $pessoa['endereco']; ?>" disabled>
        <label for="cidade">Cidade: </label>
        <input type="text" id="cidade" class="form-control bg-white mb-2" value="<?php echo $pessoa['cidade']; ?>" disabled>
        <label for="estado">Estado: </label>
        <input type="text" id="estado" class="form-control bg-white mb-2" value="<?php echo $pessoa['estado']; ?>" disabled>
        <label for="datanascimento">Data de nascimento: </label>
        <input type="date" id="datanascimento" class="form-control bg-white mb-2" value="<?php echo $pessoa['datanascimento']; ?>" disabled>
        <label for="profissao">Profissão: </label>
        <input type="text" id="profissao" class="form-control bg-white mb-2" value="<?php echo $pessoa['profissao']; ?>" disabled>
        <label for="tipo" style="margin-bottom: 0.2em;">Tipo: </label>
        <input type="text" id="tipo" class="form-control bg-white mb-2" value="<?php echo $pessoa['tipo']; ?>" disabled>
      </form>
    </section>
    <section id="mapa" class="w-50 position-relative d-flex flex-column align-items-center justify-content-center">
      <div id="top-bar" class="bg-info position-absolute fixed-top rounded d-flex align-items-center w-75 mx-auto" style="height: 50px;">
        <svg class="ml-3" style="color: white;" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12.166 8.94C12.696 7.867 13 6.862 13 6A5 5 0 0 0 3 6c0 .862.305 1.867.834 2.94.524 1.062 1.234 2.12 1.96 3.07A31.481 31.481 0 0 0 8 14.58l.208-.22a31.493 31.493 0 0 0 1.998-2.35c.726-.95 1.436-2.008 1.96-3.07zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
          <path fill-rule="evenodd" d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        </svg>
        <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Localização de <?php echo $pessoa['nome']; ?></h2>
      </div>
      <iframe style="position: relative; top: 50px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14643.786077479077!2d-51.9382799!3d-23.426299!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xca788375078d8bfc!2sCatedral%20Metropolitana%20Bas%C3%ADlica%20Menor%20Nossa%20Senhora%20da%20Gl%C3%B3ria!5e0!3m2!1sen!2sbr!4v1601145114739!5m2!1sen!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
  </main>
  <?php include('../templates/footer.php'); ?>
</body>

</html>