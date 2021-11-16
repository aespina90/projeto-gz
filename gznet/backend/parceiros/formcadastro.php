<?php
session_start();
$default['nivel'] = '../';
$default['modulo'] = 6;
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
$default['tabela'] = 'tbparceiros';
$default['titulo'] = 'Parceiros';
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
	else{
		$var_acao = 'I';
		$var_id = 0;
	}
}
Else{
	$var_acao = 'I';
	$var_id = 0;
	$var_status = ' checked="checked"';
	$rs_dados['datacadastro'] = date("d/m/Y H:i");
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);
require($template['headers']);
?>
<script language="JavaScript" type="text/javascript" src="<?php echo $folders['include'];?>lettera/lettera.js"></script>
<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	if(form.nome.value == ""){
		alert("Atenção!\nO campo NOME DA EMPRESA deve ser preenchido.");
		form.assunto.focus();
		return false;
	}
	if(form.url.value == ""){
		alert("Atenção!\nO campo SITE deve ser preenchido.");
		form.lead.focus();
		return false;
	}
}
function jFoto(jURL,jDestino,jW,jH,jScroll,jResize){ window.open(jURL,jDestino,'width='+jW+',height='+jH+',scrollbars='+jScroll+',toolbar=no,location=no,status=yes,menubar=no,resizable='+jResize+',left=5,top=0') }
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
        <td bgcolor="#FFFFFF">
		  <input type="text" name="id_imagem" id="id_imagem" size="5" value="<?php echo $rs_dados['logo'];?>" />
	      <a href="javascript:jPopUp('../lettera/bancodeimagens/indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Logo" title="Inserir Logo" border="0" /></a>
        </td>
       </tr>
    </tr>
	<tr>
		<td bgcolor="#FFFFFF">Nome da Empresa:</td>
		<td colspan="3" bgcolor="#FFFFFF"><input type="text" name="nome" id="nome" value="<?php echo $rs_dados['nome'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Site:</td>
		<td colspan="3" bgcolor="#FFFFFF"><input type="text" name="url" id="url" value="<?php echo $rs_dados['url'];?>" size="80" maxlength="255" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Data Cadastro:</td>
		<td colspan="3" bgcolor="#FFFFFF"><?php echo $rs_dados['datacadastro'];?></td>
	</tr>
	<?php if($var_acao != 'C'){ ?>
    <tr bgcolor="#f5f5f5"><td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td></tr>
	<?php } ?>
</table>
</form>
<?php require($include['footer']);?>