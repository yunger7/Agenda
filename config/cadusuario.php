<?php
include('conecta.php');

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = base64_encode($_POST['senha']);
$tipo = $_POST['tipo'];

// VERIFICAR SE EXISTE REGISTRO NO BANCO
$usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE nome = '$nome' AND login = '$login'");
if (mysqli_num_rows($usuario) > 0) {
  echo "
    <script language='javascript' type='text/javascript'>
      alert('Esse usuário já está cadastrado!');
      window.location.href = '../usuarios.php';
    </script>
  ";
  mysqli_close($conn);
} else {
  $sql = "INSERT INTO usuario (nome, login, senha, tipo) VALUES ('$nome', '$login', '$senha', '$tipo')";

  if (mysqli_query($conn, $sql)) {
    echo "
      <script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');
        window.location.href = '../usuarios.php';
      </script>
    ";
  } else {
    echo "
      <script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar o usuário!');
        window.location.href = '../usuarios.php';
      </script>
    ";
  }

  mysqli_close($conn);
}
