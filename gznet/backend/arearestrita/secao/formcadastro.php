<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
$var_acao = ltrim(rtrim(str_replace("'","",$_REQUEST['acao'])));
$var_acao = substr(strtoupper($var_acao),0,1);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],$var_acao,$default['nivel']);
$var_id     = ltrim(rtrim(str_replace("'","",$_REQUEST['id'])));
$var_ordem  = ltrim(rtrim(str_replace("'","",str_replace(" ","%20",$_REQUEST['ordem']))));
$var_busca  = ltrim(rtrim(str_replace("'","",$_REQUEST['busca'])));
$var_filtro = ltrim(rtrim(str_replace("'","",$_REQUEST['filtro'])));
$var_itens  = ltrim(rtrim(str_replace("'","",$_REQUEST['itens'])));
$var_pagina = ltrim(rtrim(str_replace("'","",$_REQUEST['pagina'])));
$default['tabela'] = 'tbsecao';
$default['titulo'] = 'Seções';
if($var_acao == 'A' || $var_acao == 'C'){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	else{ $var_acao = 'I'; $var_id = 0; }
}
Else{
	$var_acao = 'I';
	$var_id = 0;
}
fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);
require($template['headers']);
?>
<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	if(form.categoria.value==""){
		alert("Atenção!\nO campo CATEGORIA deve ser preenchido.");
		form.categoria.focus();
		return false;
	}
	if(form.secao.value==""){
		alert("Atenção!\nO campo SEÇÃO deve ser preenchido.");
		form.secao.focus();
		return false;
	}
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
    <tr>
        <th colspan="4">Cadastro de <?php echo $default['titulo'];?></th>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>Ativo:</td>
        <td><input name="status" type="checkbox" id="status" value="A" <?php ($rs_dados['status'] == 'A') ? print 'checked="checked"' :'';?>/>Sim</td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>Atualizando:</td>
        <td><input name="atualizando" type="checkbox" id="atualizando" value="S" <?php ($rs_dados['atualizando'] == 'S') ? print 'checked="checked"' :'';?>/>Sim</td>
    </tr>
	<tr bgcolor="#FFFFFF">
		<td>Categoria:</td>
		<td><select name="categoria" id="categoria"
                <?php
                $sql_categoria          = 'SELECT * FROM tbcategoria ORDER BY descricao';
                $query_categoria        = mysql_query($sql_categoria,$conexao['conexao']);
                $linhas_categoria       = mysql_num_rows($query_categoria);

                echo "<option value=>Selecione</option>";

		if($linhas_categoria > 0) {
		  for($u=1; $u<=$linhas_categoria; $u++){
                     $dados_categoria = mysql_fetch_array($query_categoria);
                     $id = $dados_categoria['categoria'];
                     $ds = $dados_categoria['descricao'];
                     echo "<option value=$id";
                     if($rs_dados['categoria'] == $id ) echo " selected=selected";
                     echo ">$ds</option>";
                  }
		}
		?>
		</select>
		</td>
	</tr>
    <tr bgcolor="#FFFFFF">
        <td>Seção:</td>
        <td><input name="secao" type="text" id="secao" value="<?php echo $rs_dados['secao'];?>" size="50" maxlength="255" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>Observação:</td>
        <td><input name="obs" type="text" id="obs" value="<?php echo $rs_dados['obs'];?>" size="50" maxlength="255" /></td>
    </tr>
	<?php if($var_acao != 'C'){ ?>
    <tr bgcolor="#f5f5f5">
		<td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td>
    </tr>
	<?php } ?>
</table>
</form>
<?php require($include['footer']);?>
