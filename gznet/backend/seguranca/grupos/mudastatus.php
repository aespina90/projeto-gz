<?php
/**
* ./vendedores/mudastatus.php
* @author Jo�o V�tor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Troca status da promo��o
*/

//*** In�cio da sess�o
    session_start() ;

//*** N�vel da p�gina
	$default['nivel'] = '../../' ;
	// N�mero do m�dulo
	$default['modulo'] = 1 ;

//*** Inclus�es:
    // Configura��es da aplica��o
	require ( $default['nivel'] . 'global.php' ) ;
	// Conex�o com o banco de dados
	require ( $include['conexao'] ) ;
	// Fun�oes
	require ( $include['funcao'] ) ;
	// Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

//*** Leitura das vari�veis de formul�rio
    // A a��o � lida antes pois pode ser utilizada na fun_seguran�a
    $var_acao    = ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['acao'] ))) ;
    $var_acao    = substr ( strtoupper ( $var_acao ) , 0 , 1 ) ;

//*** Fun��o de seguran�a
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Leitura das vari�veis de formul�rio
    $var_id        = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
    $var_ordem     = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['ordem'] ))) ;
    $var_busca     = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['busca'] ))) ;
    $var_itens     = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['itens'] ))) ;
    $var_status    = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['status'] ))) ;

//*** Checagem de valor (ativo / inativo)
	If ($var_status == "A")
	{
	$var_status = "I";
	$msg_aviso = "Status alterado com sucesso";
	}
	Else
	{
	$var_status = "A";
	$msg_aviso = "Status alterado com sucesso";
	}

	If (strlen($var_id) > 0 && is_numeric($var_id) == TRUE) {
		$rs_sql = "UPDATE tbsegurancagrupos SET status = '" . $var_status . "' WHERE id = " . $var_id. "";
		$rs_query    = mysql_query ( $rs_sql , $conexao['conexao'] ) ;

	}


?>

<script>
	document.location.href='index.php';
</script>
