<?php
/**
* ./includes/inc_lembrete.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Lista de funcoes da aplica��o.
*/
//*** N�vel da p�gina
	$default['nivel'] = '../' ;
//*** Inclus�es:
	// Configura��es da aplica��o
	require ( $default['nivel'] . 'global.php' ) ;
	// Conex�o com o banco de dados
	require ( $include['conexao'] ) ;
//*** Conex�o com o banco de dados
	$sql['consulta'] = 'SELECT * FROM tbsegurancausuarios WHERE login = "'. $_POST['login'] .'" AND email = "'. $_POST['email'] .'"' ;
	$sql['conexao']  = mysql_query ( $sql['consulta'] , $conn['database'] ) ;
//*** Grava os registros encontrados
	$sql['retorno'] = mysql_num_rows ( $sql['conexao'] ) ;
//*** Verifica se o usu�rio foi encontrado
	if ( $sql['retorno'] > 0 )
	{
		// Autentica��o de usu�rio
		$sql['linha'] = mysql_fetch_array ( $sql['conexao'] ) ;
		$mensagem['email']		= $_POST['email'] ;
		$mensagem['nome']		= $sql['linha']['nome'] ;
		$mensagem['login']		= $sql['linha']['login'] ;
		$mensagem['senha']		= $sql['linha']['senha'] ;
		$mensagem['assunto']	= $backend['lembrete'] ;
		// Cria��o da carta-lembrete
		$mensagem['mensagem']	= "<p></p>Caro ". $mensagem['nome'] .",</p>" ;
		$mensagem['mensagem']  .= "<p>Conforme solicitado, estamos lhe reenviando seus dados de usu�rio." ;
		$mensagem['mensagem']  .= "<br>Caso n�o tenha solicitado apenas ignore este e-mail." ;
		$mensagem['mensagem']  .= "<br>Os dados de sua conta s�o:</p>";
		$mensagem['mensagem']  .= "<p>Usu�rio: ". $mensagem['login'] ."<br>Senha: ". $mensagem['senha'] ."</p>" ;
		// Envio do lembrete
		$mensagem['envio'] = mail ( $mensagem['email'] , $mensagem['assunto'] , $mensagem['mensagem'] , $backend['empresa'] ) ;
		// Grava aviso sobre envio do lembrete
		if ( $mensagem['envio'] )
		{
			$mensagem['aviso'] = "Senha enviada com sucesso! Sua senha chegar� � sua caixa de e-mails em alguns instantes." ;
		}
		else
		{
			$mensagem['aviso'] = "Sua senha n�o pode ser enviada devido a um erro na solicita��o. Tente novamente em alguns instantes!" ;
		}
	}
	else
	{
		// Login e/ou email incorretos
		$mensagem['aviso'] = "Usu�rio ou E-mail incorreto!" ;
	}
// Fecha conex�o com banco de dados
	mysql_close ( $conn['conexao'] ) ;
?>
<script language="javascript">
	// Mostra o aviso ao usu�rio
	alert ( "<?php print $mensagem['aviso'] ; ?>" ) ;
	document.location.href = "index.php" ;
</script>