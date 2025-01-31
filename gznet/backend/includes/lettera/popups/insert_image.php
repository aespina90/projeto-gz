<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
<title>Lettera | Inserir Imagem</title>
</head>
<script language="JavaScript" type="text/javascript">

var qsParm = new Array();


/* ---------------------------------------------------------------------- *\
  Function    : retrieveWYSIWYG()
  Description : Retrieves the textarea ID for which the image will be inserted into.
\* ---------------------------------------------------------------------- */
function retrieveWYSIWYG() {
  var query = window.location.search.substring(1);
  var parms = query.split('&');
  for (var i=0; i<parms.length; i++) {
    var pos = parms[i].indexOf('=');
    if (pos > 0) {
       var key = parms[i].substring(0,pos);
       var val = parms[i].substring(pos+1);
       qsParm[key] = val;
    }
  }
}


/* ---------------------------------------------------------------------- *\
  Function    : insertImage()
  Description : Inserts image into the WYSIWYG.
\* ---------------------------------------------------------------------- */
function insertImage()
{
  var image = '<img src="'+location.protocol + "//" + location.hostname + "/dbimagens/" + document.getElementById('imageurl').value + '" alt="' + document.getElementById('alt').value + '" alignment="' + document.getElementById('alignment').value + '" border="' + document.getElementById('borderThickness').value + '" hspace="' + document.getElementById('horizontal').value + '" vspace="' + document.getElementById('vertical').value + '">';
  window.opener.insertHTML(image, qsParm['wysiwyg']);  
  window.close();
}

</script>
<body bgcolor="#EEEEEE" marginwidth="0" marginheight="0" topmargin="0" leftmargin="0" onLoad="retrieveWYSIWYG();">
<form name="formCadastro" method="POST">
<table border="0" cellpadding="0" cellspacing="0" style="padding: 10px;"><tr><td>

<span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Inserir Imagem:</span>
<table width="380" border="0" cellpadding="0" cellspacing="0" style="background-color: #F7F7F7; border: 2px solid #FFFFFF; padding: 5px;">
 <tr>
  <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;" width="80">Endere�o da Imagem:</td>
	<td style="padding-bottom: 2px; padding-top: 0px;" width="300"><input type="hidden" name="imageurl" id="imageurl" value=""  style="font-size: 10px; width: 100%;"><button id="procurar" name="procurar" onClick="window.open('indiceimagens.php?campo=imageurl','','location=0,status=0,scrollbars=0,resizable=0,width=760,height=420,scrollbars=yes');">Procurar</button></td>
 </tr>
 <tr>
  <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Legenda da Imagem:</td>
	<td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="alt" id="alt" value=""  style="font-size: 10px; width: 100%;"></td>
 </tr>
</table>



<table width="380" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px;"><tr><td>

<span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Layout:</span>
<table width="185" border="0" cellpadding="0" cellspacing="0" style="background-color: #F7F7F7; border: 2px solid #FFFFFF; padding: 5px;">
 <tr>
  <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;" width="100">Alinhamento:</td>
	<td style="padding-bottom: 2px; padding-top: 0px;" width="85">
	<select name="alignment" id="alignment" style="font-family: arial, verdana, helvetica; font-size: 11px; width: 100%;">
	 <option value="">N�o Definido</option>
	 <option value="left">Esquerda</option>
	 <option value="right">Direita</option>
	 <option value="center">Centralizado</option>
	 <option value="texttop">Texto Acima</option>
	 <option value="baseline">Fundo</option>
	 <option value="bottom">Baixo</option>
	 <option value="middle">Meio</option>
	 <option value="top">Topo</option>
	</select>
	</td>
 </tr>
 <tr>
  <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Expessura da Borda:</td>
	<td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="borderThickness" id="borderThickness" value=""  style="font-size: 10px; width: 100%;"></td>
 </tr>
</table>

</td>
<td width="10">&nbsp;</td>
<td>

<span style="font-family: arial, verdana, helvetica; font-size: 11px; font-weight: bold;">Espa�amento:</span>
<table width="185" border="0" cellpadding="0" cellspacing="0" style="background-color: #F7F7F7; border: 2px solid #FFFFFF; padding: 5px;">
 <tr>
  <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;" width="80">Horizontal:</td>
	<td style="padding-bottom: 2px; padding-top: 0px;" width="105"><input type="text" name="horizontal" id="horizontal" value=""  style="font-size: 10px; width: 100%;"></td>
 </tr>
 <tr>
  <td style="padding-bottom: 2px; padding-top: 0px; font-family: arial, verdana, helvetica; font-size: 11px;">Vertical:</td>
	<td style="padding-bottom: 2px; padding-top: 0px;"><input type="text" name="vertical" id="vertical" value=""  style="font-size: 10px; width: 100%;"></td>
 </tr>
</table>

</td></tr></table>

<div align="right" style="padding-top: 5px;"><input type="submit" value="  Inserir Imagem  " onClick="insertImage();" style="font-size: 12px;" >&nbsp;<input type="submit" value="  Cancelar  " onClick="window.close();" style="font-size: 12px;" ></div>


</form>
</body>
</html>
