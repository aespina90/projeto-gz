<?php
/**
* ./vendedores/processacadastro.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Adiciona, edita, deleta.
* :TODO: upload de imagem n�o funciona
* :WARNING: tamanho da imagem
*/
//*** In�cio da sess�o
    session_start() ;

//*** Propriedades p�gina
	// N�vel
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

//*** Fun��o de seguran�a
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Leitura das vari�veis de formul�rio
	$post['idgrupo']		=   trim ( str_replace ( "'" , "" , $_POST['id'] )) ;
	$post['grupo']			=   trim ( str_replace ( "'" , "" , $_POST['nome'] )) ;
	$post['status']			=   trim ( str_replace ( "'" , "" , $_POST['status'] )) ;
	$post['descricao']		=   trim ( str_replace ( "'" , "" , $_POST['descricao'] )) ;

	( $post['status'] == 'A' ) ? $post['ativo'] = 'A' : $post['ativo'] = 'I' ;

//*** Vari�veis locais
	// Nome da tabela
	$default['tabela']	= 'tbsegurancagrupos' ;

//*** Inclus�es:
	// Template: Valida��o de vari�veis
	require ( $template['valvars'] ) ;

//*** Grava os dados
	if ( $var_acao == 'A' ) // altera todos os dados do usu�rio com os novos
	{
		// Sele��o de registros da tabela
		$rs_sql     = 'UPDATE '. $default['tabela'] .' SET ';
		// Dados a serem alterados
		$rs_sql   .= 'grupo = "'. $post['grupo'] .'", '.
					 'status = "'. $post['status'] .'", '.
					 'descricao = "'. $post['descricao'] .'"' ;

		// Condi��o de igualdade para conex�o com banco de dados
		$rs_teste  .= ' WHERE id = "'. $post['idgrupo'] .'" ' ;
		// Atribui��o do comando
		$rs_sql    .= $rs_teste . $rs_busca ;
		// Execu��o do comando
		$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ;
		// Retorna mensagem de aviso
		$msg_aviso  = 'Registro alterado com sucesso!' ;
	}
	elseif ( $var_acao == 'I' ) // inclui o registro do usu�rio
	{
//*** Insere os dados do vendedor no banco de dados

		$rs_sql		= 'INSERT INTO '. $default['tabela'] ;
		// Atribui��o
		$rs_sql	 .= ' ( grupo, status, descricao ) values("'.
					$post['grupo'] . '" , "' . $post['status'] . '" , "' .
                                        $post['descricao'] . '")';

		$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error());
		// Retorna mensagem de aviso
		$msg_aviso  = 'Registro inclu�do com sucesso!' ;
	}
	elseif ( $var_acao == 'E' ) // exclui o registro do usu�rio
	{
		//A��o
		$rs_sql = 'DELETE FROM '. $default['tabela'] ;
		// Atribui��o
		$rs_sql	 .= ' WHERE id = '.$var_id ;
		// Execu��o do comando
		$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error());
		// Retorna mensagem de aviso
		$msg_aviso  = 'Registro exclu�do com sucesso!' ;
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql ) ;
?>

<script language="javascript">
	alert("<?php print $msg_aviso ?>");
	document.location.href='index.php?pagina=<?php echo $var_pagina?>&itens=<?php echo $var_itens?>&ordem=<?php echo $var_ordem?>&busca=<?php echo $var_busca?>';
</script>
