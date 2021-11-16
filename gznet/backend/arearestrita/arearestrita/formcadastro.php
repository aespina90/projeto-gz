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
$default['tabela'] = 'tbarearestrita';
$default['titulo'] = 'Usu&aacute;rios';

if($var_acao == 'A' || $var_acao == 'C'){
  $rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'"';
  $rs_query = mysql_query($rs_sql,$conexao['conexao']);
  $rs_linhas = mysql_num_rows($rs_query);
  if($rs_linhas > 0) {
    $rs_dados = mysql_fetch_array($rs_query); }
  else {
    $var_acao   = 'I';
    $var_id     = 0;
  }
} else {
  $var_acao     = 'I';
  $var_id       = 0;
}

fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);

require($template['headers']);

if($var_acao == 'I') {
  $data = date("d/m/Y H:i");
} else {
  $data = fun_tratamento_data($rs_dados['datacadastro'],'L');
}

?>

<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	if(form.nome.value==""){
		alert("Atenção!\nO campo NOME deve ser preenchido.");
		form.nome.focus();
		return false;
	}
	if(form.login.value==""){
		alert("Atenção!\nO campo LOGIN deve ser preenchido.");
		form.login.focus();
		return false;
	}
	if(form.senha.value==""){
		alert("Atenção!\nO campo SENHA deve ser preenchido.");
		form.senha.focus();
		return false;
	}
	if(form.email.value==""){
		alert("Atenção!\nO campo E-mail deve ser preenchido.");
		form.email.focus();
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
    <td>Nome:</td>
    <td><input name="nome" type="text" id="nome" value="<?php echo $rs_dados['nome'];?>" size="50" maxlength="64" /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Login:</td>
    <td><input name="login" type="text" id="login" value="<?php echo $rs_dados['login'];?>" size="50" maxlength="64" /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Senha:</td>
    <td><input name="senha" type="text" id="senha" value="<?php echo $rs_dados['senha'];?>" size="20" maxlength="64" /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>E-mail:</td>
    <td><input name="email" type="text" id="email" value="<?php echo $rs_dados['email'];?>" size="40" maxlength="64" /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>Data de Cadastro:</td>
    <td><?php echo $data;?></td>
  </tr>
  <?php
  if($var_acao != 'C') { ?>
    <tr bgcolor="#f5f5f5">
      <td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td>
    </tr> <?php
  } ?>
</table>
</form>
<?php require($include['footer']);?>