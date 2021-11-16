<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],'C',$default['nivel']);
$default['filtro']      = 'id';
$default['ordem']       = 'id DESC';
$default['busca']       = 'secao';
$default['tabela']      = 'tbsecao';
$default['titulo']      = 'Seção';
$default['campos']      = 'seções est&atilde;o cadastradas no sistema.';
$default['registro']    = 'seção esta cadastrada no sistema.';
require($template['valvars']);
$rs_teste = '';
require($template['rec_set']);
require($template['headers']);
?>
<script language="JavaScript" type="text/javascript">
function jValidaBusca(form){
	if(form.busca.value == ""){
		alert("Por favor, preencha o campo BUSCA corretamente.");
		form.busca.focus();
		return false;
	}
}
function jValidaExclusao(jURL){
	jMsg = "Deseja realmente excluir o registro ?";
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
		<th colspan="8">Cadastro de <?php echo $default['titulo'];?></th>
	</tr>
	<tr bgcolor="#EBEBEB">
      <td align="center">
      	<input type="hidden" name="pagina" id="pagina" value="<?php echo $var_pagina;?>" />
      	<input type="hidden" name="ordem" id="ordem" value="<?php echo str_replace(" ","%20",$var_ordem);?>" />
	  	<input type="text" name="itens" id="itens" value="<?php echo $var_itens;?>" size="2" maxlength="2" style="font: xx-small Trebuchet MS;" />
      	<input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_seta.gif" alt="Itens" />
	  </td>
      <td align="center" bgcolor="#EBEBEB" colspan="2"><a href="index.php"><img src="<?php echo $folders['icones'];?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar:</font> <input name="busca" type="text" id="busca" value="<?php echo $var_busca;?>" size="24" maxlength="24" />
      </td>
    	<td align="center" colspan="5">
			<a href="formcadastro.php?acao=I">Nova Seção</a>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="120" align="center"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=id%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=id&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=secao%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=secao&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Seção</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=categoria%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=categoria&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Categoria</strong></td>
		<td align="center" colspan="5"><strong>A&ccedil;&atilde;o</strong></td>
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
			if(trim(strtoupper($rs_dados['atualizando'])) == "S"){
				$var_atualizando = $folders['icones']."ico_ativo_on.gif";
				$var_texto_atualizando = 'Atualizando';
			}
			else{
				$var_atualizando = $folders['icones']."ico_ativo_off.gif";
				$var_texto_atualizando = 'Liberado';
			}
			$categoria = fun_pegacategoria($conexao,$rs_dados['categoria']);
	?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';">
		<td align="center"><?php echo $rs_dados['id'];?></td>
		<td align="center"><?php echo $rs_dados['secao'];?></td>
		<td align="center"><?php echo $categoria;?></td>
		<td width="20" align="center"><a href="mudaupdate.php?id=<?php echo $rs_dados['id'];?>&amp;atualizando=<?php echo $rs_dados['atualizando'];?>&amp;acao=A"><img src="<?php echo $var_atualizando;?>" alt="<?php echo $var_texto_atualizando;?>" title="<?php echo $var_texto_atualizando;?>" border="0" /></a></td>
		<td width="20" align="center"><a href="mudastatus.php?id=<?php echo $rs_dados['id'];?>&amp;status=<?php echo $rs_dados['status'];?>&amp;acao=A"><img src="<?php echo $var_status;?>" alt="<?php echo $var_texto_status;?>" title="<?php echo $var_texto_status;?>" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php echo $var_pagina;?>&amp;id=<?php echo $rs_dados['id'];?>&amp;acao=A&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_alterar.gif" title="Alterar" alt="Alterar" border="0" /></a></td>
	    <td width="20" align="center"><a href="javascript:jValidaExclusao('processacadastro.php?id=<?php echo $rs_dados['id'];?>&amp;pagina=<?php echo $var_pagina;?>&amp;acao=E&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>');"><img src="<?php echo $folders['icones'];?>ico_excluir.gif" title="Excluir" alt="Excluir" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php echo $var_pagina;?>&amp;id=<?php echo $rs_dados['id'];?>&amp;acao=C&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_consultar.gif" title="Consultar" alt="Consultar" border="0" /></a></td>
    </tr>
	<?php }
	}	?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="8">
			<font size="2" face="Trebuchet MS"><strong><?php echo $var_registro;?></strong>&nbsp;<?php $var_registro > 1 ? print $default['campos'] : print $default['registro'];?></font>
		</td>
	</tr>
	<tr align="left" bgcolor="#FFFFFF">
		<td colspan="8" align="right">
			<?php echo fun_paginacao($var_pagina,$var_totalpaginas,'txt_col',2,$var_itens,$var_ordem,$var_busca);?>
		</td>
	</tr>
</table>
</form>
<?php require($include['footer']);?>