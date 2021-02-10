<?php
include('conecta.php');

$idDeletar = $_GET['id'];

if (mysqli_query($conn, "DELETE FROM expessoa WHERE id = '$idDeletar'")) {
  echo "
    <script language='javascript' type='text/javascript'>
      alert('Pessoa excluída permanentemente!');
      window.location.href = '../pessoas-deletadas.php';
    </script>
  ";
} else {
  echo "
    <script language='javascript' type='text/javascript'>
      alert('Houve um problema ao excluir a pessoa!');
      window.location.href = '../pessoas-deletadas.php';
    </script>
  ";
}

mysqli_close($conn);
?>