<?php
	//Iniciando Sessão
	session_start();
?>
<table width="340" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr> 
    <td bgcolor="#990000"><font color="#FFFFFF" size="2" face="Trebuchet MS"><strong>Acesso negado!</strong></font></td>
  </tr>
  <tr> 
    <td background="../imagens/bg_erro.gif" bgcolor="#FFFFFF"> 
      <p><font color="#333333" size="2" face="Trebuchet MS">Desculpe <strong><?php echo $_SESSION['usuario']?></strong>, 
        mas voc&ecirc; n&atilde;o tem permiss&atilde;o para executar esta a&ccedil;&atilde;o 
        ou acessar este m&oacute;dulo. Contate o administrador do sistema.</font></p>
      <p><font color="#333333" size="2" face="Trebuchet MS">Obrigado.</font></p></td>
  </tr>
</table>
<p align="center"><font color="#333333" size="2" face="Trebuchet MS"><a href="javascript:history.back();">Voltar</a></font></p>

