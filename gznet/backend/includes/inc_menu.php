<?php
/**
* ./includes/inc_menu.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Menu da aplica��o.
*/
?>
</head>
<body>
<table width="740" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<tr>
		<td width="360" valign="top">
			<p style="font-family: Tahoma; font-size: 11px;">
				<?php print fun_cumprimento() ; ?><strong><?php print $_SESSION[$session['nome']] ; ?></strong>!<br />
				Seu I.P. &eacute; <strong><?php print $_SERVER["REMOTE_ADDR"] ; ?></strong>.<br />
				Voc&ecirc; pertence ao grupo <strong><?php print $_SESSION[$session['grupo']] ; ?></strong>.<br />
				O seu &uacute;ltimo login foi em <strong><?php print fun_tratamento_data ( $_SESSION[$session['lastjoin']] , 'L' ) ; ?></strong>.
			</p>
		</td>
		<td width="20" align="center" valign="middle">
			&nbsp;
		</td>
		<td width="330" align="right" valign="middle">
			<img src="<?php print $backend['logotipo']?>" alt="<?php print $backend['empresa']?>" />
		</td>
		<td width="20" align="right" valign="top">
			<a href="<?php print $default['nivel'] . 'main.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="Principal" border="0" /></a>
		</td>
		<td width="20" align="right" valign="top">
			<a href="<?php print $default['nivel'] . 'logout.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_sair_peq.jpg" alt="Sair" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td colspan="5">