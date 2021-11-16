<?php
/**
* ./includes/template/tpl_recordset.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 Lуgica Digital
* Descriзгo: Grava os dados para paginaзгo e conecta ao banco de dados.
*/
	//*** Conexгo com o banco de dados - Dados de paginaзгo
	// Seleзгo de registros da tabela
	$rs_sql     = 'SELECT * FROM '. $default['tabela'] ;
	// Filtragem de busca
	if ( $var_busca != '' )
	{
	  	if ( $rs_teste == '' )
	  	{
	  		$rs_busca = ' WHERE ' . $default['busca'] . ' LIKE "%' . $var_busca . '%"' ;
	  	}
	  	else
	  	{
	  		$rs_busca = ' AND ' . $default['busca'] . ' LIKE "%' . $var_busca . '%"' ;
	  	}
	}
	// Atribuiзгo do comando
	$rs_sql    .= $rs_teste . $rs_busca ;
	// Execuзгo do comando
	$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
	// Nъmero de registros encontrados
	$rs_linhas  = mysql_num_rows ( $rs_query ) ;
	// Grava o nъmero de registros encontrados
	$var_registro = $rs_linhas ;
	// Grava o nъmero de pбginas por itens
	$var_totalpaginas = ceil ( $rs_linhas / $var_itens ) ;
	// Verifica o nъmero da pбgina
	if (( $var_pagina == '' ) or ( intval ( $var_pagina ) < 1 ))
	{
	  	// Reseta o nъmero da pбgina
		$var_pagina = 1 ;
		// Reseta o marcador de registro
		$num_inicio = 0 ;
	}
	else
	{
		if ( intval ( $var_pagina ) > $rs_linhas )
		{
		  	// Seta a pбgina como a ъltima
			$var_pagina = $rs_linhas ;
			// Seta o marcador de registros para os ъltimos n itens
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
		else
		{
		  	// Seta o marcador de registro para os itens da pбgina atual
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
	}

//*** Conexгo com o banco de dados - Dados para impressгo
	// Seleзгo de registros da tabela
	$rs_sql     = 'SELECT * FROM '. $default['tabela'] ;
	// Filtragem de busca
	if ( $var_busca != '' )
	{
		if ( $rs_teste == '' )
	  	{
	  		$rs_busca = ' WHERE ' . $default['busca'] . ' LIKE "%' . fun_tratamento_data($var_busca ,'E') . '%"' ;
	  	}
	  	else
	  	{
	  		$rs_busca = ' AND ' . $default['busca'] . ' LIKE "%' . fun_tratamento_data($var_busca ,'E') . '%"' ;
	  	}
	}
	// Ordenaзгo de dados
	if ( $var_ordem != '' )
	{
		$rs_ordem = ' ORDER BY '. Str_Replace ( '%20' , ' ' , $var_ordem) ;
	}
	// Limite de dados na tela??
	$rs_maximo  = ' LIMIT 0, 100' ;
	// Atribuiзгo do comando
	$rs_sql    .= $rs_teste . $rs_busca . $rs_ordem . $rs_maximo ;
	//print $rs_sql;
	// Execuзгo do comando
	$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
	// Nъmero de registros encontrados
	$rs_linhas  = mysql_num_rows ( $rs_query ) ;
	
	
	//recupera o nome da empresa
	$rs_sql_empresa = 'SELECT nomefantasia FROM tbEmpresas_Cadastro WHERE id = "'.$var_idempresa.'"';
	$rs_query_empresa = mysql_query ( $rs_sql_empresa , $conexao['conexao'] ) or die (mysql_error()) ;
	$rs_linhas_empresa = mysql_num_rows( $rs_query_empresa ) ;
	if($rs_linhas_empresa > 0)
	{
		$rs_dados_empresa = mysql_fetch_array( $rs_query_empresa  );
	}
	
?>