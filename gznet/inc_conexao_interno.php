<?php
$conexao['root'] = "mysql04-farm59.uni5.net";
$conexao['name'] = "gznet";
$conexao['user'] = "gznet";
$conexao['pass'] = "gz2015infra";

$conexao['conexao'] = mysql_connect($conexao['root'], $conexao['user'], $conexao['pass']) or die (mysql_error());
mysql_select_db($conexao['name'], $conexao['conexao']);

error_reporting(E_ERROR);
?>