<?php
/**
* ./vendedores/processacadastro.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Adiciona, edita, deleta.
* :TODO: upload de imagem não funciona
* :WARNING: tamanho da imagem
*/
//*** Início da sessão
    session_start() ;

//*** Propriedades página
	// Nível
	$default['nivel'] = '../../' ;
	// Número do módulo
	$default['modulo'] = 1 ;

//*** Inclusões:
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
	// Conexão com o banco de dados
	require ( $include['conexao'] ) ;
	// Funçoes
	require ( $include['funcao'] ) ;
	// Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

//*** Função de segurança
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Leitura das variáveis de formulário
	$post['idgrupo']		=   trim ( str_replace ( "'" , "" , $_POST['id'] )) ;
	$post['grupo']			=   trim ( str_replace ( "'" , "" , $_POST['nome'] )) ;
	$post['status']			=   trim ( str_replace ( "'" , "" , $_POST['status'] )) ;
	$post['descricao']		=   trim ( str_replace ( "'" , "" , $_POST['descricao'] )) ;

	( $post['status'] == 'A' ) ? $post['ativo'] = 'A' : $post['ativo'] = 'I' ;

//*** Variáveis locais
	// Nome da tabela
	$default['tabela']	= 'tbsegurancagrupos' ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;

//*** Grava os dados
	if ( $var_acao == 'A' ) // altera todos os dados do usuário com os novos
	{
		// Seleção de registros da tabela
		$rs_sql     = 'UPDATE '. $default['tabela'] .' SET ';
		// Dados a serem alterados
		$rs_sql   .= 'grupo = "'. $post['grupo'] .'", '.
					 'status = "'. $post['status'] .'", '.
					 'descricao = "'. $post['descricao'] .'"' ;

		// Condição de igualdade para conexão com banco de dados
		$rs_teste  .= ' WHERE id = "'. $post['idgrupo'] .'" ' ;
		// Atribuição do comando
		$rs_sql    .= $rs_teste . $rs_busca ;
		// Execução do comando
		$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ;
		// Retorna mensagem de aviso
		$msg_aviso  = 'Registro alterado com sucesso!' ;
	}
	elseif ( $var_acao == 'I' ) // inclui o registro do usuário
	{
//*** Insere os dados do vendedor no banco de dados

		$rs_sql		= 'INSERT INTO '. $default['tabela'] ;
		// Atribuição
		$rs_sql	 .= ' ( grupo, status, descricao ) values("'.
					$post['grupo'] . '" , "' . $post['status'] . '" , "' .
                                        $post['descricao'] . '")';

		$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error());
		// Retorna mensagem de aviso
		$msg_aviso  = 'Registro incluído com sucesso!' ;
	}
	elseif ( $var_acao == 'E' ) // exclui o registro do usuário
	{
		//Ação
		$rs_sql = 'DELETE FROM '. $default['tabela'] ;
		// Atribuição
		$rs_sql	 .= ' WHERE id = '.$var_id ;
		// Execução do comando
		$rs_query   = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error());
		// Retorna mensagem de aviso
		$msg_aviso  = 'Registro excluído com sucesso!' ;
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql ) ;
?>

<script language="javascript">
	alert("<?php print $msg_aviso ?>");
	document.location.href='index.php?pagina=<?php echo $var_pagina?>&itens=<?php echo $var_itens?>&ordem=<?php echo $var_ordem?>&busca=<?php echo $var_busca?>';
</script>
