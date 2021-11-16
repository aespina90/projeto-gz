<?php

	if(IsSet($_SESSION['usuario'])){
		$usuario = $_SESSION['usuario'];
		}
		
	if(IsSet($_SESSION['senha'])){
		$senha = $_SESSION['senha'];
		}
	
	if(!(empty($usuario) OR empty($senha))){
	
	$link = mysql_connect('mysql02.gzsistemas.com.br','gzsistemas12','elearning8520');
	mysql_query('USE gzsistemas12');

	
	$res = mysql_query("SELECT * FROM users WHERE login='$usuario' AND password = '$senha'");
	$linhas = mysql_fetch_row($res);
	


		if(!$linhas){

			header("location: ../index.php");
			
		}
	}else{
		header("location: ../index.php");
	};
	
	
	mysql_close($link);
?>