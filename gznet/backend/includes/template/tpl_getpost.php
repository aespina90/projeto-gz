<?php
/**
* ./includes/template/tpl_getpost.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 L�gica Digital
* Descri��o: Recupera os dados das vari�veis padr�es por get ou post.
*/

//*** Leitura das vari�veis de formul�rio
	// Verifica o m�todo utilizado para passagem de vari�veis
	if (( $_GET['acao'] != '' ) || ( $_GET['itens'] != '' ))
	{
		// M�todo GET
		$var_acao	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['acao'] ))) ;
		$var_id		= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
	}
	else
	{
		// M�todo POST
		$var_acao	= ltrim ( rtrim ( str_replace ( "'" , "" , $_POST['acao'] ))) ;
		$var_id		= ltrim ( rtrim ( str_replace ( "'" , "" , $_POST['id'] ))) ;
	}
	$var_ordem	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['ordem'] ))) ;
	$var_busca	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['busca'] ))) ;
	$var_itens	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['itens'] ))) ;
	$var_filtro	= ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['filtro'] ))) ;
	$var_pagina = ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['pagina'] ))) ;
	// Trata a vari�vel de a��o
	$var_acao	= substr ( strtoupper ( $var_acao ) , 0 , 1 ) ;
?>