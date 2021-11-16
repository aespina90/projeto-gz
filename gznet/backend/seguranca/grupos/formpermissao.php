<?php
/**
* ./seguranca/grupos/formPermissao.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Listagem do cadastro de vendedores.
* :WARNING: TRABALHANDO NA LINHA 71 // LINHA 61 COMENTADA
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
	fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , 'A' , $default['nivel'] ) ;

//*** Inclusões:
	// Template: Validação de variáveis
	require ( $template['valvars'] ) ;

//*** Conexão com o banco de dados de segurança
	if (( strlen ( $var_id ) > 0 ) && ( is_numeric ( $var_id )))
	{
		// String de conexão
		$rs_sql 	= 'SELECT * FROM tbsegurancaacessos ' ;
		// Condição de igualdade para conexão com banco de dados
		$rs_teste   = ' WHERE idgrupo="'. $var_id .'" ORDER BY idmodulo ' ;
		// Monta o comando
		$rs_sql	   .= $rs_teste ;
		// Executa o comando
		$rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;
		// Recebe o número de registros
		$rs_linhas	= mysql_num_rows ( $rs_query ) ;

		// String de conexão
		$rs_sql_cons	= 'SELECT * FROM tbsegurancamodulos ' ;
		// Condição de igualdade para conexão com banco de dados
		$rs_teste_cons  = ' ORDER BY id ' ;
		// Monta o comando
		$rs_sql_cons   .= $rs_teste_cons ;
		// Executa o comando
		$rs_query_cons	= mysql_query ( $rs_sql_cons , $conexao['conexao'] ) ;
		// Recebe o número de registros
		$rs_linhas_cons	= mysql_num_rows ( $rs_query_cons ) ;
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql , $default['nivel'] ) ;

//*** Inclusões:
	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;
?>
<script language="javascript">
function verifica_check (cont) {
	checkflag_escrita = true ;
	checkflag_leitura = true ;

	for (i = 0; i < cont; i++) {
		js_nome = "escrita_" + eval(i);
		if ( document.formPermissoes.eval(js_nome).checked == false )
		{
			checkflag_escrita = false;
		}
	}
	for (i = 0; i < cont; i++) {
		js_nome = "leitura_" + eval(i);
		if ( document.formPermissoes.eval(js_nome).checked == false )
		{
			checkflag_leitura = false;
		}
	}
	document.formPermissoes.eval("escrita_check").checked = checkflag_escrita ;
	document.formPermissoes.eval("leitura_check").checked = checkflag_leitura ;
}
function check_leitura(cont) {
	if (checkflag_leitura == false) {
		for (i = 0; i < cont; i++) {
			js_nome = "leitura_" + eval(i);
			document.formPermissoes.eval(js_nome).checked = true;
		}
		checkflag_leitura = true;
	}
	else {
		for (i = 0; i < cont; i++) {
			js_nome = "leitura_" + eval(i) ;
			document.formPermissoes.eval(js_nome).checked = false;
		}
		checkflag_leitura = false;
	}
}
function check_escrita(cont) {
	if (checkflag_escrita == false) {
		for (i = 0; i < cont; i++) {
			js_nome = "escrita_" + eval(i);
			document.formPermissoes.eval(js_nome).checked = true;
		}
		checkflag_escrita = true;
	}
	else {
		for (i = 0; i < cont; i++) {
			js_nome = "escrita_" + eval(i) ;
			document.formPermissoes.eval(js_nome).checked = false;
		}
		checkflag_escrita = false;
	}
}
</script>
<?php
	// Menu da aplicação para pop-ups
	require ( $include['popmenu'] ) ;
?>
<form action="processaPermissao.php?acao=A" method="post" name="formPermissoes" id="formPermissoes">
	<input type=hidden name=idgrupo value=<?php print $var_id ; ?>>
	<input type=hidden name=acao value=<?php print $var_acao ; ?>>
	<input name="grupo" type="hidden" id="grupo" value="<?php /*=nGrupo*/ ?>">
	<input name="descricao" type="hidden" id="descricao" value="<?php /*=nDescricao*/ ?>">
	<input name="ativo" type="hidden" id="ativo" value=<?php print $var_ativo ; ?>>
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr bgcolor="#E9E9E9">
    	<td colspan="4"><strong><font color="#333333" size="2" face="Trebuchet MS">Controle de Acesso</font></strong></td>
	</tr>
	<tr bgcolor="#F0F0F0">
		<td width="210"><font color="#333333" size="2" face="Trebuchet MS">M&oacute;dulo</font></td>
		<td width="360"><font color="#333333" size="2" face="Trebuchet MS">Descri&ccedil;&atilde;o</font></td>
		<td width="180" colspan="2" align="center"><font color="#333333" size="2" face="Trebuchet MS">Permiss&otilde;es de A&ccedil;&atilde;o</font></td>
	</tr>
