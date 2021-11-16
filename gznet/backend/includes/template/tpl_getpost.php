<?php
/**
* ./includes/template/tpl_getpost.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 Lѓgica Digital
* Descriчуo: Recupera os dados das variсveis padrѕes por get ou post.
*/

//*** Leitura das variсveis de formulсrio
	// Verifica o mщtodo utilizado para passagem de variсveis
	if (( $_GET['acao'] != '' ) || ( $_GET['itens'] != '' ))
	{
		// Mщtodo GET
		$var_acao	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['acao'] ))) ;
		$var_id		= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
	}
	else
	{
		// Mщtodo POST
		$var_acao	= ltrim ( rtrim ( str_replace ( "'" , "" , $_POST['acao'] ))) ;
		$var_id		= ltrim ( rtrim ( str_replace ( "'" , "" , $_POST['id'] ))) ;
	}
	$var_ordem	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['ordem'] ))) ;
	$var_busca	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['busca'] ))) ;
	$var_itens	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['itens'] ))) ;
	$var_filtro	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['filtro'] ))) ;
	$var_pagina = ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['pagina'] ))) ;
	// Trata a variсvel de aчуo
	$var_acao	= substr ( strtoupper ( $var_acao ) , 0 , 1 ) ;
?>