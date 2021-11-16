<?php
include('../inc_conexao.php');

$sql_1 = mysql_query("select * from banner where id = ".addslashes($_GET['idBannser'])."");
$row_1 = mysql_fetch_assoc($sql_1);

@unlink("../uploads/" . $row_1['imagem']);


$novonome  = strtolower(rand(000,999) . $_FILES['arquivo']['name']);
$novonome  = ereg_replace("[^a-zA-Z0-9_.]", "", 
strtr($novonome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
"aaaaeeiooouucAAAAEEIOOOUUC_"));

$imagem_dir   = "../uploads/" . $novonome;

move_uploaded_file($_FILES['arquivo']['tmp_name'], $imagem_dir);

$sql = mysql_query("update banner set imagem = '".$novonome."', link = '".addslashes($_POST['link'])."' where id = ".addslashes($_GET['idBannser'])."");

print("<script>window.location.href=('principal.php');</script>");




?>