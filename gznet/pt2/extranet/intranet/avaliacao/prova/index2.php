<?php
session_start();
$cod = $_SESSION['cod'];
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

$con = mysql_connect('mysql02.gzsistemas.com.br', 'gzsistemas12', 'elearning8520') or die ("Erro de conexуo");
$res = mysql_select_db('gzsistemas12') or die ("Banco de dados inexistente");
//import_request_variables("g");

// Atualizaчуo do produto

if($_GET['acao'] == 'atualizar'){
	if(!empty($_GET['p']) && !empty($_GET['r_c']) && !empty($_GET['r_2']) && !empty($_GET['r_3']) && !empty($_GET['r_4']) && !empty($_GET['r_5'])){

			$sql = mysql_query("update aval_perguntas set pergunta = '".$_GET['p']."', r1 = '".$_GET['r_c']."',r2 = '".$_GET['r_2']."',r3 = '".$_GET['r_3']."',r4 = '".$_GET['r_4']."',r5 = '".$_GET['r_5']."',rc = '".$_GET['r_c']."' where id = '".$_GET['cod']."'");
			$res2 = mysql_query($sql);
			echo '1';
		
	}
}

// exclusуo de produtos
elseif($_GET['acao'] == 'excluir'){
	$consulta = "select status from aval_perguntas where id = '".$_GET['cod']."'";
	$cons = mysql_query($consulta);
	$c = mysql_fetch_row($cons);
	
	if($c[0] == 0){
		$sql = "update aval_perguntas set status = 1 where id = '".$_GET['cod']."'";
		$res = mysql_query($sql);
		echo '2';
	}else{
		$sql = "update aval_perguntas set status = 0 where id = '".$_GET['cod']."'";
		$res = mysql_query($sql);
		echo '3';
	}
}

// Cadastro de produtos
elseif($_GET['acao'] == 'cadastrar'){
if(!empty($_GET['p']) && !empty($_GET['r_c']) && !empty($_GET['r_2']) && !empty($_GET['r_3']) && !empty($_GET['r_4']) && !empty($_GET['r_5'])){
		
		
			$sql = "insert into aval_perguntas values (null, {$cod}, '".$_GET['p']."', '".$_GET['r_c']."', '".$_GET['r_2']."', '".$_GET['r_3']."', '".$_GET['r_4']."', '".$_GET['r_5']."', 0, '".$_GET['r_c']."', 1) ";
			$res2 = mysql_query($sql);
			$novo_codigo = mysql_insert_id($con);
			
			//retorna a mensagem de confirmaчуo de cadasro do produto
			echo "4";

	}else{
		echo 'Vocъ deve preencher todos os campos!';
	}
}
?>