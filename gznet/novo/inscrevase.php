<?php
session_start();
require('inc_conexao_interno.php');
require('inc_funcoes.php');

$id     = $_REQUEST['id'];
$tipo   = $_REQUEST['tipo'];

$id     = ereg_replace("[^0-9.]", "",$id);
$tipo   = substr($tipo,0,1);

$sql    = 'SELECT * FROM tbtipotreinamento WHERE status = "A" AND tipo = "'.$tipo.'" AND id = "'.$id.'"';
$query  = mysql_query($sql,$conexao['conexao'])or die(mysql_error());
$linhas = mysql_num_rows($query);

if($linhas > 0) { $dados = mysql_fetch_array($query); }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript" src="funcoes.js"></script>
<script type="text/javascript" src="inc_ajax.js"></script>
<link rel="stylesheet" href="css.css" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="resource-type" content="document"/>
<meta http-equiv="Expires" content="-1"/>
<meta http-equiv="pragma" content="no-cache"/>
<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT"/>
<meta name="revisit-after" content="10"/>
<meta name="classification" content="Site Venda de Sistemas"/>
<meta name="description" content="Software de automação comercial, frente de loja e retaguarda.TEF. Consultoria para supermercados. Equipamentos em geral. Computadores, no-breaks, impressoras fiscais"/>
<meta name="keywords" content="Sistema comercial, software, tef, ecf, mfd, frente de loja, retaguarda, consultoria, computador, impressoras fiscais, no-breaks, leitores, periféricos, equipamentos de informatica, microterminal, programas, ti, tecnologia de informação."/>
<meta name="robots" content="ALL"/>
<meta name="googlebot" content="INDEX, FOLLOW"/>
<meta name="distribution" content="Global"/>
<meta name="rating" content="General"/>
<meta name="copyright" content="Copyright 2006 - Lógica Digital"/>
<meta name="author" content="Lógica Digital"/>
<meta http-equiv="reply-to" content="root@gznet.com.br"/>
<meta http-equiv="Content-Language" content="pt-BR"/>
<meta name="target_country" content="br"/>
<meta name="country" content="Brazil"/>
<script type="text/javascript">

function validaform_inscrevase(){
    if(inscrevase.razao_social.value == ''){
    	alert("O campo RAZÃO SOCIAL deve ser preenchido.");
    	inscrevase.razao_social.focus();
    	return false;
    }
    if(inscrevase.cnpj.value == ''){
    	alert("O campo CNPJ deve ser preenchido.");
    	inscrevase.cnpj.focus();
    	return false;
    }
    var str_email = inscrevase.email.value ;
    if (( str_email.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) == -1 ) || ( str_email == 'Email:' )){
    	alert("O campo E-mail deve ser preenchido corretamente");
    	inscrevase.email.focus();
    	return false;
    }
    if(inscrevase.email.value.search(/^\w+((-\w+)|(\.\w+))*\@\w+((\.|-)\w+)*\.\w+$/) == -1){
   	alert("O campo E-MAIL deve ser preenchido corretamente");
   	inscrevase.email.focus();
   	return false;
    }
    if(inscrevase.qtd_participantes.value > 0){
    	for(cont=0; cont<document.getElementById('qtd_participantes').value; cont++){
    		if(document.getElementById('participante_'+cont).value == ''){
    			var n_posicao = (cont + 1);
    			alert("O campo NOME do "+n_posicao+"º PARTICIPANTE deve ser preenchido.");
    			document.getElementById('participante_'+cont).focus();
    			return false;
    		}
    		if(document.getElementById('cpf_'+cont).value == ''){
    			var c_posicao = (cont + 1);
    			alert("O campo "+c_posicao+"º CPF deve ser preenchido.");
    			document.getElementById('cpf_'+cont).focus();
    			return false;
    		}
    		if(document.getElementById('rg_'+cont).value == ''){
    			var r_posicao = (cont + 1);
    			alert("O campo "+r_posicao+"º RG deve ser preenchido.");
    			document.getElementById('rg_'+cont).focus();
    			return false;
    		}
    	}
    }
    else if((inscrevase.qtd_participantes.value > 0)&&(document.getElementById('participante_'+cont).value == '')){
    	alert("O campo NOME PARTICIPANTE deve ser preenchido.");
    	//document.getElementById('participante').focus();
    	return false;
    }
}
</script>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
  <tr>
    <td align="center" valign="top">
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="center" valign="top">
            <?php include("inc_topo.php"); ?>
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="775" height="586" align="center" valign="top"><br/>
                  <form name="inscrevase" id="inscrevase" action="inscrevase_obrigado.php?id=<?=$id;?>&amp;tipo=<?=$tipo;?>" method="post" onSubmit="return validaform_inscrevase(this)";>
                    <table width="470" border="0" cellspacing="0" cellpadding="0" class="interna">
                      <tr>
                        <div class="texto_geral"><p align="left" style="padding-left:25px;font: bold 15px Tahoma;">
                        <img src="imagens/img_seta.jpg"> Treinamento - Inscrição
                        </p></div><br/>
                      </tr>
                      <tr>
                        <td valign="top"><div align="right" class="texto_fomularios"><strong>Nome do Treinamento:</strong></div></td>
                        <td colspan="2"><p class="texto_geral"><?=$dados['nome'];?></p></td>
                      </tr>
                      <tr>
                        <td valign="top"><div align="right" class="texto_fomularios"><strong>Data/Horário:</strong></div></td>
                        <td colspan="2"><p class="texto_geral"><?=fun_tratamento_data($dados['datatreino'],'L');?></p></td>
                      </tr>
                      <tr>
                        <td valign="top"><div align="right" class="texto_fomularios"><strong>Razão Social:</strong></div></td>
                        <td colspan="2"><input name="razao_social" type="text" id="razao_social" size="35" maxlength="40"><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td valign="top"><div align="right" class="texto_fomularios"><strong>CNPJ:</strong></div></td>
                        <td colspan="2"><input name="cnpj" type="text" id="cnpj" size="35" onkeypress="jMascara(document.inscrevase,'cnpj','99.999.999/9999-99',event);return jCampoNumerico('inscrevase','cnpj',event);" maxlength="18"/><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td valign="top"><div align="right" class="texto_fomularios"><strong>E-mail:</strong></div></td>
                        <td colspan="2"><input name="email" type="text" id="email" size="35" maxlength="40"><font color="#3E4289"> *</font></td>
                      </tr>
                      <tr>
                        <td valign="top"><div align="right" class="texto_fomularios"><strong>Participantes:</strong></div></td>
                        <td bgcolor="#FFFFFF"><input type="text" name="qtd_participantes" id="qtd_participantes" value="" size="2" maxlength="2" onChange="abreAjax('participantes.php?<?php if($id != '') print 'id='.$id.'&';?>participantes='+document.inscrevase.qtd_participantes.value+'&rand='+Math.random(),'participantes');"/><a href="#" title="Adicionas Participantes" alt="Adicionar Participantes" onClick="abreAjax('participantes.php?<?php if($id != '') print 'id='.$id.'&';?>participantes='+document.inscrevase.qtd_participantes.value+'&rand='+Math.random(),'participantes')" style="font-size:12px;">Adicionar Participantes</a></td>
                      </tr>
                      <tr>
                        <td bgcolor="#FFFFFF">&nbsp;</td>
                        <td bgcolor="#FFFFFF"><div id="participantes"></div></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td colspan="2"><input type="submit" name="submit" value="Enviar" style="margin-left:100px;"></td>
                      </tr>
                    </table>
                  </form>
                </td>
              </tr>
            </table>
            <?php include("inc_rodape.php"); ?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>