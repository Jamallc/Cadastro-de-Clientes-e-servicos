<?php
session_start();
include("conexao.php");
$usu_cliente = $_GET['codigo'];

// $id_cliente = $usu_codigo;
$id_cliente = mysqli_real_escape_string($conexao, trim($_POST['id_cliente']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$desc_servico = mysqli_real_escape_string($conexao, trim($_POST['desc_servico']));
$desc_produto = mysqli_real_escape_string($conexao, trim($_POST['desc_produto']));

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

$sqlm = "INSERT INTO compras (id_cliente, nome, desc_servico, desc_produto, data_compra) VALUES ('$id_cliente', '$nome', '$desc_servico', '$desc_produto', NOW())";
if($conexao->query($sqlm) === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header("Location: descricao.php?codigo=$id_cliente&descricao=sucesso");
exit;
?>