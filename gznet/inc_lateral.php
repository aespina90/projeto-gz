
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