<?php
	// Registro encontrado
	if ( $rs_linhas > 0 )
	{
		// Leitura dos Registros
		for ( $cont_i = 0 ; $cont_i < $rs_linhas ; $cont_i ++ )
		{
			// Grava os dados do registro
			$rs_dados	= mysql_fetch_array ( $rs_query ) ;
			// Salva as informações
			$modulos[$cont_i]['idgrupo']	= $rs_dados['idgrupo'] ;
			$modulos[$cont_i]['idmodulo']	= $rs_dados['idmodulo'] ;
			$modulos[$cont_i]['idleitura']	= $rs_dados['leitura'] ;
			$modulos[$cont_i]['idescrita']	= $rs_dados['escrita'] ;
		}
		for ( $cont_i_cons = 0 ; $cont_i_cons < $rs_linhas_cons ; $cont_i_cons ++ )
		{
		  	// Inicialização
		  	$tmp_dados['leitura'] = '' ;
		  	$tmp_dados['escrita'] = '' ;
			// Recupera o valor das linhas
			$rs_dados_cons = mysql_fetch_array ( $rs_query_cons ) ;

			for ( $cont_j = 0 ; $cont_j < $cont_i ; $cont_j ++ )
			{
				if ( $modulos[$cont_j]['idmodulo'] == $rs_dados_cons['id'] )
				{
					if ( $modulos[$cont_j]['idleitura'] == 'S' )
					{
						$tmp_dados['leitura']	= ' checked' ;
					}
					if ( $modulos[$cont_j]['idescrita'] == 'S' )
					{
						$tmp_dados['escrita']	= ' checked' ;
					}
				}
			}
?>
	<tr bgcolor="#FFFFFF">
		<td width="210" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados_cons['modulo'] ; ?></font></td>
		<td valign="top"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados_cons['descricao'] ; ?></font></td>
		<td width="90" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><input type="checkbox" name="leitura_<?php print $cont_i_cons ; ?>"<?php print $tmp_dados['leitura'] ; ?>>Leitura</font></td>
		<td width="90" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><input type="checkbox" name="escrita_<?php print $cont_i_cons ; ?>"<?php print $tmp_dados['escrita'] ; ?>>Gravação</font></td>
		<input type="hidden" name="id_modulo_<?php print $cont_i_cons ; ?>" value="<?php print $rs_dados_cons['id'] ; ?>">
	</tr>
<?php
		}
	}
	else
	{
		for ( $cont_i_cons = 0 ; $cont_i_cons < $rs_linhas_cons ; $cont_i_cons ++ )
		{
			// Recupera o valor das linhas
			$rs_dados_cons = mysql_fetch_array ( $rs_query_cons ) ;
?>
	<tr bgcolor="#FFFFFF">
		<td width="210" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados_cons['modulo'] ; ?></font></td>
		<td valign="top"><font color="#333333" size="2" face="Trebuchet MS"><?php print $rs_dados_cons['descricao'] ; ?></font></td>
		<td width="90" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><input type="checkbox" name="leitura_<?php print $cont_i_cons ; ?>">Leitura</font></td>
		<td width="90" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><input type="checkbox" name="escrita_<?php print $cont_i_cons ; ?>">Gravação</font></td>
		<input type="hidden" name="id_modulo_<?php print $cont_i_cons ; ?>" value="<?php print $rs_dados_cons['id'] ; ?>">
	</tr>
<?php
		}
	}
	if (( $var_acao == 'A' ) || ( $var_acao == 'I' ))
	{
?>
	<tr bgcolor="#FFFFFF">
		<td colspan="2" valign="top" align="right"><font color="#333333" size="2" face="Trebuchet MS">Selecionar todos:</font></td>
		<td width="90" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><input onClick='check_leitura(<?php print $cont_i_cons ; ?>)' type="checkbox" name="leitura_check">Leitura</font></td>
		<td width="90" valign="top"><font color="#333333" size="2" face="Trebuchet MS"><input onClick='check_escrita(<?php print $cont_i_cons ; ?>)' type="checkbox" name="escrita_check">Gravação</font></td>
		<input type="hidden" name="id_modulo_<?php print $cont_i_cons ; ?>" value="<?php print $rs_dados_cons['id'] ; ?>">
	</tr>
<script language="javascript">
	verifica_check (<?php print $cont_i_cons ; ?>) ;
</script>
    <tr align="right" bgcolor="EAEAEA">
    	<td colspan="4">
			<input type="hidden" name="id_grupo" value="<?php print $var_id ; ?>">
    		<input type="hidden" name="cont_for" value="<?php print $cont_i_cons ; ?>">
        	<input align="right" type="submit" name="Submit" value="Gravar">
		</td>
    </tr>
<?php
	}
?>
</table>
</form>
<?php
//*** Inclusões:
	// Rodapé da aplicação
	require ( $include['popfooter'] ) ;
?>