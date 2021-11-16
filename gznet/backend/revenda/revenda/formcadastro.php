<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 3;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
$var_acao = ltrim(rtrim(str_replace("'","",$_REQUEST['acao'])));
$var_acao = substr(strtoupper($var_acao),0,1);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$var_id = ltrim(rtrim(str_replace("'","",$_REQUEST['id'])));
$var_ordem = ltrim(rtrim(str_replace("'","",str_replace(" ","%20",$_REQUEST['ordem']))));
$var_busca = ltrim(rtrim(str_replace("'","",$_REQUEST['busca'])));
$var_filtro = ltrim(rtrim(str_replace("'","",$_REQUEST['filtro'])));
$var_itens = ltrim(rtrim(str_replace("'","",$_REQUEST['itens'])));
$var_pagina = ltrim(rtrim(str_replace("'","",$_REQUEST['pagina'])));
$default['tabela'] = 'tbrevendas';
$default['titulo'] = 'Revendas';
if($var_acao == 'A' || $var_acao == 'C'){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){
		$rs_dados = mysql_fetch_array($rs_query);
		$rs_dados['datacadastro'] = fun_tratamento_data($rs_dados['datacadastro'],'L');
		if(ltrim(rtrim(strtoupper($rs_dados['status']))) == 'A'){ $var_status = ' checked="checked"'; }
		else{ $var_status = ''; }
	}
	else{ $var_acao = 'I'; $var_id = 0; }
}
Else{
	$var_acao = 'I';
	$var_id = 0;
	$var_status	= ' checked="checked"';
	$rs_dados['datacadastro'] = date("d/m/Y H:i");
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);
require($template['headers']);
?>
<script language="JavaScript" type="text/javascript" src="<?php echo $folders['include'];?>lettera/lettera.js"></script>
<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	if(form.nome_fantasia.value == ""){
		alert("Atenção!\nO campo NOME FANTASIA DA REVENDA deve ser preenchido.");
		form.nome_fantasia.focus();
		return false;
	}
	if(form.nome_fantasia.value == ""){
		alert("Atenção!\nO campo NOME FANTASIA DA REVENDA deve ser preenchido.");
		form.nome_fantasia.focus();
		return false;
	}
	if(form.estado.value == ""){
		alert("Atenção!\nO campo ESTADO deve ser preenchido.");
		form.estado.focus();
		return false;
	}
}
function jFoto(jURL, jDestino, jW, jH, jScroll,jResize){ window.open(jURL,jDestino,'width='+jW+',height='+jH+',scrollbars='+jScroll+',toolbar=no,location=no,status=yes,menubar=no,resizable='+jResize+',left=5,top=0') }
function jValidaExclusao(jURL){
	jMsg = "Deseja realmente excluir o arquivo?";
	input_box=confirm(jMsg);
	if(input_box==true){ location.href = jURL; }
}
</script>
<?php require($include['menu']);?>
<form action="processacadastro.php" enctype="multipart/form-data" method="post" name="formCadastro" id="formCadastro" onSubmit="return fVerificaForm(this,event);">
<input type="hidden" name="id" id="id" value="<?php echo $var_id;?>" />
<input type="hidden" name="acao" id="acao" value="<?php echo $var_acao;?>" />
<input type="hidden" name="ordem" id="ordem" value="<?php echo $var_ordem;?>" />
<input type="hidden" name="busca" id="busca" value="<?php echo $var_busca;?>" />
<input type="hidden" name="itens" id="itens" value="<?php echo $var_itens;?>" />
<input type="hidden" name="pagina" id="pagina" value="<?php echo $var_pagina;?>" />
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr><th colspan="4">Cadastro de <?php echo $default['titulo'];?></th></tr>
	<tr bgcolor="#FFFFFF"><td colspan="4" align="right">&nbsp;</td></tr>
	<tr>
        <td class="txt" bgcolor="#FFFFFF">Ativo:</td>
        <td bgcolor="#FFFFFF"><input type="checkbox" class="form" style="border: 0px;" name="status" id="status" value="A" <?php echo $var_status;?> /> Sim</td>
        <td bgcolor="#FFFFFF">Logo:</td>
        <td bgcolor="#FFFFFF"><input name="logo" type="text" id="logo" size="20" value="<?php echo $rs_dados['logo'];?>" />
	        <a href="javascript:jPopUp('indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Imagem" title="Inserir Imagem" border="0" /></a>
        </td>
       </tr>
    </tr>
	<tr>
		<td bgcolor="#FFFFFF">Nome Fantasia da Revenda:</td>
		<td colspan="4" bgcolor="#FFFFFF"><input type="text" name="nome_fantasia" id="nome_fantasia" value="<?php echo $rs_dados['nome_fantasia'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Cidade:</td>
		<td bgcolor="#FFFFFF"><input type="text" name="cidade" id="cidade" value="<?php echo $rs_dados['cidade'];?>" size="50" maxlength="255" /></td>
		<td bgcolor="#FFFFFF">Estado:</td>
		<td bgcolor="#FFFFFF">
		<?php
		$sql_estado = 'SELECT * FROM tbestados WHERE status = "A" ORDER BY sigla';
		$query_estado = mysql_query($sql_estado,$conexao['conexao'])or die(mysql_error());
		$linhas_estado = mysql_num_rows($query_estado);
		?>
		<select name="estado" id="estado">
		<?php
		echo "<option value=>Selecione</option>";
		if($linhas_estado > 0){
			for($cont_i=0; $cont_i<$linhas_estado; $cont_i++){
				$dados_estado = mysql_fetch_array($query_estado);
		?>
				<option value="<?php echo $dados_estado['sigla'];?>" <?php if($rs_dados['estado'] == $dados_estado['sigla']){ print ' selected="selected"'; } ?>><?php echo $dados_estado['estado'];?></option>
		<?php }
		}	?>
		</select>
		</td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Nome da Pessoa de Contato:</td>
		<td colspan="4" bgcolor="#FFFFFF"><input type="text" name="nome" id="nome" value="<?php echo $rs_dados['nome'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">E-mail:</td>
		<td colspan="4" bgcolor="#FFFFFF"><input type="text" name="email" id="email" value="<?php echo $rs_dados['email'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Site:</td>
		<td colspan="4" bgcolor="#FFFFFF"><input type="text" name="site" id="site" value="<?php echo $rs_dados['site'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Telefone:</td>
		<td colspan="4" bgcolor="#FFFFFF"><input type="text" name="telefone" id="telefone" value="<?php echo $rs_dados['telefone'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Data Cadastro:</td>
		<td colspan="4" bgcolor="#FFFFFF"><?php echo $rs_dados['datacadastro'];?></td>
	</tr>
	<?php if($var_acao != 'C'){ ?>
    <tr bgcolor="#f5f5f5">
		<td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td>
    </tr>
	<?php } ?>
</table>
</form>
<?php require($include['footer']);?>