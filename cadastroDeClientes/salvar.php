<?php
include("conexao.php");

$id = $_POST['id'];
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$pesquisa = $_GET["nome"];

$salve = "UPDATE `cliente` SET `nome`='$nome', `email`='$email', `telefone`='$telefone' WHERE `id` = '$id'";

// $query = $conexao->query($salve);    
$query = mysqli_query($conexao, $salve);

if(!$query){
  echo("Erro: ". mysqli_error($conexao));
} else {
  mysqli_close($conexao);
  
  header("Location: consulta.php?edita=sucesso&nome=".$pesquisa);
  exit;
}

?>