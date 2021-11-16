<?php
$conexao['root'] = "localhost";
$conexao['name'] = "site";
$conexao['user'] = "site";
$conexao['pass'] = "tiramao2469";

$conexao['conexao'] = mysql_connect ( $conexao['root'] , $conexao['user'] , $conexao['pass'] ) or die ('ERRO AO CONECTAR!') ;
mysql_select_db ( $conexao['name'] , $conexao['conexao'] ) ;

ini_set('short_open_tag',1);
ini_set('magic_quotes_runtime',0);
ini_set('magic_quotes_sybase',0);
ini_set('sql.safe_mode',0);

error_reporting(E_ALL ^ E_NOTICE);
?>