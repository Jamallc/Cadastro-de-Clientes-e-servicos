<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));

$sql = "select count(*) as total from cliente where email = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
  $_SESSION['usuario_existe'] = true;
  header('Location: cadastro.php?cadastro=erro');
  exit;
}

$sqlm = "INSERT INTO cliente (nome, email, telefone, data_cadastro) VALUES ('$nome', '$email', '$telefone', NOW())";
if($conexao->query($sqlm) === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php?cadastro=sucesso');
exit;
?>