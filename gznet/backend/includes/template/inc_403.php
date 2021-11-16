<?php
/**
* ./includes/template/inc_403.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 L�gica Digital
* Descri��o: Tela de acesso restrito.
*/ 

//*** In�cio da sess�o
	session_start() ;
	
//*** N�vel da p�gina
	$default['nivel'] = '../../' ;
	
//*** C�digo do erro
	$num_erro = $_GET['err'] ;
	// Verif�ca o c�digo do erro
	if ( !is_numeric ( $num_erro ) )
	{
		$num_erro = 1 ;
	}
	
//*** Inclus�es:
	// Configura��es da aplica��o
	require ( $default['nivel'] . 'global.php' ) ;
	// Template: Cabe�alho do HTML
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
			<a href="<?php print $default['nivel'] . 'main.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="P�gina Principal" border="0"></a>
		</td>
<?php
			break ;
		case 3 :
?>
		<td align="right" valign="top">
			<a href="<?php print $default['nivel'] . 'main.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="P�gina Principal" border="0"></a>
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
			<p style="font: small-caps bold 24px Tahoma ;" >�rea de acesso exclusivo.</p>
<?php
	switch ( $num_erro )
	{
		case 2 :
?>
			<p style="font: bold 14px Tahoma ;" >O login e a senha informados n�o possuem autoriza��o para leitura e/ou escrita nesta sess�o.</p>
			<p>&nbsp;</p>
			<p style="font: bold 14px Tahoma ;" align="center"><a href="javascript:history.back();">Clique aqui para voltar</a></p>
<?php
			break ;
		case 3 :
?>
			<p style="font: bold 14px Tahoma ;" >O login e a senha informados n�o possuem acesso � esta sess�o.</p>
			<p>&nbsp;</p>
			<p style="font: bold 14px Tahoma ;" align="center"><a href="javascript:history.back();">Clique aqui para voltar</a></p>

<?php
			break ;
		default :
?>
			<p style="font: bold 14px Tahoma ;" >Para utilizar esta �rea voc� deve informar seu login e senha na tela de autentica��o.</p>
			<p>&nbsp;</p>
			<p style="font: bold 14px Tahoma ;" align="center"><a href="<?php print $default['nivel'] . 'index.php' ; ?>">Clique aqui para ir � Tela de Autentica��o</a></p>
<?php
	}
?>
		</td>
	</tr>
<table>
</body>
</html>