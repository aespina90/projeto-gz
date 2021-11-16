<?php
/**
* ./lettera/secoes/processacadastro.php
* @author Jo�o V�tor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Adiciona, edita, deleta.
*/
//*** In�cio da sess�o
    session_start() ;
//*** N�vel da p�gina
	$default['nivel'] = '../../' ;
	// N�mero do m�dulo
	$default['modulo'] = 2 ;

//*** Inclus�es:
    // Configura��es da aplica��o
    require ( $default['nivel'] . 'global.php' ) ;
    // Conex�o com o banco de dados
    require ( $include['conexao'] ) ;
    // Fun�oes
    require ( $include['funcao'] ) ;
    // Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

//*** Vari�veis locais
	// Nome da tabela
	$default['tabela']		= 'tbletterasecoes' ;

//*** Fun��o de seguran�a
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Inclus�es:

	$post['secao']			=   trim ( str_replace ( "'" , "" , $_POST['secao'] )) ;

//*** Valida��o de vari�veis
	// Id
	if ( !is_numeric ( $var_id ))
	{
		$var_id		= 0 ;
		$var_acao	= 'I' ;
	}
	else
	{
		$var_id = intval ( $var_id ) ;
	}

//*** Updating
	If ($var_acao == "A")
        {
		//Fazendo UPDATE na tabela tbSecoes
		$rs_sql = "UPDATE " . $default['tabela']. " SET secao = '".$post['secao']."' WHERE id = ". $var_id;
		// Execu��o do comando
		$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ; ;
		// Retorna mensagem de aviso
		$msg_aviso = "Registro alterado com sucesso!";
	}
	If ($var_acao == "I"){
		//Fazendo INSERT na tabela tbSesoes
		$rs_sql = "INSERT INTO " . $default['tabela']. " (secao) VALUES ('".$post['secao']."')";
		// Execu��o do comando
		$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ;
		// Retorna mensagem de aviso
		$msg_aviso = "Registro inclu�do com sucesso!";
	}
	If ($var_acao == "E"){
		//Fazendo DELETE na tabela tbSesoes
		$rs_sql = "DELETE FROM " . $default['tabela']. " WHERE id = " . $var_id ;
		// Execu��o do comando
		$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ;
		// Retorna mensagem de aviso
		$msg_aviso = "Registro exclu�do com sucesso!";
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql ) ;
?>
<script language="javascript">
	alert("<?php print $msg_aviso ?>");
	document.location.href='index.php?pagina=<?php echo $var_pagina?>&itens=<?php echo $var_itens?>&ordem=<?php echo $var_ordem?>&busca=<?php echo $var_busca?>';
</script>