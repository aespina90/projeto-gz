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
$default['tabela'] = 'tbletteraimagens';
$default['titulo'] = 'Imagens';

if($var_acao == 'A' || $var_acao == 'C'){
   $rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id="'.$var_id.'"';
   $rs_query = mysql_query($rs_sql,$conexao['conexao']);
   $rs_linhas = mysql_num_rows($rs_query);
   if($var_acao == 'C'){ fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql,$default['nivel']); }
   if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
   else{ $var_acao = 'I'; $var_id = 0; }
} Else {
   $var_acao = 'I';
   $var_id = 0;
   $var_status = ' checked="checked"';
}
require($template['headers']);

?>
<script language="JavaScript" type="text/javascript">
function jFoto(jURL, jDestino, jW, jH, jScroll,jResize){ window.open(jURL,jDestino,'width='+jW+',height='+jH+',scrollbars='+jScroll+',toolbar=no,location=no,status=yes,menubar=no,resizable='+jResize+',left=5,top=0') }
function jValidaExclusao(jURL){
	jMsg = "Deseja realmente excluir o registro?";
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
<table width="740" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <th colspan="4">Cadastro de <?php echo $default['titulo'];?></th>
  </tr>

  <tr bgcolor="#FFFFFF">
    <td class="txt" valign="top">Arquivo:</td>
    <td colspan="3" valign="top"><input name="arquivo" class="form" type="file" id="arquivo" value="<?php echo $var_arquivo;?>" size="60" />
      <?php if($rs_dados['arquivo']!=""){ ?>
        <a href="javascript:jFoto('<?php echo $folders['dbimagens'].$rs_dados['arquivo'];?>','Lettera_Imagens',400,250,'no','no');"><img src="../../icones/ico_foto.gif" alt="Alterar" border="0" /></a></td>
      <?php } ?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td class="txt" valign="top">Descrição:</td>
    <td colspan="3" valign="top"><textarea name="descricao" style="width: 360px; height: 50px"><?php echo $rs_dados['descricao'];?></textarea></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td class="txt" valign="top">Data de Cadastro: </td>
    <td colspan="3" valign="top"><?php echo date("d/m/Y H:m");?></td>
  </tr>
  <?php if($var_acao != 'C'){ ?>
    <tr bgcolor="#f5f5f5"><td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td></tr>
  <?php } ?>
</table>
</form>
<?php require($include['footer']);?>