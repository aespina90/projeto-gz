<?php
/**
* ./includes/template/tpl_valvars.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 Lуgica Digital
* Descriзгo: Verifica e valida as variбveis.
*/

//*** Validaзгo de variбveis
	// Verifica se o id й numйrico
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
	// Verifica a quantidade de itens por pбgina
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