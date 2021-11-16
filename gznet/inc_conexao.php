<?php
$conexao['root'] = "mysql04-farm59.uni5.net";
$conexao['name'] = "gznet";
$conexao['user'] = "gznet";
$conexao['pass'] = "gz2015infra";

$conexao['conexao'] = mysql_connect ( $conexao['root'] , $conexao['user'] , $conexao['pass'] ) or die ('ERRO AO CONECTAR!') ;
mysql_select_db ( $conexao['name'] , $conexao['conexao'] ) ;

ini_set('short_open_tag',1);
ini_set('magic_quotes_runtime',0);
ini_set('magic_quotes_sybase',0);
ini_set('sql.safe_mode',0);

error_reporting(E_ERROR);
?>