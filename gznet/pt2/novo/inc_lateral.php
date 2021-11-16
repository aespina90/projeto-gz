<br/>
<table width="221" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="270" colspan="3" class="bg_fundo_newsletter">
      <form name="area_restrita" id="area_restrita" action="login.php" method="post" onSubmit="return validaform_area_restrita();">
        <table width="156" height="55" border="0" cellpadding="0" cellspacing="0" style="margin:45px 0 0 60px;">
          <tr>
            <td height="21" colspan="2"><input name="login" id="login" type="text" class="texto_area_restrita" size="22" maxlength="20"></td>
          </tr>
          <tr>
            <td height="34" colspan="2"><input name="senha" id="senha" type="password" class="texto_area_restrita" size="22" maxlength="10"></td>
          </tr>
        </table>
        <table width="201" border="0" cellpadding="0" cellspacing="0" style="margin:5px 0 0 8px;">
          <tr>
            <td width="185">
              <div class="texto_area_restrita">
                <img src="imagens/img_seta.jpg"> <strong><a href="#" onClick="if(verificaLogin(this,event)){ window.location.href='esqueci_minha_senha.php?login='+document.area_restrita.login.value; return false; }else{ return false };">Esqueceu a senha?</a></strong><br>
                <img src="imagens/img_seta.jpg"> <strong><a href="#" onClick="window.location.href='fale_conosco.php';">Solicitar nova senha</a></strong>
              </div>
            </td>
            <td width="46"><input name="enviar" type="image" src="imagens/btn_enviar.jpg"></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
<table width="235" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="231" height="157"><img src="imagens/img_telefones.jpg"></td>
  </tr>
  <tr>
    <td height="125">
      <div style="margin-left:33px;"><a href="revendas.php"><img src="imagens/img_revendas_trabalhe.jpg" border="0"></a></div>
      <div class="texto_servicos" align="center"><strong><a href="seja_revendedor.php">Seja um revendedor GZ Sistemas</a></strong></div>
    </td>
  </tr>
  <tr>
    <td height="152">
      <div style="margin-left:14px;"><a href="http://www.gzsistemas.com.br/novo/noticias_interno.php?id=74&amp;id_secao=1"><img src="imagens/impressora.jpg" border="0"></a><br/>
        <a href="http://www.gzsistemas.com.br/treinamento/index.php"><center><img src="imagens/certificado.jpg" width="113" height="107" border="0"></center></a>
      <img src="imagens/img_linha_horizontal_pq.jpg"></div>
    </td>
  </tr>
</table>