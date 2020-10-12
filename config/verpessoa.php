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
    <a href="../agenda.php" class="text-decoration-none" style="color: #212529;"><h2 class="h4 ml-4"><span><img src="../images/agenda.svg" alt="Logo" width="50" height="50" class="mb-1 mr-2"></span>Sistema de Agenda</h2></a>
    <ul class="mr-4 list-unstyled">
      <li class="d-inline mr-2">Olá <?php echo $_SESSION["user"]; ?>!</li>
      <li class="d-inline mr-1"><a href="../pessoas.php" class="btn btn-secondary">Voltar</a></li>
      <li class="d-inline"><a href="sair.php" class="btn btn-outline-danger">Sair</a></li>
    </ul>
  </header>
  <hr class="m-0">
  <main class="mt-4">
    <section id="dados" class="w-75 mx-auto position-relative d-flex flex-column align-items-center justify-content-center" style="max-width: 1200px;">
      <div id="top-bar" class="bg-info position-absolute fixed-top rounded d-flex align-items-center w-100 mx-auto" style="height: 50px;">
        <svg class="ml-3" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: white;">
          <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
          <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        </svg>
        <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Dados de <?php echo $pessoa['nome']; ?></h2>
      </div>
      <form class="p-5 w-100 mx-auto bg-light rounded" style="position: relative; top: 25px;">
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $pessoa['nome']; ?>" required readonly>
          </div>
          <div class="form-group col-md-5">
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $pessoa['email']; ?>" required readonly>
          </div>
        </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="endereco">Endereço: </label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="<?php echo $pessoa['endereco']; ?>" required readonly>
          </div>
          <div class="form-group col-md-4">
            <label for="cidade">Cidade: </label>
            <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $pessoa['cidade']; ?>" required readonly>
          </div>
          <div class="form-group col-md-2">
            <label for="estado">Estado: </label>
            <input type="text" name="estado" id="estado" class="form-control" value="<?php echo $pessoa['estado']; ?>" required readonly>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="celular">Celular: </label>
            <input type="tel" name="celular" id="celular" class="form-control" value="<?php echo $pessoa['celular']; ?>" required readonly>
          </div>
          <div class="form-group col-md-5">
            <label for="data-nascimento">Data de nascimento: </label>
            <input type="date" name="data-nascimento" id="data-nascimento" class="form-control" value="<?php echo $pessoa['datanascimento']; ?>" required readonly>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-7">
            <label for="profissao">Profissão: </label>
            <input type="text" name="profissao" id="profissao" class="form-control" value="<?php echo $pessoa['profissao']; ?>" required readonly>
          </div>
          <div class="form-group col-md-5">
            <label for="tipo" style="margin-bottom: 0.2em;">Tipo: </label>
            <input type="text" id="tipo" class="form-control mt-1" value="<?php echo $pessoa['tipo']; ?>" required readonly>
          </div>
        </div>
      </form>
    </section>
    <section id="localizacao" class="w-75 mx-auto my-5 position-relative d-flex flex-column align-items-center justify-content-center" style="max-width: 1200px;">
      <div id="top-bar" class="bg-info position-absolute fixed-top rounded-top d-flex align-items-center w-100 mx-auto" style="height: 50px;">
        <svg class="ml-3" style="color: white;" width="25px" height="25px" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M12.166 8.94C12.696 7.867 13 6.862 13 6A5 5 0 0 0 3 6c0 .862.305 1.867.834 2.94.524 1.062 1.234 2.12 1.96 3.07A31.481 31.481 0 0 0 8 14.58l.208-.22a31.493 31.493 0 0 0 1.998-2.35c.726-.95 1.436-2.008 1.96-3.07zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
          <path fill-rule="evenodd" d="M8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
        </svg>
        <h2 class="h4 text-center text-light m-0 ml-2 mb-1" style="font-size: 1.2em;">Localização de <?php echo $pessoa['nome']; ?></h2>
      </div>
      <div id="map" class="w-100" style="position: relative; top: 50px; max-width: 1200px; height: 450px; background-color: #EBEBEB;"><p class="text-center w-100 h-100 d-flex align-items-center justify-content-center">Mapa não disponível</p></div>
    </section>
    <div class="spacer w-100" style="height: 100px;"></div>
  </main>
  <?php include('../templates/footer.php'); ?>

  <!-- Geocoding -->
  <!-- <script src="https://maps.googleapis.com/maps/api/geocode/json?address=<?php echo $pessoa['endereco']; ?>+<?php echo $pessoa['estado']; ?>+<?php echo $pessoa['estado']; ?>&components=country:BR
&key=API_KEY"></script> -->

  <!-- Google Maps API -->
  <!-- <script>
    function initMap() {
      var location = {
        lat: -25.344,
        lng: 131.036
      };

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: location
      });

      var marker = new google.maps.Marker({
        position: location,
        map: map
      });
    }
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEY(Tirei minha API Key, mas estava funcionando corretamente)&callback=initMap" type="text/javascript"></script> -->


</body>

</html>