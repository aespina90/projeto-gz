<?php
/**
* ./includes/inc_lembrete.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Lista de funcoes da aplicação.
*/
//*** Nível da página
	$default['nivel'] = '../' ;
//*** Inclusões:
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
	// Conexão com o banco de dados
	require ( $include['conexao'] ) ;
//*** Conexão com o banco de dados
	$sql['consulta'] = 'SELECT * FROM tbsegurancausuarios WHERE login = "'. $_POST['login'] .'" AND email = "'. $_POST['email'] .'"' ;
	$sql['conexao']  = mysql_query ( $sql['consulta'] , $conn['database'] ) ;
//*** Grava os registros encontrados
	$sql['retorno'] = mysql_num_rows ( $sql['conexao'] ) ;
//*** Verifica se o usuário foi encontrado
	if ( $sql['retorno'] > 0 )
	{
		// Autenticação de usuário
		$sql['linha'] = mysql_fetch_array ( $sql['conexao'] ) ;
		$mensagem['email']		= $_POST['email'] ;
		$mensagem['nome']		= $sql['linha']['nome'] ;
		$mensagem['login']		= $sql['linha']['login'] ;
		$mensagem['senha']		= $sql['linha']['senha'] ;
		$mensagem['assunto']	= $backend['lembrete'] ;
		// Criação da carta-lembrete
		$mensagem['mensagem']	= "<p></p>Caro ". $mensagem['nome'] .",</p>" ;
		$mensagem['mensagem']  .= "<p>Conforme solicitado, estamos lhe reenviando seus dados de usuário." ;
		$mensagem['mensagem']  .= "<br>Caso não tenha solicitado apenas ignore este e-mail." ;
		$mensagem['mensagem']  .= "<br>Os dados de sua conta são:</p>";
		$mensagem['mensagem']  .= "<p>Usuário: ". $mensagem['login'] ."<br>Senha: ". $mensagem['senha'] ."</p>" ;
		// Envio do lembrete
		$mensagem['envio'] = mail ( $mensagem['email'] , $mensagem['assunto'] , $mensagem['mensagem'] , $backend['empresa'] ) ;
		// Grava aviso sobre envio do lembrete
		if ( $mensagem['envio'] )
		{
			$mensagem['aviso'] = "Senha enviada com sucesso! Sua senha chegará à sua caixa de e-mails em alguns instantes." ;
		}
		else
		{
			$mensagem['aviso'] = "Sua senha não pode ser enviada devido a um erro na solicitação. Tente novamente em alguns instantes!" ;
		}
	}
	else
	{
		// Login e/ou email incorretos
		$mensagem['aviso'] = "Usuário ou E-mail incorreto!" ;
	}
// Fecha conexão com banco de dados
	mysql_close ( $conn['conexao'] ) ;
?>
<script language="javascript">
	// Mostra o aviso ao usuário
	alert ( "<?php print $mensagem['aviso'] ; ?>" ) ;
	document.location.href = "index.php" ;
</script>