<?php
/**
* ./vendedores/processacadastro.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Adiciona, edita, deleta.
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
	$post['idgrupo']		=   trim ( str_replace ( "'" , "" , $_POST['idgrupo'] )) ;
	$post['nome']			=   trim ( str_replace ( "'" , "" , $_POST['nome'] )) ;
	$post['email']			=   trim ( str_replace ( "'" , "" , $_POST['email'] )) ;
	$post['telefone']		=   trim ( str_replace ( "'" , "" , $_POST['telefone'] )) ;
	$post['ramal']			=   trim ( str_replace ( "'" , "" , $_POST['ramal'] )) ;
	$post['celular']		=   trim ( str_replace ( "'" , "" , $_POST['celular'] )) ;
	$post['departamento']	=   trim ( str_replace ( "'" , "" , $_POST['departamento'] )) ;
	$post['funcao']  		=   trim ( str_replace ( "'" , "" , $_POST['funcao'] )) ;
	$post['login']			=   trim ( str_replace ( "'" , "" , $_POST['login'] )) ;
	$post['senha']  		=   trim ( str_replace ( "'" , "" , $_POST['senha'] )) ;
	$post['status']			=	trim ( str_replace ( "'" , "" , $_POST['status'] )) ;


//*** Variáveis locais
	// Nome da tabela
	$default['tabela']	= 'tbsegurancausuarios' ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;

//*** Grava os dados
	if ( $var_acao == 'A' ) // altera todos os dados do usuário com os novos
	{
		// Seleção de registros da tabela
		$rs_sql     = 'UPDATE '. $default['tabela'] .' SET ';
		// Dados a serem alterados
		$rs_sql   .= 'idgrupo = "'. $post['idgrupo'] .'", '.
					 'nome = "'. $post['nome'] .'", '.
					 'email = "'. $post['email'] .'", '.
					 'telefone = "'. $post['telefone'] .'", '.
					 'ramal = "'. $post['ramal'] .'", '.
					 'celular = "'. $post['celular'] .'", '.
					 'departamento = "'. $post['departamento'] .'", '.
					 'funcao = "'. $post['funcao'] .'", '.
					 'login = "'. $post['login'] .'", '.
					 'senha = "'. $post['senha'] .'", '.
					 'status = "'. $post['status'] .'"' ;

		// Condição de igualdade para conexão com banco de dados
		$rs_teste  .= ' WHERE id = "'. $var_id .'" ' ;
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
		$rs_sql	 .= ' ( idgrupo, nome, email, telefone, ramal, celular, departamento, funcao, '.
					' login, senha, status) VALUES ("'. $post['idgrupo'] .'", "'. $post['nome'] .'", '.
					'"'. $post['email'] .'", "'. $post['telefone'] .'", "'. $post['ramal'] .'", '.
					'"'. $post['celular'] .'", "'. $post['departamento'] .'", "'. $post['funcao'] .'", '.
					'"'. $post['login'] .'", "'. $post['senha'] .'", "'. $post['status'] .'") ' ;
		// Execução do comando
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
