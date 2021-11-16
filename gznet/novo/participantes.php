<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<?php
for($cont_i=0; $cont_i<$_REQUEST['participantes']; $cont_i++){
	if($rs_linhas_ajax > 0){
		$rs_dados_ajax = mysql_fetch_array($rs_query_ajax);
	}
?>
	<tr><td><div class="texto_fomularios"><strong>&nbsp;Nome:</strong></div></td></tr>
	<tr><td colspan="2"><input name="participante_<?=$cont_i;?>" type="text" id="participante_<?=$cont_i;?>" size="35" maxlength="40"><font color="#3E4289"> *</font></td></tr>
	<tr>
		<td><div align="right" class="texto_fomularios"><strong>&nbsp;CPF:</strong></div></td>
		<td>&nbsp;<input name="cpf_<?=$cont_i;?>" type="text" id="cpf_<?=$cont_i;?>" size="24" onkeypress="return fnMascara(this, event,'###.###.###-##');" maxlength="14"/><font color="#3E4289"> *</font></td>
	</tr>
	<tr>
		<td><div align="right" class="texto_fomularios"><strong>&nbsp;RG:</strong></div></td>
		<td>&nbsp;<input name="rg_<?=$cont_i;?>" type="text" id="rg_<?=$cont_i;?>" size="24" maxlength="13" /><font color="#3E4289"> *</font></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
<?php } ?>
</table>