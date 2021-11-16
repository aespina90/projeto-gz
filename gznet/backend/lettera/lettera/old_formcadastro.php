<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 2;
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
$default['tabela'] = 'tblettera';
$default['titulo'] = 'Mat&eacute;rias';
if($var_acao == 'A' || $var_acao == 'C'){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){
		$rs_dados = mysql_fetch_array($rs_query);
		$rs_dados['datacadastro'] = fun_tratamento_data($rs_dados['datacadastro'],'L');
		if(ltrim(rtrim(strtoupper($rs_dados['status']))) == 'A'){ $var_status = ' checked="checked"'; }
		else{ $var_status = ''; }
		if(ltrim(rtrim(strtoupper($rs_dados['expirar']))) == 'S'){ $var_expirar = ' checked="checked"'; }
		else{ $var_expirar = ''; }
		if(ltrim(rtrim(strtoupper($rs_dados['pagabertura']))) == 'S'){ $var_pagabertura = ' checked="checked"'; }
		else{ $var_pagabertura = ''; }

		$var_idsecao = $rs_dados['idsecao'];
		$var_datapublicacao = fun_data_lettera($rs_dados['datapublicacao']);
		$var_dataexpiracao = fun_data_lettera($rs_dados['dataexpiracao']);
	}else{
		$var_acao = 'I';
		$var_id = 0;
	}
}
Else{
	$var_acao = 'I';
	$var_id = 0;
	$var_status = ' checked="checked"';
	$var_expirar = ' checked="checked"';
	$var_pagabertura = '';
	$rs_dados['datacadastro'] = date("d/m/Y H:i");
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);
require($template['headers']);
?>
<script language="JavaScript" type="text/javascript" src="<?php echo $folders['include'];?>lettera/lettera.js"></script>
<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	secao = document.forms[0].idsecao;
	if(secao.options[secao.selectedIndex].value == 0){
		alert("Atenção!\nO campo SEÇÃO deve ser preenchido.");
		secao.focus();
		return false;
    }
	if(form.assunto.value == ""){
		alert("Atenção!\nO campo ASSUNTO deve ser preenchido.");
		form.assunto.focus();
		return false;
	}
}
function fn_expirar(tipo){
	if(tipo == "sim"){ document.getElementById('l_data_expiracao').style.display = ''; }
	if(tipo == "nao"){ document.getElementById('l_data_expiracao').style.display = 'none'; }
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
	<td bgcolor="#FFFFFF">Seção:</td>
		<td colspan="1" bgcolor="#FFFFFF">
			<select name="idsecao" class="form" id="idsecao">
				<option value="0">-- Selecione --</option>
				<?php
				$rs_sql_secao = "SELECT * FROM tbletterasecoes ORDER BY secao";
				$rs_query_secao = mysql_query($rs_sql_secao,$conexao['conexao']);
				$rs_linhas_secao = mysql_num_rows($rs_query_secao);
				for($cont_i=0; $cont_i<$rs_linhas_secao; $cont_i++){
					$rs_dados_secao = mysql_fetch_array($rs_query_secao); ?>
					<option value="<?php echo $rs_dados_secao['id'];?>"
					<?php If($var_idsecao == $rs_dados_secao['id']){ ?> selected="selected" <?php } ?> ><?php echo $rs_dados_secao['secao'];?></option>
				<?php } ?>
			</select>
		</td>
		<td class="txt" bgcolor="#FFFFFF">Pagina Principal:</td>
                <td bgcolor="#FFFFFF"><input type="checkbox" class="form" style="border: 0px;" name="pagabertura" id="pagabertura" value="S" <?php echo $var_pagabertura;?> /> Sim</td>

	</tr>
	<tr>
        <td class="txt" bgcolor="#FFFFFF">Ativo:</td>
        <td bgcolor="#FFFFFF"><input type="checkbox" class="form" style="border: 0px;" name="status" id="status" value="A" <?php echo $var_status;?> /> Sim</td>
        <td bgcolor="#FFFFFF">Id Imagem:</td>
        <td bgcolor="#FFFFFF">
          <input name="id_imagem" type="text" id="id_imagem" size="5" value="<?php echo $rs_dados['idimagem'];?>" />
	  <a href="javascript:jPopUp('../bancodeimagens/indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Imagem" title="Inserir Imagem" border="0" /></a>
          <input name="id_imgnew1" type="text" id="id_imgnew1" size="5" value="<?php echo $rs_dados['idimagemnoticia1'];?>" />
          <a href="javascript:jPopUp('../bancodeimagens/indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Imagem" title="Inserir Imagem" border="0" /></a>
          <input name="id_imgnew2" type="text" id="id_imgnew2" size="5" value="<?php echo $rs_dados['idimagemnoticia2'];?>" />
          <a href="javascript:jPopUp('../bancodeimagens/indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Imagem" title="Inserir Imagem" border="0" /></a>
          <input name="id_imgnew3" type="text" id="id_imgnew3" size="5" value="<?php echo $rs_dados['idimagemnoticia3'];?>" />
          <a href="javascript:jPopUp('../bancodeimagens/indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Imagem" title="Inserir Imagem" border="0" /></a>
          <input name="id_imgnew4" type="text" id="id_imgnew4" size="5" value="<?php echo $rs_dados['idimagemnoticia4'];?>" />
          <a href="javascript:jPopUp('../bancodeimagens/indiceimagens.php','Inserir_Imagem','760','550','yes','no')"><img src="<?php echo $folders['icones'];?>ico_foto.gif" style="vertical-align: middle;" alt="Inserir Imagem" title="Inserir Imagem" border="0" /></a>
        </td>
       </tr>
    </tr>
	<tr>
        <td class="txt" bgcolor="#FFFFFF">Expirar:</td>
        <td bgcolor="#FFFFFF" colspan="3">
			<input id="expirar_s" name="expirar" type="radio" value="S" checked="checked" onClick="fn_expirar('sim');" <?php if($rs_dados['expirar'] == "S"){ print 'checked="checked"'; }?>/> Sim
			<input id="expirar_n" name="expirar" type="radio" value="N" onClick="fn_expirar('nao');" <?php if($rs_dados['expirar'] == "N"){ print 'checked="checked"'; }?>/> Não
		</td>
    </tr>
  <?php include("incdata.php"); ?>
	<tr>
		<td bgcolor="#FFFFFF">Assunto:</td>
		<td colspan="3" bgcolor="#FFFFFF"><input type="text" name="assunto" id="assunto" value="<?php echo $rs_dados['assunto'];?>" size="50" maxlength="128" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Lead:</td>
		<td colspan="3" bgcolor="#FFFFFF"><textarea id="lead" name="lead" rows="5" cols="60"><?php echo $rs_dados['lead'];?></textarea></td>
	</tr>

	<tr>
		<td bgcolor="#FFFFFF">Matéria:</td>
		<td colspan="3" bgcolor="#FFFFFF"><textarea id="materia" name="materia" rows="5" cols="60"><?php echo $rs_dados['materia'];?></textarea></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Fonte:</td>
		<td colspan="3" bgcolor="#FFFFFF"><input type="text" name="fonte" id="fonte" value="<?php echo $rs_dados['fonte'];?>" size="30" maxlength="32" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Fonte Link:</td>
		<td colspan="3" bgcolor="#FFFFFF"><input type="text" name="fontelink" id="fontelink" value="<?php echo $rs_dados['fontelink'];?>" size="50" maxlength="64" /></td>
	</tr>
	<tr>
		<td bgcolor="#FFFFFF">Data Cadastro:</td>
		<td colspan="3" bgcolor="#FFFFFF"><?php echo $rs_dados['datacadastro'];?></td>
	</tr>
	<?php if($var_acao != 'C'){ ?>
    <tr bgcolor="#f5f5f5">
		<td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td>
    </tr>
	<?php } ?>
</table>
</form>
<script language="JavaScript">gera_lettera('materia');</script>
<?php require($include['footer']);?>