<?php
session_start();
	// Conexão com o banco de dados
	require ( 'inc_conexao_interno.php' ) ;
	// Funções
	require ( 'inc_funcoes.php' );
//recupera o ID da matéria
	$var_id = $_REQUEST['id'];
	$var_id = ereg_replace("[^0-9.]", "",$var_id);
// Recupera últimas mensagens recebidas do usuário
	$rs_sql = 'SELECT * FROM tblettera
			   WHERE status = "A" AND ( datapublicacao < NOW() AND ( dataexpiracao > NOW() OR expirar = "N" ) ) AND id = '. $var_id .'
			   ORDER BY datapublicacao DESC, assunto ASC' ;
	$rs_query = mysql_query ( $rs_sql , $conexao['conexao'] ) or die (mysql_error());
	$rs_linhas = mysql_num_rows ( $rs_query ) ;
	if( $rs_linhas > 0 )
	{
		$rs_dados = mysql_fetch_array ( $rs_query );
	}
?>
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script language="JavaScript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function fVerificaForm(form)
{
	if (form.email.value=="")
	{
		alert("Atenção!\nO campo E-MAIL deve ser preenchido.");
		form.email.focus();
		return false;
	}
	if (form.emailamigo.value=="")
	{
		alert("Atenção!\nO campo E-MAIL DO AMIGO deve ser preenchido.");
		form.emailamigo.focus();
		return false;
	}
}
</script>
<style>
* {
  font-family:verdana;
  font-size:10px;
  color:#000;
}
</style>
</head>
<body style="background-color:#FFFFFF;" marginheight=0 marginwidth=0 topmargin=0 leftmargin=0 bgcolor=#FFFFFF onload=javascript:print();>
<img src="imagens/topo_imprimir.jpg">
<div align="justify" style="padding:0 10px 0 10px;" id="centro">
	<p><b><br><?php print $rs_dados['assunto'] ; ?></b></p><br>
	<p><em><?php print $rs_dados['lead'] ; ?></em></p><br>
	<p><?php print $rs_dados['materia'] ; ?></p>
</div>
</body>
</html>