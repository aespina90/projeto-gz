<?php
// In�cio da sess�o
	session_start();
// N�vel
	$default['nivel'] = '../../';
// N�mero do m�dulo
	$default['modulo'] = 1;
// Configura��es da aplica��o
	require($default['nivel'].'global.php');
// Conex�o com o banco de dados
	require($include['conexao']);
// Fun�oes
	require($include['funcao']);
// Template: Leitura de _Get e/ou _Post
	require($template['getpost']);
// Fun��o de seguran�a
	fun_seguranca($_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , 'C' , $default['nivel'] ) ;
// Filtro utilizado
	$default['filtro'] = 'sub_secao';
// Nome do campo ordenado para visualiza��o
	$default['ordem'] = 'id DESC';
// Nome do campo de busca dentro da tabela/db
	$default['busca'] = 'sub_secao';
// T�tulo do documento
	$default['titulo'] = 'Sub-Se��es';
// Quantidade singular de registros cadastrados por extenso
	$default['registro'] = 'sub-se��o est&aacute; cadastrada no sistema.';
// Quantidade plural de registros cadastrados por extenso
	$default['campos'] = 'sub-se��es est&atilde;o cadastradas no sistema.';
// Condi��o de igualdade para conex�o com banco de dados
	$rs_teste = '';
// Template: Valida��o de vari�veis
	require($template['valvars']);
// Sele��o de registros da tabela
	$rs_sql_sub     = 'select tbsubsecao.id, tbsecao.categoria, tbsecao.secao, tbsubsecao.sub_secao, tbsubsecao.pasta, tbsubsecao.status';
	$rs_sql_sub    .= ' FROM tbsubsecao';
	$rs_sql_sub    .= ' LEFT OUTER JOIN tbsecao ON tbsubsecao.secao = tbsecao.id';
	$rs_query_sub   = mysql_query($rs_sql_sub, $conexao['conexao']);
	$rs_linhas_sub  = mysql_num_rows($rs_query_sub);
// Filtragem de busca
	if($var_busca != ''){ $rs_busca = ' AND '.$default['busca'].' LIKE "%'.$var_busca.'%"'; }
// Atribui��o do comando
	$rs_sql_sub .= $rs_teste.$rs_busca;
// Execu��o do comando
	$rs_query_sub = mysql_query($rs_sql_sub,$conexao['conexao']);
// N�mero de registros encontrados
	$rs_linhas_sub = mysql_num_rows($rs_query_sub);
// Grava o n�mero de registros encontrados
	$var_registro = $rs_linhas_sub;
// Grava o n�mero de p�ginas por itens
	$var_totalpaginas = ceil ( $rs_linhas_sub / $var_itens ) ;
