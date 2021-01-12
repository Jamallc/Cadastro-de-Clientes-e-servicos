<?php
define('HOST', 'localhost');
define('USUARIO', 'banco');
define('SENHA', 'banco');
define('DB', 'cadastrocliente');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar!');

?>
