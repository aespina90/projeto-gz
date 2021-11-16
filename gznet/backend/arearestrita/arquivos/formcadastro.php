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
$var_id         = ltrim(rtrim(str_replace("'","",$_REQUEST['id'])));
$var_ordem      = ltrim(rtrim(str_replace("'","",str_replace(" ","%20",$_REQUEST['ordem']))));
$var_busca      = ltrim(rtrim(str_replace("'","",$_REQUEST['busca'])));
$var_filtro 	= ltrim(rtrim(str_replace("'","",$_REQUEST['filtro'])));
$var_itens      = ltrim(rtrim(str_replace("'","",$_REQUEST['itens'])));
$var_pagina     = ltrim(rtrim(str_replace("'","",$_REQUEST['pagina'])));
$default['tabela'] = 'tbarquivos';
$default['titulo'] = 'Arquivos';

if($var_acao == 'A' || $var_acao == 'C'){
	$rs_sql = 'SELECT * FROM '.$default['tabela'].' WHERE id = "'.$var_id.'"';
	$rs_query = mysql_query($rs_sql,$conexao['conexao']);
	$rs_linhas = mysql_num_rows($rs_query);
	if($rs_linhas > 0){ $rs_dados = mysql_fetch_array($rs_query); }
	else{ $var_acao = 'I'; $var_id = 0; }
} Else{
	$var_acao = 'I';
	$var_id = 0;
}

fun_log($_SESSION[$session['iduser']],$default['modulo'],$var_acao,$rs_sql);
require($template['headers']);

$categoria   = '';
$secao       = '';

if($var_acao == 'I'){

   $data        = date("d/m/Y H:i");

} else {

   $data        = fun_tratamento_data($rs_dados['datacadastro'],'L');

   $sql_aux     = 'SELECT c.descricao categoria, s.secao FROM tbarquivos a';
   $sql_aux    .= ' LEFT JOIN tbsubsecao sub ON sub.id=a.sub_secao';
   $sql_aux    .= ' LEFT JOIN tbsecao s ON s.id=sub.secao';
   $sql_aux    .= ' LEFT JOIN tbcategoria c ON c.categoria=s.categoria';
   $sql_aux    .= ' WHERE a.id = '.$rs_dados['id'];

   $query_aux   = mysql_query($sql_aux,$conexao['conexao']);
   $aux_linhas  = mysql_num_rows($query_aux);

   if ($aux_linhas > 0 ) {
      $aux_dados   = mysql_fetch_array($query_aux);
      $categoria   = $aux_dados['categoria'];
      $secao       = $aux_dados['secao'];
   }
}

?>
<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	if(form.sub_secao.value == ""){
		alert("Atenção!\nO campo Sub-Seção deve ser preenchido.");
		form.sub_secao.focus();
		return false;
	}
	if(form.nome.value == ""){
		alert("Atenção!\nO campo NOME deve ser preenchido.");
		form.nome.focus();
		return false;
	}
	if(form.arquivo.value == ""){
		alert("Atenção!\nO campo ARQUIVO deve ser preenchido.");
		form.arquivo.focus();
		return false;
	}
}

function jFoto(jURL, jDestino, jW, jH, jScroll,jResize){
	window.open(jURL,jDestino,'width='+jW+',height='+jH+',scrollbars='+jScroll+',toolbar=no,location=no,status=yes,menubar=no,resizable='+jResize+',left=5,top=0')
}
function jValidaExclusao(jURL){
	jMsg = "Deseja realmente excluir o arquivo?";
	input_box=confirm(jMsg);
	if(input_box==true){
		location.href = jURL;
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
                <td>Categoria:</td>
                <td><?php echo $categoria;?></td>
        </tr>

        <tr bgcolor="#FFFFFF">
                <td>Seção:</td>
                <td><?php echo $secao;?></td>
        </tr>

	<tr bgcolor="#FFFFFF">
		<td>Sub-Seção:</td>
		<td><select name="sub_secao" id="sub_secao"
                <?php
                $sql_subsecao           = 'SELECT c.descricao categoria, s.secao, t.id, t.sub_secao';
                $sql_subsecao          .= ' FROM tbsubsecao t';
                $sql_subsecao          .= ' LEFT JOIN tbsecao s ON s.id = t.secao';
                $sql_subsecao          .= ' LEFT JOIN tbcategoria c ON c.categoria = s.categoria';
                $sql_subsecao          .= ' ORDER BY categoria, secao, sub_secao';
                $query_subsecao         = mysql_query($sql_subsecao,$conexao['conexao']);
                $linhas_subsecao        = mysql_num_rows($query_subsecao);

                echo "<option value=>Selecione</option>";

		if($linhas_subsecao > 0) {
		  for($u=1; $u<=$linhas_subsecao; $u++){
                     $dados_subsecao = mysql_fetch_array($query_subsecao);
                     $id  = $dados_subsecao['id'];
                     $ds  = $dados_subsecao['categoria'];
                     $ds .= ' - '.$dados_subsecao['secao'];
                     $ds .= ' - '.$dados_subsecao['sub_secao'];
                     echo "<option value=$id";
                     if($rs_dados['sub_secao'] == $id ) echo " selected=selected";
                     echo ">$ds</option>";
                  }
		}
		?></select>
		</td>
	</tr>
    <tr bgcolor="#FFFFFF">
        <td>Nome:</td>
        <td><input name="nome" type="text" id="nome" value="<?php echo $rs_dados['nome'];?>" size="80" maxlength="255" /></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>Arquivo:</td>
        <td><input name="arquivo" type="text" id="arquivo" value="<?php echo $rs_dados['arquivo'];?>" size="80" maxlength="255" /></td>
    </tr>
	<tr bgcolor="#FFFFFF">
        <td>Data de Cadastro:</td>
        <td><?php echo $data;?></td>
    </tr>
	<?php if($var_acao != 'C'){ ?>
    <tr bgcolor="#f5f5f5">
		<td colspan="4" align="right"><input type="submit" name="Submit" value="Gravar..." /></td>
    </tr>
	<?php } ?>
</table>
</form>
<?php require($include['footer']);?>