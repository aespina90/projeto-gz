<?php
function TamanhoArquivo($cFile) 
{ 
         if ( file($cFile) ){ 
            $nSize = filesize($cFile); 
            if ($nSize<1024) { return strval($nSize).' bytes'; } 
            if ($nSize<pow(1024,2)) { return inttostr( $nSize/1024, 1).' KB' 
; } 
            if ($nSize<pow(1024,3)) { return inttostr( $nSize/pow(1024,2), 
1).' MB'; } 
            if ($nSize<pow(1024,4)) { return inttostr( $nSize/pow(1024,3), 
1).' GB'; } 
         } 
} 
date_default_timezone_set("Brazil/East");
$data = date('d/m/Y');
$hora_inicial = date('H:m');
$hora_final = date('H:m');
$nbkp_bd_site = "201201241116_site_bd.tar.gz";
$nbkp_dados_site = "201201241116_site_dados.tar.gz";
$nbkp_bd_elearning = "201201241116_elearning_bd.tar.gz";
$nbkp_dados_elearning = "201201241116_elearning_dados.tar.gz";
$dir_bkp='/var/www/html/backup/backups/';
$tam_total = $tam_total + filesize($dir_bkp.$nbkp_bd_site);
$tam_total = $tam_total + filesize($dir_bkp.$nbkp_dados_site);
$tam_total = $tam_total + filesize($dir_bkp.$nbkp_bd_elearning);
$tam_total = $tam_total + filesize($dir_bkp.$nbkp_dados_elearning);
$tam_total = $tam_total/1024;
$nCorpoEmail = '
<html>
<head>
<style type="text/css">
a{
color: red;
}

table{
	font: 12px Arial;
	border-width: 1px;
	border-color: black;
	border-collapse: separete;
	border-spacing: 1px;
}
.ttl_1{
horizontal-aling:center;
font-weight: bold;
font-size: 16px;
background-color: #000000;
color: #ffffff;
}
.ttl_2{
background-color: #e8eae8;
color: 696969;
font-size: 11px;
font-weight: bold;
}
.ttl_3{
background-color: #2F4F4F;
color: 696969;
font-size: 11px;
font-weight: bold;
color: #ffffff;
text-align:center;
}
.ttl_4{
horizontal-aling:center;
font-weight: bold;
font-size: 14px;
background-color: #2F4F4F;
color: #ffffff;
text-align: center;
}
.ttl_5{
font-size:10px;
text-align: center;
}
.line_2{
background-color:#F0FFFF;
}
</style>
</head>
<body>
<table>
	<tr>
		<td colspan=5 class="ttl_1">BACKUP GERAL DIA: '.$data.'</td>
	</tr>
	<tr>
		<td class="ttl_2">HORARIO INICIO:</td>
		<td colspan=4>'.$hora_inicial.'</td>
	</tr>
		<tr>
		<td class="ttl_2">HORARIO TERMINO:</td>
		<td colspan=4>'.$hora_final.'</td>
	</tr>
		<tr>
		<td class="ttl_2">TAMANHO TOTAL:</td>
		<td colspan=4>'.round($tam_total).' MB</td>
	</tr>
		</tr>
		<tr>
		<td class="ttl_2">CAMINHO:</td>
		<td colspan=4>'.$dir_bkp.'</td>
	</tr>
	<tr>
		<td colspan=5 class="ttl_4">SITE GZ SISTEMAS</td>
	</tr>
	<tr>
	<td width="300px" class="ttl_3">NOME</td>
	<td width="100px" class="ttl_3">TIPO</td>
	<td width="100px" class="ttl_3">TAMANHO</td>
	<td width="100px" class="ttl_3">DATA/HORA</td>
	<td width="100px" class="ttl_3">DOWNLOAD</td>
	</tr>
		<tr>
	<td width="300px">'.$nbkp_bd_site.'</td>
	<td width="100px">Banco de Dados</td>
	<td width="100px">'. filesize($dir_bkp.$nbkp_bd_site) . " b".'</td>
	<td width="100px" class="ttl_5">'. date ("d/m/Y H:i", filemtime($dir_bkp.$nbkp_bd_site)).'</td>
	<td width="100px"><a href="http://www.gzsistemas.com.br/backup/'.$nbkp_bd_site.'">[LINK]</a></td>
	</tr>
		<tr class="line_2">
	<td width="300px">'.$nbkp_dados_site.'</td>
	<td width="100px">Arquivos</td>
	<td width="100px">'. filesize($dir_bkp.$nbkp_dados_site) . " b".'</td>
	<td width="100px" class="ttl_5">'. date ("d/m/Y H:i", filemtime($dir_bkp.$nbkp_dados_site)).'</td>
	<td width="100px"><a href="http://www.gzsistemas.com.br/backup/'.$nbkp_dados_site.'">[LINK]</a></td>
	</tr>
	<tr>
		<td colspan=5 class="ttl_4">ELEARNING SISTEMAS</td>
	</tr>
	<tr>
	<td width="200px" class="ttl_3">NOME</td>
	<td width="100px" class="ttl_3">TIPO</td>
	<td width="100px" class="ttl_3">TAMANHO</td>
	<td width="100px" class="ttl_3">DATA/HORA</td>
	<td width="100px" class="ttl_3">DOWNLOAD</td>
	</tr>
		<tr>
	<td width="200px">'.$nbkp_bd_elearning.'</td>
	<td width="100px">Banco de Dados</td>
	<td width="100px">'. filesize($dir_bkp.$nbkp_bd_elearning) . " b".'</td>
	<td width="100px" class="ttl_5">'. date ("d/m/Y H:i", filemtime($dir_bkp.$nbkp_bd_elearning)).'</td>
	<td width="100px"><a href="http://www.gzsistemas.com.br/backup/'.$nbkp_bd_elearning.'">[LINK]</a></td>
	</tr>
		<tr class="line_2">
	<td width="200px">'.$nbkp_dados_elearning.'</td>
	<td width="100px">Arquivos</td>
	<td width="100px">'. filesize($dir_bkp.$nbkp_dados_elearning) . " b".'</td>
	<td width="100px" class="ttl_5">'. date ("d/m/Y H:i", filemtime($dir_bkp.$nbkp_dados_elearning)).'</td>
	<td width="100px"><a href="http://www.gzsistemas.com.br/backup/'.$nbkp_dados_elearning.'">[LINK]</a></td>

</table>
</body>
</html>
';
$headers  = "MIME-Version: 1.0" . $eol;
$headers .= "Content-type: text/html; charset=iso-8859-1" . $eol;
$headers .= "From: [GZ Sistemas] <contato@gzsistemas.com.br>".$eol;
$envio_email = 'zago.rafael@gzsistemas.com.br';
mail($envio_email ,"[GZ Sistemas] Backup",$nCorpoEmail,$headers);
?>