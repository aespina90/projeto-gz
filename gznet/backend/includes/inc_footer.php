<?php
/**
* ./includes/inc_footer.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Rodapé da aplicação.
*/
?>
		</td>
	</tr>
	<tr bgcolor="#FFFFFF" >
		<td bgcolor="#FFFFFF" align="left"  valign="middle"><a href="http://www.logicadigital.com.br" target="_blank"><img src="<?php echo $folders['icones']?>bot_home.gif" width="16" height="14" alt="www.logicadigital.com.br" border="0" /></a> <img src="<?php echo $folders['icones']?>bot_mail.gif" width="15" height="11" alt="sistemas@logicadigital.com.br" border="0" /> <img src="<?php echo $folders['icones']?>bot_help.gif" width="12" height="13" alt="ajuda" border="0" /></td>
<?php
	$var_path = pathinfo ( $_SERVER['PHP_SELF'] ) ;
	$var_path = basename ( $var_path['basename'] , '.php' ) ;

	if (( $var_path != 'index' ) && ( $var_path != 'main' ) && ( $var_path != 'index_inativo' ))
	{
?>
		<td align="center" valign="bottom">
			<a href="index.php?pagina=<?php echo $var_pagina?>&amp;itens=<?php echo $var_itens?>&amp;ordem=<?php echo str_replace ( " ", "%20", $var_ordem )?>&amp;busca=<?php echo $var_busca?>"><img src="<?php echo $folders['icones_menu']?>mnu_voltar.jpg" alt="Sair" border="0" /></a>
		</td>
<?php
	}
	else
	{
?>
                <td align="center" valign="bottom">
                        <a href="<?php print $default['nivel'] . 'main.php' ; ?>"><img src="<?php echo $folders['icones_menu']?>mnu_home.jpg" alt="Principal" border="0" /></a>
                </td>
<?php
	}
?>
		<td colspan="3" bgcolor="#FFFFFF" align="right" valign="middle">&nbsp;</td>
	</tr>
</table>
<?php
//*** Fecha a conexão com o banco de dados
	// Fecha a conexão
	if ( $conexao['conexao'] )
	{
		mysql_close ( $conexao['conexao'] ) ;
	}
?>
</body>
</html>