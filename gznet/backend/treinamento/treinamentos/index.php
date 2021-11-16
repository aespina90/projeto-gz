<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 4;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],'C',$default['nivel']);
$default['filtro'] = 'nome';
$default['ordem'] = 'id DESC';
if(trim(str_replace("'","",$_REQUEST['seleciona_busca'])) != ''){ $default['busca'] = trim(str_replace("'","",$_REQUEST['seleciona_busca'])); }
else{ $default['busca'] = 'nome'; }
$default['titulo'] = 'Treinamentos Agendados';
$default['registro'] = 'treinamento est&aacute; cadastrada no sistema.';
$default['campos'] = 'treinamentos est&atilde;o cadastradas no sistema.';
$rs_teste = '';
$default['_campo2'] = 'datatreino';
$default['_titcampo2'] = 'Data/Horário';
require($template['valvars']);
$rs_sql = 'SELECT * FROM tbtreinamentos';
if($var_busca != ''){
	$rs_busca = ' WHERE '.$default['busca'].' LIKE "%'.$var_busca.'%"';
}
$rs_sql .= $rs_teste.$rs_busca;
$rs_query = mysql_query($rs_sql,$conexao['conexao']);
$rs_linhas = mysql_num_rows($rs_query);
$var_registro = $rs_linhas;
$var_totalpaginas = ceil($rs_linhas/$var_itens);
if(($var_pagina == '')or(intval($var_pagina) < 1)){
	$var_pagina = 1;
	$num_inicio = 0;
}
else{
	if(intval($var_pagina) > $rs_linhas){
		$var_pagina = $rs_linhas;
		$num_inicio = ($var_pagina-1)*$var_itens;
	}
	else{
		$num_inicio = ($var_pagina-1)*$var_itens;
	}
}
$rs_sql = 'SELECT * FROM tbtreinamentos';
if($var_busca != ''){
	$rs_busca = ' WHERE '.$default['busca'].' LIKE "%'.$var_busca.'%"';
}
if($var_ordem != ''){
	$rs_ordem = ' ORDER BY '.$var_ordem;
}
$rs_maximo = ' LIMIT '.$num_inicio.', '.$var_itens;
$rs_sql .= $rs_teste.$rs_busca.$rs_ordem.$rs_maximo;
$rs_query = mysql_query($rs_sql,$conexao['conexao']);
$rs_linhas = mysql_num_rows($rs_query);
require($template['headers']);
?>
<script language="JavaScript" type="text/javascript">
function fVerificaForm(form,evento){
	if(form.busca.value==""){
		alert("Atenção!\nO campo BUSCA deve ser preenchido.");
		form.busca.focus();
		return false;
	}
}
function jValidaExclusao(jURL){
	jMsg = "Deseja realmente excluir o registro?";
	input_box=confirm(jMsg);
	if(input_box==true){
		location.href = jURL;
	}
}
</script>
<?php require($include['menu']);?>
<form action="index.php" name="formItens" id="formItens">
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<th colspan="10">Cadastro de <?php echo $default['titulo'];?></th>
	</tr>
	<tr bgcolor="#EBEBEB">
      <td align="center">
      	<input type="hidden" name="pagina" id="pagina" value="<?php echo $var_pagina;?>" />
      	<input type="hidden" name="ordem" id="ordem" value="<?php echo $var_ordem;?>" />
	  	<input type="text" name="itens" id="itens" value="<?php echo $var_itens;?>" size="2" maxlength="2" style="font: xx-small Trebuchet MS;" />
      	<input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_seta.gif" alt="Itens" />
	  </td>
      <td colspan="3" align="center" bgcolor="#EBEBEB"><a href="index.php"><img src="<?php echo $folders['icones'];?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar: <input name="busca" type="text" id="busca" value="<?php echo $var_busca;?>" size="24" maxlength="24" />
			<select name="seleciona_busca" id="seleciona_busca">
				<option value="nome" <?php ($default['busca'] == 'nome') ? print 'selected="selected"' : false;?>>Nome do Treinamento</option>
				<option value="id" <?php ($default['busca'] == 'id') ? print 'selected="selected"' : false;?>>Código</option>
			</select>
      </td>
      <td colspan="6" align="center">
		<!--<a href="formcadastro.php?acao=I&amp;pagina=<?php echo $var_pagina;?>&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>">Novo Treinamento</a>-->
	  </td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="70" align="center"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=id%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=id&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</strong></td>
		<td width="60" align="center"><strong>Qtd. Participantes</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=nome_treinamento%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=nome_treinamento&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Nome do Treinamento</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=datatreino%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=datatreino&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Data/Horário</strong></td>
		<td colspan="4" align="center"><strong>A&ccedil;&atilde;o</strong></td>
    </tr>
	<?php
	if($rs_linhas > 0){
		for($cont_i=0; $cont_i<$rs_linhas; $cont_i++){
			$rs_dados = mysql_fetch_array($rs_query);
			if(trim(strtoupper($rs_dados['status'])) == "A"){
				$var_status = $folders['icones']."ico_ativo_on.gif";
				$var_texto_status = 'Ativo';
			}
			else{
				$var_status = $folders['icones']."ico_ativo_off.gif";
				$var_texto_status = 'Inativo';
			}
	?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#ededed';" onMouseOut="this.bgColor='#ffffff';">
		<td align="center"><?php echo $rs_dados['id'];?></td>
		<td align="center"><?php echo $rs_dados['qtd_participantes'];?></td>
		<td align="center"><?php echo $rs_dados['nome_treinamento'];?></td>
		<td align="center"><?php echo fun_tratamento_data($rs_dados['datatreino'],'L');?></td>
		<td width="20" align="center"><a href="mudastatus.php?id=<?php echo $rs_dados['id'];?>&amp;status=<?php echo $rs_dados['status'];?>&acao=A"><img src="<?php echo $var_status;?>" alt="<?php echo $var_texto_status;?>" title="<?php echo $var_texto_status;?>" border="0" /></a></td>
		<!--<td width="20" align="center"><a href="formcadastro.php?pagina=<?php echo $var_pagina;?>&amp;id=<?php echo $rs_dados['id'];?>&amp;acao=A&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_alterar.gif" alt="Alterar" border="0" title="Alterar" /></a></td>-->
	    <td width="20" align="center"><a href="javascript:jValidaExclusao('processacadastro.php?id=<?php echo $rs_dados['id'];?>&amp;pagina=<?php echo $var_pagina;?>&amp;acao=E&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>');"><img src="<?php echo $folders['icones'];?>ico_excluir.gif" alt="Excluir" title="Excluir" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php echo $var_pagina;?>&amp;id=<?php echo $rs_dados['id'];?>&amp;acao=C&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_consultar.gif" alt="Consultar" title="Consultar" border="0" /></a></td>
    </tr>
	<?php }
	}	?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="10">
			<font size="2" face="Trebuchet MS"><strong><?php echo $var_registro;?></strong>&nbsp;<?php $var_registro > 1 ? print $default['campos'] : print $default['registro'];?></font>
		</td>
	</tr>
	<tr align="left" bgcolor="#FFFFFF">
		<td colspan="10" align="right">
			<?php echo fun_paginacao($var_pagina,$var_totalpaginas,'txt_col',2,$var_itens,$var_ordem,$var_busca);?>
		</td>
	</tr>
</table>
</form>
<?php require($include['footer']);?>