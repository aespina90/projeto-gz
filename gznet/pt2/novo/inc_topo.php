<script language="JavaScript">
function mostra(campo){
    document.getElementById(campo).style.display='' ;
}
function oculta(campo){
    document.getElementById(campo).style.display='none' ;
}
</script>

<table width="775" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <script language="JavaScript" src="flash.js"></script>
      <script type="text/javascript">SWF();</script>
    </td>
  </tr>
  <tr>
    <td valign="top" class="menu">
      <table width="775" border="0" cellspacing="0" cellpadding="0">
        <tr class="bg_menu">
          <td valign="top" onMouseOver="mostra('empresa')" onMouseOut="oculta('empresa')">
           <img src="imagens/novobnt/botoes_01.gif" onMouseOver="this.src='imagens/novobnt/botoes_01m.gif'"onMouseOut="this.src='imagens/novobnt/botoes_01.gif'">          </td>
           
          <td valign="top" onMouseOver="mostra('softwares')"  onMouseOut="oculta('softwares')">
            <img src="imagens/novobnt/botoes_03.gif" border="0" onMouseOver="this.src='imagens/novobnt/botoes_03m.gif'"onMouseOut="this.src='imagens/novobnt/botoes_03.gif'">          </td>
          
          <td valign="top" onMouseOver="mostra('servicos')"  onMouseOut="oculta('servicos')">
            <a href="servicos.php">
               <img src="imagens/novobnt/botoes_05.gif" border="0" onMouseOver="this.src='imagens/novobnt/botoes_05m.gif'"onMouseOut="this.src='imagens/novobnt/botoes_05.gif'">              </a>           </td>
           
          <td valign="top">
            <a href="revendas.php">
               <img src="imagens/novobnt/botoes_07.gif" border="0" onMouseOver="this.src='imagens/novobnt/botoes_07m.gif'"onMouseOut="this.src='imagens/novobnt/botoes_07.gif'">            </a>          </td>
          
          <td valign="top">
            <a href="parceiros.php">
               <img src="imagens/novobnt/botoes_09.gif" border="0" onmouseover="this.src='imagens/novobnt/botoes_09m.gif'"onmouseout="this.src='imagens/novobnt/botoes_09.gif'" />            </a>         </td>
         
          <td valign="top">
            <a href="noticias.php">
               <img src="imagens/novobnt/botoes_11.gif" border="0" onMouseOver="this.src='imagens/novobnt/botoes_11m.gif'"onMouseOut="this.src='imagens/novobnt/botoes_11.gif'">           </a>        </td>
        
          <td valign="top" onMouseOver="mostra('contato')"  onMouseOut="oculta('contato')">
            <img src="imagens/novobnt/botoes_13.jpg" border="0" onMouseOver="this.src='imagens/novobnt/botoes_13m.jpg'"onMouseOut="this.src='imagens/novobnt/botoes_13.jpg'">        </td>
        </tr>
        <tr>
          <td colspan="9">
            <table width="775" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="79" valign="top">
                 <div id="empresa" style="display:none;" class="submenu" onMouseOver="mostra('empresa')"  onMouseOut="oculta('empresa')">
                    <div>
                      <a href="historico.php"><img src="imagens/novobnt/img_historico.jpg" border="0"></a>
                    </div>
                    
                    <div>
                     <a href="tradicao.php"><img src="imagens/novobnt/img_tradicao.jpg"  border="0"></a>
                    </div>
                </div>
                 </td>
                 
                <td width="80" valign="top">
                  <div id="softwares" style="display:none; margin-left:20px;" class="submenu"  onMouseOver="mostra('softwares')"  onMouseOut="oculta('softwares')">
                    <div>
                     <a href="mercosuper.php"><img src="imagens/novobnt/img_mercosuper.jpg" border="0" onMouseOver="mostra('sub_softwares')"  onMouseOut="oculta('sub_softwares')"></a>
                    </div>
                    
                    <div>
                      <a href="mercoflex.php"><img src="imagens/novobnt/img_mercoflex.jpg" border="0"  onMouseOver="mostra('sub_softwares2')"  onMouseOut="oculta('sub_softwares2')"></a>                    
                    </div>
                    
                    <div>
                    <a href="gztef.php"><img src="imagens/novobnt/img_gztef.jpg" border="0"    onMouseOver="mostra('sub_softwares3')"  onMouseOut="oculta('sub_softwares3')"></a>                    
                    </div>
                    
                    <div>
                    <a href="mercobi.php"><img src="imagens/novobnt/img_mercobi.jpg" border="0"    onMouseOver="mostra('sub_softwares4')"  onMouseOut="oculta('sub_softwares4')"></a>                    
                    </div>
                    
                    <div>
                    <a href="gzcontabil.php"><img src="imagens/novobnt/img_gzcontabil.jpg" border="0"    onMouseOver="mostra('sub_softwares5')"  onMouseOut="oculta('sub_softwares5')"></a>                    
                    </div>
                    
                    <div>
                    <a href="gzcrm.php"><img src="imagens/novobnt/img_gzcrm.jpg" border="0"    onMouseOver="mostra('sub_softwares6')"  onMouseOut="oculta('sub_softwares6')"></a>                    
                    </div>
                    
                    <div>
                    <a href="flextotem.php"><img src="imagens/novobnt/img_flextotem.jpg" border="0"    onMouseOver="mostra('sub_softwares7')"  onMouseOut="oculta('sub_softwares7')"></a>                    
                    </div>
                  </div>                
                  </td>
                <div id="sub_softwares" style="display:none;margin:0 0 0 158px;" class="submenu"  onMouseOver="mostra('sub_softwares');mostra('softwares')"  onMouseOut="oculta('sub_softwares');oculta('softwares')">
                  <!--<div><a href="frente_loja_mercosuper.php"><img src="imagens/botoes/img_softwares_loja.jpg" border="0"></a></div> -->
                  <!--<div><a href="retaguarda_mercosuper.php"><img src="imagens/botoes/img_softwares_retaguarda.jpg" border="0"></a></div> -->
                  <!--<div><a href="mod_financeiro.php"><img src="imagens/botoes/img_softwares_financeiro.jpg" border="0"></a></div> -->
                  <!--<div><a href="mod_prevenda.php"><img src="imagens/botoes/img_softwares_venda.jpg" border="0"></a></div> -->
                  <!--<div><a href="mod_comunicacao.php"><img src="imagens/botoes/img_softwares_comunica.jpg" border="0"></a></div> -->
                </div>
                <div id="sub_softwares2" style="display:none;margin:28px 0 0 158px;" class="submenu"  onMouseOver="mostra('sub_softwares2');mostra('softwares')"  onMouseOut="oculta('sub_softwares2');oculta('softwares')">
                  <!--<div><a href="frente_loja_mercoflex.php"><img src="imagens/botoes/img_softwares_loja.jpg" border="0"></a></div> -->
                  <!--<div><a href="retaguarda_mercoflex.php"><img src="imagens/botoes/img_softwares_retaguarda.jpg" border="0"></a></div> -->
                  <!--<div><a href="concentrador_mercoflex.php"><img src="imagens/botoes/img_softwares_concentrador.jpg" border="0"></a></div> -->
                </div>
             
                
                <td width="101" valign="top">
                  <div id="servicos" style="display:none; margin-left:49px;" class="submenu"  onMouseOver="mostra('servicos')"  onMouseOut="oculta('servicos')">
                    <div>
                      <a href="implantacao.php"><img src="imagens/novobnt/img_servicos.jpg" border="0"></a>                    
                    </div>
                    
                    <div>
                      <a href="consultoria.php"><img src="imagens/novobnt/img_consultoria.jpg" border="0"></a>
                    </div>
                    
                    <div>
                      <a href="http://www.gzsistemas.com.br/treinamento/index.php"><img src="imagens/novobnt/img_treinamento.jpg" border="0"></a>
                    </div>
                    
                    <div>
                      <a href="service.php"><img src="imagens/novobnt/img_service.jpg" border="0"></a>
                    </div>
                  </div>
                  </td>
                <td width="331"></td>
                  <!------>
                  <td width="91" valign="top">
                  <div id="contato" style="display:none; margin-left:-5px;" class="submenu" onMouseOver="mostra('contato')"  onMouseOut="oculta('contato')">
                    <div>
                      <a href="fale_conosco.php"><img src="imagens/novobnt/img_faleconosco.jpg"  border="0"></a>
                    </div>
                    
                    <div>
                     <a href="como_chegar.php"><img src="imagens/novobnt/img_localizacao.jpg"  border="0"></a>
                    </div>
                    
                    <div>
                     <a href="trabalhe_conosco.php"><img src="imagens/novobnt/img_trabalheconosco.jpg"  border="0"></a>
                    </div>
                </div>
                  </td>
              </tr>
            </table>
            </td>
        </tr>
      </table>
    </td>
  </tr>
</table>