<?php
/**
* ./includes/template/inc_403.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 Lógica Digital
* Descrição: Tela de acesso restrito.
*/ 

//*** Início da sessão
	session_start() ;
	
//*** Nível da página
	$default['nivel'] = '../../' ;
	
//*** Código do erro
	$num_erro = $_GET['err'] ;
	// Verifíca o código do erro
	if ( !is_numeric ( $num_erro ) )
	{
		$num_erro = 1 ;
	}
	
//*** Inclusões:
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;
?>
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<tr>
		<td align="right" valign="middle">
			<img src="<?php print $backend['logotipo']?>" alt="<?php print $backend['empresa']?>">
		</td>
<?php
	switch ( $num_erro )
	{
		case 2 :
?>
		<td align="right" valign="top">
			<a href="<?php print $default['nivel'] . 'main.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="Página Principal" border="0"></a>
		</td>
<?php
			break ;
		case 3 :
?>
		<td align="right" valign="top">
			<a href="<?php print $default['nivel'] . 'main.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="Página Principal" border="0"></a>
		</td>
<?php
			break ;
		default :
?>
		<td align="right" valign="top">
			<a href="<?php print $default['nivel'] . 'index.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="Sair" border="0"></a>
		</td>
<?php
	}
?>
	</tr>
	<tr>
		<td align="left" valign="top" colspan="3">
			<p><blockquote style="font: small-caps bold 36px Tahoma ;" >Erro 403:</blockquote></p>
			<p style="font: small-caps bold 24px Tahoma ;" >Área de acesso exclusivo.</p>
<?php
	switch ( $num_erro )
	{
		case 2 :
?>
			<p style="font: bold 14px Tahoma ;" >O login e a senha informados não possuem autorização para leitura e/ou escrita nesta sessão.</p>
			<p>&nbsp;</p>
			<p style="font: bold 14px Tahoma ;" align="center"><a href="javascript:history.back();">Clique aqui para voltar</a></p>
<?php
			break ;
		case 3 :
?>
			<p style="font: bold 14px Tahoma ;" >O login e a senha informados não possuem acesso à esta sessão.</p>
			<p>&nbsp;</p>
			<p style="font: bold 14px Tahoma ;" align="center"><a href="javascript:history.back();">Clique aqui para voltar</a></p>

<?php
			break ;
		default :
?>
			<p style="font: bold 14px Tahoma ;" >Para utilizar esta área você deve informar seu login e senha na tela de autenticação.</p>
			<p>&nbsp;</p>
			<p style="font: bold 14px Tahoma ;" align="center"><a href="<?php print $default['nivel'] . 'index.php' ; ?>">Clique aqui para ir à Tela de Autenticação</a></p>
<?php
	}
?>
		</td>
	</tr>
<table>
</body>
</html>