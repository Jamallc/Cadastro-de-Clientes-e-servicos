<?php
include("conexao.php");

$id_compra = trim($_POST['id_compra']);
$id_cliente = trim($_POST['id_cliente']);
$nome = trim($_POST['nome']);
$desc_servico = trim($_POST['desc_servico']);
$desc_produto = trim($_POST['desc_produto']);

$salve = "UPDATE `compras` SET `id_cliente`='$id_cliente', `nome`='$nome', `desc_servico`='$desc_servico', `desc_produto`='$desc_produto' WHERE `id_compra` = '$id_compra'";
// $query = $conexao->query($salve);    
$query = mysqli_query($conexao, $salve);

if(!$query){
  echo("Erro: ". mysqli_error($conexao));
} else {
  mysqli_close($conexao);
  
  header("Location: descricao.php?edita=sucesso&codigo=$id_cliente");
  exit;
}

?>