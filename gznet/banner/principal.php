<?php 
  include("topo.php"); 
  include("verifica.php");
?>

<style type="text/css">
<!--
.style1 {font-size: 12; color:#333}
.style2 {
	font-size: 14px;
	color: #333;
	font-family:Arial, Helvetica, sans-serif;
}
.style3 {
	color: #990000;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
<table style="border: 1px solid #CCCCCC; margin-top: 12px; height: 500px" width="900" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top">
    <form action="Upbanner.php?idBannser=<?php echo $_GET['idBannser']; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="27" valign="top" class="style2">Selecione um banner para alter&aacute;-lo</td>
        </tr>
        <tr>
          <td valign="top">
            <?php 
			   $sql = mysql_query("select * from banner order by id asc"); 
			    while($row = mysql_fetch_assoc($sql)):
		    ?>
                   <a href="principal.php?idBannser=<?php echo $row['id']; ?>" style="text-decoration:none">   
                      <img src="../uploads/<?php echo $row['imagem']; ?>" width="216" height="227" style="margin-right:6px; margin-bottom:6px; border:1px solid #333" border="0" />
                   </a>
            <?php endwhile;?>
          </td>
        </tr>
        <tr>
          <td valign="top" style="padding-top:15px;">
            <?php 
			    if(isset($_GET['idBannser'])): 
		        
				switch($_GET['idBannser']){
					
					case "1": echo "<span class='style2'>Voc&ecirc; ira alterar o primeiro banner.</span>"; break;
					case "2": echo "<span class='style2'>Voc&ecirc; ira alterar o segundo banner.</span>"; break;
					case "3": echo "<span class='style2'>Voc&ecirc; ira alterar o ter&ccedil;eiro banner.</span>"; break;
					
					}
			 ?>
             <br />
             <br />
             <span class="style2">Escolha uma imagam</span>:<br />
             <input type="file" name="arquivo" id="arquivo" /><br />
             <span class="style2">Tamanho para o banner &eacute; de 216 x 227 px</span><br /><br />
             <span class="style2">Link</span>:<br />
             <input name="link" id="link" type="text" style="width:300px;" /><br />
             <input type="submit" name="enviar" id="enviar" value="Enviar" />
            
            <?php endif; ?>
          </td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>

<?php
include ("rodape.php");
?>