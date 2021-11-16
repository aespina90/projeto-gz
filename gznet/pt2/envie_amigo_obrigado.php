<?php
session_start();
	// Conexão com o banco de dados
	require ( 'inc_conexao_interno.php' ) ;
	require ( 'inc_funcoes.php' ) ;
// recupera variáveis
	$var_pagina		= $_REQUEST['pagina'];
	$var_id 		= $_REQUEST['id'];
	$var_id_secao           = $_REQUEST['idsecao'];
	$var_nome 		= $_REQUEST['nome'] ;
	$var_email 		= $_REQUEST['email'] ;
	$var_emaildest          = $_REQUEST['emailamigo'] ;
	$var_mensagem           = $_REQUEST['mensagem'] ;
	$var_url 		=  fun_URL();
	$email_padrao           = "gznet@gznet.com.br";

	$var_id                 = ereg_replace("[^0-9.]", "",$var_id);
	$var_id_secao           = ereg_replace("[^0-9.]", "",$var_id_secao);

//*** recupera a matéria a ser enviada
	$rs_sql_envie = 'SELECT * FROM tblettera
			   WHERE status = "A" AND ( datapublicacao < NOW() AND dataexpiracao > NOW() ) AND id = '. $var_id .'
			   ORDER BY datapublicacao DESC, assunto ASC' ;
	$rs_query_envie = mysql_query ( $rs_sql_envie , $conexao['conexao'] ) or die (print $rs_sql_envie);
	$rs_linhas_envie = mysql_num_rows ( $rs_query_envie ) ;
	if( $rs_linhas_envie > 0 )
	{
		$rs_dados = mysql_fetch_array ( $rs_query_envie );
	//*** corpo do e-mail
		$msg =  '<html><head><LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
				 <STYLE type=text/css>.menu:hover { COLOR: #860000; text-decoration: none}.menu { COLOR: #860000; TEXT-DECORATION: none; font-family: arial,verdana,tahoma,trebuchet ms; font-size: 8pt}
									  .assunto:hover { COLOR: #993300; text-decoration: none}.assunto { COLOR: #993300; TEXT-DECORATION: none; font-family: arial,verdana,tahoma,trebuchet ms; font-size: 8pt}
									  .titulo10:hover { COLOR: #006699; text-decoration: none}.titulo10 { COLOR: #006699; TEXT-DECORATION: none; font-family: arial,verdana,tahoma,trebuchet ms; font-size: 10pt}
									  .titulo12:hover { COLOR: #006699; text-decoration: none}.titulo12 { COLOR: #006699; TEXT-DECORATION: none; font-family: arial,verdana,tahoma,trebuchet ms; font-size: 12pt}
									  .txt:hover { COLOR: #000000; text-decoration: none}.txt { COLOR: #000000; TEXT-DECORATION: none; font-family: arial,verdana,tahoma,trebuchet ms; font-size: 8pt}
				 </STYLE>
				 </head>
				 <body marginheight=0 marginwidth=0 topmargin=0 leftmargin=0><table cellpadding=0 cellspacing=0 border=0 width=480 align=center bgcolor=#ffffff><tr><td>
				 <a href="'.$var_url.'"><img src="'.$var_url.'/imagens/topo_indique_amigo.jpg" border=0></a></td></tr></table><table cellpadding=0 cellspacing=0 border=0 width=480 align=center bgcolor=#ffffff><tr><td>&nbsp;&nbsp;&nbsp;</td><td valign=top>
				 <br> Seu amigo(a) <b>' . $var_nome  . '</b> indicou um texto do site <b>GZ Sistemas</b> para você:<br><br>Mensagem dele(a) para você:<br>' . $var_mensagem . '
				 <br><br>Leia a matéria no site do <b>GZ Sistemas</b>:<br><a href='. $var_url .'/'.$var_pagina . '.php?id=' . $var_id . '&id_secao=' . $var_id_secao . '><font color="#000000">'. $var_url .'/'. $var_pagina . '.php?id=' . $var_id . '&id_secao=' . $var_id_secao . '</font></a>
				 <br><br>Conheça o site do <b>GZ Sistemas</b>:<br><a href="'.$var_url.'"><font color="#000000">'.$var_url.'</font></a><br><br></font></td><td>&nbsp;&nbsp;&nbsp;</td></tr></table><table cellpadding=0 cellspacing=0 border=0 width=480 height=40 bgcolor=#DB1218 align=center>
				 </table></body></html>' ;
	//*** envia o e-mail
		if ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'WIN' ))
		{
		  $eol="\r\n";
		}
		elseif ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'MAC' ))
		{
		  $eol="\r";
		}
		else
		{
		  $eol="\n";
		}
		$headers  = "MIME-Version: 1.0" . $eol;
		$headers .= "Content-type: text/html; charset=iso-8859-1" . $eol;
		$headers .= "From: [GZ Sistemas] <contato@gzsistemas.com.br>".$eol;
		mail($var_emaildest , 'Leia este texto no site da GZ Sistemas', $msg , $headers) ;
		mail($email_padrao  , 'Leia este texto no site da GZ Sistemas', $msg , $headers) ;
	}

?>
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<link rel="stylesheet" href="css.css" type="text/css"/>

<style>
* {
  font-family:verdana;
  font-size:10px;
  color:#000;
}
</style>
</head>
<body style="background-color:#FFFFFF;" marginheight=0 marginwidth=0 topmargin=0 leftmargin=0 bgcolor=#ffffff>
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="texto_preto">
	<tr>
		<td><img src="imagens/topo_indique_amigo.jpg" border=0></td>
	</tr>
	<tr>
		<td valign="top" style="padding:0 10px 0 10px;">
		<p><br><b>Texto enviado com sucesso!</b><br><br><br><br></p>
		<p>Obrigado por divulgar o conteúdo do <b>GZ Sistemas</b>.</p><br><br><br><br><br><br>
		<div align="left" style="margin:0 0 0 160px"><a href="javascript:window.close()"><font color=black>Fechar esta janela</font></a></div><br><br>
		</td>
	</tr>
</table>
</body>
</html>