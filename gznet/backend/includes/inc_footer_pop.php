<?php
/**
* ./includes/inc_footer_pop.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Rodapé da aplicação.
*/
?>
		</td>
	</tr>
	<tr bgcolor="#FFFFFF" >
		<td bgcolor="#FFFFFF" align="left"  valign="middle"><a href="http://www.logicadigital.com.br" target="_blank"><img src="<?php echo $folders['icones']?>bot_home.gif" width="16" height="14" alt="www.logicadigital.com.br" border="0"></a> <img src="<?php echo $folders['icones']?>bot_mail.gif" width="15" height="11" alt="sistemas@logicadigital.com.br" border="0"> <img src="<?php echo $folders['icones']?>bot_help.gif" width="12" height="13" alt="ajuda" border="0"></td>
<?php
	if ( $default['main'] != 'Não mostrar o botão voltar' )
	{
?>
		<td align="center" valign="bottom">
			<a href="javascript:window.close()"><img src="<?php echo $folders['icones_menu']?>mnu_sair_peq.jpg" alt="Fechar Janela" border="0"></a>
		</td>
<?php
	}
	else
	{
		print '<td>&nbsp;</td>' ;
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