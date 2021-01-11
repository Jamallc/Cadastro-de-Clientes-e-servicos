<?php
include("conexao.php");

$id_cliente = $_GET['id_cliente'];
$usu_codigo = $_GET['codigo_compra'];

$exclui = "DELETE FROM `compras` WHERE `id_compra` = '$usu_codigo'";

// $query = $conexao->query($salve);    
$query = mysqli_query($conexao, $exclui);

if(!$query){
  echo("Erro: ". mysqli_error($conexao));
} else {
  mysqli_close($conexao);
  
  header("Location: descricao.php?exclui=deletado&codigo=$id_cliente");
  exit;
}
?>