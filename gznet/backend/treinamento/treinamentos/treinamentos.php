<?php
require('../../includes/inc_conexao.php');
require('../../includes/inc_funcoes.php');
if(strlen($_REQUEST['id_treinamento']) > 0){
	$sql = 'SELECT * FROM tbtreinamentosaux WHERE id_treinamento = "'.$_REQUEST['id_treinamento'].'" AND id_treino = "'.$_REQUEST['id_treino'].'"';
	$query = mysql_query($sql,$conexao['conexao'])or die(mysql_error());
	$linhas = mysql_num_rows($query);
?>
<table width="100%">
	<?php
	if($linhas > 0){
		for($cont=0; $cont<$linhas; $cont++){
			$dados = mysql_fetch_array($query);
	?>
		<tr>
			<td bgcolor="#FFFFFF">Nome:</td>
			<td colspan="4" bgcolor="#FFFFFF"><input type="text" name="participante" id="participante" value="<?php echo $dados['participante'];?>" size="90" maxlength="255" /></td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF">CPF:</td>
			<td bgcolor="#FFFFFF"><input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf'];?>" size="32" maxlength="255" /></td>
			<td bgcolor="#FFFFFF">RG:</td>
			<td bgcolor="#FFFFFF"><input type="text" name="rg" id="rg" value="<?php echo $dados['rg'];?>" size="32" maxlength="255" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
	<?php }
	}	?>
<table>
<?php } ?>