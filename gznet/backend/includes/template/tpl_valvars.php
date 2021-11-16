<?php
/**
* ./includes/template/tpl_valvars.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 L�gica Digital
* Descri��o: Verifica e valida as vari�veis.
*/

//*** Valida��o de vari�veis
	// Verifica se o id � num�rico
	if ( !is_numeric ( $var_id ))
	{
		$var_id		= 0 ;
		$var_acao	= 'I' ;
	}
	else
	{
		$var_id = intval ( $var_id ) ;
	}
	// Verifica se existe uma ordem
	if ( strlen ( $var_ordem ) == 0 )
	{
		$var_ordem = $default['ordem'] ;
	}
	// Verifica a quantidade de itens por p�gina
	if ( !is_numeric ( $var_itens ))
	{
		$var_itens = 1000 ;
	}
	else
	{
		$var_itens = intval ( $var_itens ) ;
	}
	// Verifica o filtro utilizado
	if ( strlen ( $var_filtro ) == 0 )
	{
		$var_filtro = $default['filtro'] ;
	}
?>