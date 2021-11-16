<?php
session_start();
include('inc_conexao_interno.php');
include('inc_funcoes.php');

$iduser  = $_REQUEST['iduser'];
$idfile  = $_REQUEST['idfile'];
$ip      = $_SERVER['REMOTE_ADDR'];

$rs_sql   = 'INSERT INTO logarquivos (arquivo,usuario,data,ip) VALUES ("'.$idfile.'", '.$iduser.', NOW(), "'.$ip.'")';
$rs_query = mysql_query($rs_sql,$conexao['conexao']) or die(mysql_error());

echo "<script>history.go(-1);</script>";

?>