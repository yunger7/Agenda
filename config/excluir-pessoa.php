<?php
session_start();
include('conecta.php');
$idExcluir = $_GET['id'];

$res = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = '$idExcluir'");
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
  $usuario = $_SESSION["user"];
  $data = date('Y-m-d');
  $expessoa = mysqli_query($conn, "INSERT INTO expessoa(tipo, nome, endereco, cidade, estado, celular, email, datanascimento, profissao, usuario, data) VALUES ('$tipo', '$nome', '$endereco', '$cidade', '$estado', '$celular', '$email', '$dataNascimento', '$profissao', '$usuario', '$data')");
}

mysqli_free_result($res);

$sql = "DELETE FROM pessoa WHERE id = '$idExcluir'";

if (mysqli_query($conn, $sql)) {
  echo "
    <script language='javascript' type='text/javascript'>
      alert('Pessoa excluído com sucesso!');
      window.location.href = '../pessoas.php';
    </script>
  ";
} else {
  echo "
    <script language='javascript' type='text/javascript'>
      alert('Houve um problema ao excluir a pessoa');
      window.location.href = '../pessoas.php';
    </script>
  ";
}
mysqli_close($conn);
?>
