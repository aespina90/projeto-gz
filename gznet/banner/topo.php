<?php 
 session_start();
 include("verifica.php");
 include("../inc_conexao.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>.: Reatos Comunica&ccedil;&atilde;o - Painel Administrativo :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="nicEdit.js"></script>
<!--
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>-->
<script>
function newAba(x){      
   document.getElementById('2').style.visibility= "hidden";     
   document.getElementById('4').style.visibility = "hidden";   
   document.getElementById(x).style.visibility = "visible";   
}  

</script>

<script type="text/javascript" src="ckeditor.js"></script>
<script src="sample.js" type="text/javascript"></script>
<link href="sample.css" rel="stylesheet" type="text/css" />
</head>
<body style="margin: 0px; padding: 0px" bgcolor="#DDDDDD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#FFFFFF"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px;">
      <tr>
        <td width="233"><div align="center"><a href="principal.php"><img src="imagens/logo.gif" width="80" height="78" border="0" style="margin-bottom:15px;"></a></div></td>
        <td width="667" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td style="border-right: 15px solid #FFFFFF" width="25%" align="center" bgcolor="#333333"><a style="font-family:'Trebuchet MS', Verdana; color: #FFFFFF; font-size:16px; font-weight: bold; text-decoration: none" onclick="javascript:newAba('2')" href="#">Fun&ccedil;&otilde;es</a></td>
            
            <td style="border-right: 15px solid #FFFFFF" width="25%" align="center" bgcolor="#333333"><a style="font-family:'Trebuchet MS', Verdana; color: #FFFFFF; font-size:16px; font-weight: bold; text-decoration: none" onclick="javascript:newAba('4')" href="#">Suporte</a></td>
            <td width="25%" align="center"><a style="font-family:'Trebuchet MS', Verdana; color: #999999; font-size:16px; font-weight: bold; text-decoration: none" href="sair.php">Logout</a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#333333"><table width="900" border="0" align="center" cellpadding="6" cellspacing="0">
      <tr>
        <td width="78">&nbsp; </td>
        <td style="font-family:'Trebuchet MS', Verdana; color: #FFFFFF" width="798">&nbsp;  
        <div style="position: absolute; overflow: visible; visibility: hidden; left: 185px; width: 269px; top: 135px;" id="2">  
            <a style="text-decoration: none; color: #FFFFFF" href="principal.php">Banner</a> |
        </div>   
        <div style="position: absolute; overflow: visible; visibility: hidden;" id="4">   
           <a style="text-decoration: none; color: #FFFFFF" href="mailto:contato@adzcomunicacao.com.br">contato@adzcomunicacao.com.br</a>
        </div>  
   <br>
   <br></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="height: 4px" bgcolor="#9C0403"></td>
  </tr>
</table>
