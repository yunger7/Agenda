<?php
session_start();
include('conecta.php');

if ($_SESSION["status"] != "ok") {
  header('location: index.php');
}

$idRestaurar = $_GET['id'];

$res = mysqli_query($conn, "SELECT * FROM expessoa WHERE id = '$idRestaurar'");

while ($pessoa = mysqli_fetch_array($res)) {
  $tipo = $pessoa['tipo'];
  $nome = $pessoa['nome'];
  $endereco = $pessoa['endereco'];
  $cidade = $pessoa['cidade'];
  $estado = $pessoa['estado'];
  $celular = $pessoa['celular'];
  $email = $pessoa['email'];
  $dataNascimento = $pessoa['datanascimento'];
  $profissao = $pessoa['profissao'];
  $expessoa = mysqli_query($conn, "INSERT INTO pessoa(tipo, nome, endereco, cidade, estado, celular, email, datanascimento, profissao) VALUES ('$tipo', '$nome', '$endereco', '$cidade', '$estado', '$celular', '$email', '$dataNascimento', '$profissao')");
}

if (mysqli_query($conn, "DELETE FROM expessoa WHERE id = '$idRestaurar'")) {
  echo "
    <script language = 'javascript' type = 'text/javascript'>
      alert('Pessoa restaurada com sucesso!');
      window.location.href = '../pessoas-deletadas.php';
    </script>
  ";
} else {
  echo "
    <script language = 'javascript' type = 'text/javascript'>
      alert('Pessoa restaurada com sucesso!');
      window.location.href = '../pessoas-deletadas.php';
    </script>
  ";
}

mysqli_free_result($res);
mysqli_close($conn);

?>