// Verifica o n�mero da p�gina
	if(($var_pagina == '' ) or ( intval ( $var_pagina ) < 1 )){
	  	// Reseta o n�mero da p�gina
		$var_pagina = 1 ;
		// Reseta o marcador de registro
		$num_inicio = 0 ;
	}
	else{
		if ( intval ( $var_pagina ) > $rs_linhas_sub ){
		  	// Seta a p�gina como a �ltima
			$var_pagina = $rs_linhas_sub ;
			// Seta o marcador de registros para os �ltimos n itens
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
		else{
		  	// Seta o marcador de registro para os itens da p�gina atual
			$num_inicio = ( $var_pagina - 1 )* $var_itens ;
		}
	}
	// Filtragem de busca
	if($var_busca != ''){ $rs_busca = ' AND '.$default['busca'].' LIKE "%'.$var_busca.'%"'; }
	// Ordena��o de dados
	if($var_ordem != ''){ $rs_ordem = ' ORDER BY '. $var_ordem; }
	// Limite de dados na tela
	$rs_maximo  = ' LIMIT '.$num_inicio.', '.$var_itens;
	// Atribui��o do comando
	$rs_sql_sub .= $rs_teste.$rs_busca.$rs_ordem.$rs_maximo;
	// Execu��o do comando
	$rs_query_sub = mysql_query($rs_sql_sub,$conexao['conexao']);
	// N�mero de registros encontrados
	$rs_linhas_sub = mysql_num_rows($rs_query_sub);
	// Template: Cabe�alho do HTML
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
<table width="960" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<th colspan="9">Cadastro de <?php echo $default['titulo'];?></th>
	</tr>
	<tr bgcolor="#EBEBEB">
      <td align="center">
      	<input type="hidden" name="pagina" id="pagina" value="<?php echo $var_pagina;?>" />
      	<input type="hidden" name="ordem" id="ordem" value="<?php echo str_replace(" ","%20",$var_ordem);?>" />
	<input type="text" name="itens" id="itens" value="<?php echo $var_itens;?>" size="2" maxlength="2" style="font: xx-small Trebuchet MS;" />
      	<input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_seta.gif" alt="Itens" />
	  </td>
      <td align="center" bgcolor="#EBEBEB" colspan="3"><a href="index.php"><img src="<?php echo $folders['icones'];?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
        Buscar:</font> <input name="busca" type="text" id="busca" value="<?php echo $var_busca;?>" size="24" maxlength="24" />
      </td>
    	<td align="center" colspan="5">
			<a href="formcadastro.php?acao=I">Nova Sub-Se��o</a>
		</td>
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="120" align="center"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=id%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=id&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>C&oacute;digo</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=categoria%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=categoria&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Categoria</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=secao%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=secao&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Se��o</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=sub_secao%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=sub_secao&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Sub-Se��o</strong></td>
		<td align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=pasta%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=pasta&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Pasta</strong></td>
		<td align="center" colspan="5"><strong>A&ccedil;&atilde;o</strong></td>
    </tr>
	<?php
	if($rs_linhas_sub > 0){
		for($cont_i=0; $cont_i<$rs_linhas_sub; $cont_i++){
			$rs_dados_sub = mysql_fetch_array($rs_query_sub);
			if(trim(strtoupper($rs_dados_sub['status'])) == "A"){
				$var_status = $folders['icones']."ico_ativo_on.gif";
				$var_texto_status = 'Ativo';
			}
			else{
				$var_status = $folders['icones']."ico_ativo_off.gif";
				$var_texto_status = 'Inativo';
			}
			$categoria = fun_pegacategoria($conexao,$rs_dados_sub['categoria']);
	?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#EDEDED';" onMouseOut="this.bgColor='#FFFFFF';">
		<td align="center"><?php echo $rs_dados_sub['id'];?></td>
		<td align="center"><?php echo $categoria;?></td>
		<td align="center"><?php echo $rs_dados_sub['secao'];?></td>
		<td align="center"><?php echo $rs_dados_sub['sub_secao'];?></td>
		<td align="center"><?php echo $rs_dados_sub['pasta'];?></td>
		<td width="20" align="center"><a href="mudastatus.php?id=<?php echo $rs_dados_sub['id'];?>&amp;status=<?php echo $rs_dados_sub['status'];?>&amp;acao=A"><img src="<?php echo $var_status;?>" alt="<?php echo $var_texto_status;?>" title="<?php echo $var_texto_status;?>" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php echo $var_pagina;?>&amp;id=<?php echo $rs_dados_sub['id'];?>&amp;acao=A&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_alterar.gif" title="Alterar" alt="Alterar" border="0" /></a></td>
	    <td width="20" align="center"><a href="javascript:jValidaExclusao('processacadastro.php?id=<?php echo $rs_dados_sub['id'];?>&amp;pagina=<?php echo $var_pagina;?>&amp;acao=E&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>');"><img src="<?php echo $folders['icones'];?>ico_excluir.gif" title="Excluir" alt="Excluir" border="0" /></a></td>
		<td width="20" align="center"><a href="formcadastro.php?pagina=<?php echo $var_pagina;?>&amp;id=<?php echo $rs_dados_sub['id'];?>&amp;acao=C&amp;ordem=<?php echo str_replace(" ","%20",$var_ordem);?>&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_consultar.gif" title="Consultar" alt="Consultar" border="0" /></a></td>
    </tr>
	<?php }
	}	?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="9">
			<font size="2" face="Trebuchet MS"><strong><?php echo $var_registro;?></strong>&nbsp;<?php $var_registro > 1 ? print $default['campos'] : print $default['registro'];?></font>
		</td>
	</tr>
	<tr align="left" bgcolor="#FFFFFF">
		<td colspan="9" align="right">
			<?php echo fun_paginacao($var_pagina,$var_totalpaginas,'txt_col',2,$var_itens,$var_ordem,$var_busca);?>
		</td>
	</tr>
</table>
</form>
<?php require($include['footer']);?>