<?php
/**
* ./lettera/secoes/processacadastro.php
* @author João Vítor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Adiciona, edita, deleta.
*/
//*** Início da sessão
    session_start() ;
//*** Nível da página
	$default['nivel'] = '../../' ;
	// Número do módulo
	$default['modulo'] = 2 ;

//*** Inclusões:
    // Configurações da aplicação
    require ( $default['nivel'] . 'global.php' ) ;
    // Conexão com o banco de dados
    require ( $include['conexao'] ) ;
    // Funçoes
    require ( $include['funcao'] ) ;
    // Template: Leitura de _Get e/ou _Post
	require ( $template['getpost'] ) ;

//*** Variáveis locais
	// Nome da tabela
	$default['tabela']		= 'tbletterasecoes' ;

//*** Função de segurança
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Inclusões:

	$post['secao']			=   trim ( str_replace ( "'" , "" , $_POST['secao'] )) ;

//*** Validação de variáveis
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
		// Execução do comando
		$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ; ;
		// Retorna mensagem de aviso
		$msg_aviso = "Registro alterado com sucesso!";
	}
	If ($var_acao == "I"){
		//Fazendo INSERT na tabela tbSesoes
		$rs_sql = "INSERT INTO " . $default['tabela']. " (secao) VALUES ('".$post['secao']."')";
		// Execução do comando
		$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ;
		// Retorna mensagem de aviso
		$msg_aviso = "Registro incluído com sucesso!";
	}
	If ($var_acao == "E"){
		//Fazendo DELETE na tabela tbSesoes
		$rs_sql = "DELETE FROM " . $default['tabela']. " WHERE id = " . $var_id ;
		// Execução do comando
		$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die(mysql_error()) ;
		// Retorna mensagem de aviso
		$msg_aviso = "Registro excluído com sucesso!";
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql ) ;
?>
<script language="javascript">
	alert("<?php print $msg_aviso ?>");
	document.location.href='index.php?pagina=<?php echo $var_pagina?>&itens=<?php echo $var_itens?>&ordem=<?php echo $var_ordem?>&busca=<?php echo $var_busca?>';
</script>