<?php
$conexao['root'] = "mysql01.gzsistemas.com.br";
$conexao['name'] = "gzsistemas11";
$conexao['user'] = "gzsistemas11";
$conexao['pass'] = "fatality69";

$conexao['conexao'] = mysql_connect($conexao['root'], $conexao['user'], $conexao['pass']) or die (mysql_error());
mysql_select_db($conexao['name'], $conexao['conexao']);
?>