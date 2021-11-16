<?php
	//Iniciando Sessão
	session_start();
	
	//Include de conexão com o BD e include de Segurança
	include "../../includes/incConexao.php";
	include "../../includes/incSeguranca.php";
	
	fSeguranca ($_SESSION['id'], $_SESSION['idgrupo'], 1, "C");
	
	//Itens por página
	$nItens = $_GET["itens"];
	if (strlen($nItens) == 0) { 
		$nItens = 10;
	}

	//Define a quantidade de Páginas
	$nPagina = $_GET["pagina"];
	if (!$nPagina) {
	   $nInicio = 0;
   	   $nPagina = 1;}
	else {
   	   $nInicio = ($nPagina - 1) * $nItens;
	} 
	
	//Verificando Ordem
	$nOrdem = $_GET["ordem"];
	if (strlen($nOrdem) == 0) { 
		$nOrdem = "grupo";
	}
	
	//Verificando Critério de Busca
	$nBusca = $_GET["busca"];
	if (strlen($nBusca) == 0) {
	   $nCriterio = " ORDER BY ".$nOrdem;}
	else {
   	   $nCriterio = " AND grupo LIKE '%".$nBusca."%' ORDER BY ".$nOrdem;
	}     

	//Capturando total de registros na tabela
	$nSQL = "SELECT * FROM tbsegurancagrupos WHERE id <> 0 " . $nCriterio;
	$rsRS = mysql_query($nSQL,$conn);
	$nTotalReg = mysql_num_rows($rsRS);

	//Calculando total de páginas
	$nTotalPag = ceil($nTotalReg / $nItens);

	//Monta instrução SQL
	$nSQL = "SELECT * FROM tbsegurancagrupos WHERE id <> 0 " . $nCriterio . " limit " . $nInicio . "," . $nItens;
	$rsRS = mysql_query($nSQL);

	//Retorna número de registros encontrados
	$nNumResults = mysql_num_rows($rsRS);?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>.::. Backend - Premium RH .::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="../../includes/incEstilo.css" rel="stylesheet" type="text/css">
	<script language="JavaScript" type="text/JavaScript" src="../../includes/incJava.js"></script>
	<script>
	//Validação do Formulário
	function fVerificaForm(form,evento){
		if (form.busca.value==""){
			alert("Atenção!\nO campo BUSCA deve ser preenchido.");
			form.busca.focus();
			return false;}
	}
	//Validação de Exclusão
	function jValidaExclusao(jURL)
	{
		jMsg = "Deseja realmente excluir o registro?";
		input_box=confirm(jMsg);
		if (input_box==true)
		{
			// Output when OK is clicked
			location.href = jURL;
		}
	}
	</script>
</head>
<body>
<?	//Include de Menu
	include "../../includes/incMenu.php";?>
<table width="760" border="0" align="center" cellpadding="1" cellspacing="2" bgcolor="#CCCCCC">
	<tr>
		<th colspan="6">Cadastro de Grupos de Segurança</th> 
	</tr>
	<tr bgcolor="#FFFFFF">
		<form name="formItens" action="index.php">
		<td align="center">
			<input name="itens" type="text" id="itens" size="2" maxlength="2" value="<?php echo $nItens?>" style="font: xx-small Tahoma;">&nbsp;
			<input type="hidden" name="ordem" id="ordem" value="<?php echo $nOrdem?>">
			<input type="hidden" name="pagina" id="pagina" value="<?php echo $nPagina?>">
			<input type="hidden" name="busca" id="busca" value="<?php echo $nBusca?>">
			<a href=javascript:formItens.submit();>Itens</a>
		</td>
		</form>
	    <form name="formBusca" action="index.php" onSubmit="return fVerificaForm(this,event);">
		<td align="center">Buscar:
			<input name="busca" type="text" id="busca" value="<?php echo $nBusca?>" style="font: xx-small Tahoma;">&nbsp;
			<input type="image" src="../../icones/ico_buscar.gif" style="border: 0px;" alt="Buscar" align="absmiddle">&nbsp;
			<a href="index.php"><img src="../../icones/ico_lista.gif" width="16" height="16" alt="Listar todos" border="0" align="absmiddle"></a>
			<input type="hidden" name="ordem" id="ordem" value="<?php echo $nOrdem?>">
			<input type="hidden" name="pagina" id="pagina" value="<?php echo $nPagina?>">
			<input type="hidden" name="itens" id="itens" value="<?php echo $nItens?>">
		</td>
		</form>
	    <td colspan="3" align="center" bgcolor="#FFFFFF"><a href="formcadastro.php?acao=I">Novo Grupo</a></td>
	</tr>
	<tr bgcolor="#EEEEEE">
		<td width="100" align="center"><strong>C&oacute;digo</strong></td>
		<td align="center"><a href="?ordem=grupo&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="../../icones/ico_setabaixo.gif" width="11" border="0" height="11" align="right" alt="Ordem Decrescente"></a><a href="?ordem=grupo%20DESC&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="../../icones/ico_setacima.gif" width="11" height="11" border="0" align="right" alt="Ordem Crescente"></a><strong>Grupo</strong></td>
		<td width="90" colspan="4" align="center"><strong>A&ccedil;&otilde;es</strong></td>
	</tr>
	<?php
	//Listando registros encontrados
	if ($nNumResults > 0){
		for ($i=0; $i <$nNumResults; $i++){
			//Percorre os registros da tabela com o Array
			$row = mysql_fetch_array($rsRS);?>
			<tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#EFEFEF';" onMouseOut="this.bgColor='#FFFFFF';">
				<td align="center"><?php echo $row['id']?></td>
				<td align="center"><?php echo $row['grupo']?></td>
				<td align="center" width="30"><a href="formcadastro.php?acao=A&id=<?php echo $row['id']?>&ordem=<?php echo $nOrdem?>&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="../../icones/ico_alterar.gif" alt="Alterar" width="19" height="19" border="0"></a></td>
				<td align="center" width="30"><a href="javascript:jValidaExclusao('processaExclusao.php?id=<?php echo $row['id']?>')"><img src="../../icones/ico_excluir.gif" alt="Excluir" width="13" height="13" border="0"></a></td>
				<td align="center" width="30"><a href="formcadastro.php?acao=C&id=<?php echo $row['id']?>&ordem=<?php echo $nOrdem?>&pagina=<?php echo $nPagina?>&itens=<?php echo $nItens?>&busca=<?php echo $nBusca?>"><img src="../../icones/ico_consultar.gif" alt="Consultar" width="21" height="18" border="0"></a></td>
			</tr>
	<? }
	}?>
	<tr>
		<td colspan="6" bgcolor="#EEEEEE"> <strong><?php echo $nTotalReg?></strong> Grupos est&atilde;o cadastrados no sistema</td>
    </tr>
	<tr>
		<td align="right" colspan="6" bgcolor="#FFFFFF">
		<?php //Paginação dos Registros
			   for ($i=1; $i<=$nTotalPag; $i++){
			      if ($nPagina == $i)
			         //Mostra página atual sem link
			         echo $nPagina . " ";
			      else
			         //Mostra páginas com link
			         echo "<a href='index.php?pagina=".$i."&itens=".$nItens."&ordem=".$nOrdem."&busca=".$nBusca."'>" . $i . "</a> ";
			   }?>
		</td>
	</tr>
</table>
<br>
<div align="center">  
	<?php
	//Include de Rodapé
	include "../../includes/incRodape.php";
	
	//Fecha conexão com o Banco
	mysql_close($conn);?>
</div>
</body>
</html>