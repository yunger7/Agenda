<?php
include('conecta.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$celular = $_POST['celular'];
$dataNascimento = $_POST['data-nascimento'];
$profissao = $_POST['profissao'];
$tipo = $_POST['tipo'];

// VERIFICAR SE EXISTE REGISTRO NO BANCO
$pessoa = mysqli_query($conn, "SELECT * FROM pessoa WHERE nome = '$nome' AND email = '$email'");
if(mysqli_num_rows($pessoa) > 0){
  echo "
    <script language='javascript' type='text/javascript'>
      alert('Essa pessoa já está cadastrada!');
      window.location.href = '../pessoas.php';
    </script>
  ";
  mysqli_close($conn);
} else {
  $sql = "INSERT INTO pessoa (tipo, nome, endereco, cidade, estado, celular, email, datanascimento, profissao) VALUES ('$tipo', '$nome', '$endereco', '$cidade', '$estado', '$celular', '$email', '$dataNascimento', '$profissao')";

  if(mysqli_query($conn, $sql)){
    mysqli_close($conn);
    echo "
      <script language='javascript' type='text/javascript'>
        alert('Pessoa cadastrada com sucesso!');
        window.location.href = '../pessoas.php';
      </script>
    ";
  } else {
    mysqli_close($conn);
    echo "
      <script language='javascript' type='text/javascript'>
        alert('Houve um problema ao cadastrar a pessoa');
        window.location.href = '../cadastrar-pessoas.php';
      </script>
    ";
  }
  
  mysqli_close($conn);
}



?>