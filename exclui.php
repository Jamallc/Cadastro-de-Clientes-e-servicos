<?php
session_start();
include("conexao.php");

$usu_codigo = $_GET['codigo'];

$pesquisa = $_SESSION["pesquisa"];

$exclui = "DELETE FROM `cliente` WHERE `id` = '$usu_codigo'";

// $query = $conexao->query($salve);    
$query = mysqli_query($conexao, $exclui);


$id_cliente = $_GET['id_cliente'];

$exclui = "DELETE FROM `compras` WHERE `id_cliente` = '$usu_codigo'";

$query = mysqli_query($conexao, $exclui);

if(!$query){
  echo("Erro: ". mysqli_error($conexao));
} else {
  mysqli_close($conexao);
  
  header("Location: consulta.php?exclui=deletado&nome=$pesquisa");
  exit;
}
?>