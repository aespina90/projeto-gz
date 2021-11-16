<?php
/**
* ./vendedores/mudastatus.php
* @author João Vítor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Troca status da promoção
*/

//*** Início da sessão
    session_start() ;

//*** Nível da página
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

//*** Leitura das variáveis de formulário
    // A ação é lida antes pois pode ser utilizada na fun_segurança
    $var_acao    = ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['acao'] ))) ;
    $var_acao    = substr ( strtoupper ( $var_acao ) , 0 , 1 ) ;

//*** Função de segurança
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Leitura das variáveis de formulário
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
