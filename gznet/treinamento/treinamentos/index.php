<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />    
        <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="all"></link>
        <script type="text/javascript" src="../js/animatedcollapse.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/geral.js" type="text/javascript"></script>

        <script type="text/javascript">
            animatedcollapse.addDiv('legenda', 'fade=1')
            animatedcollapse.addDiv('legenda', 'fade=0,speed=500,group=pets')
            animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
            }

            animatedcollapse.init()
        </script>
        <title>GZ Sistemas - Treinamentos</title>
    </head>
    <body>
        <div id="posicao">
        <div id="aviso">
            <img src="../images/treinamento_ok.png" alt="Legenda" /><a class="links" style="text-decoration: none" href="javascript:animatedcollapse.toggle('legenda')"><font color="#ffffff"> Informações </font></a>
        </div>
        <div id="legenda">  
            <img src="../images/treinamento_ok.png" alt="Legenda" /> Curso disponível online: <a class="links" href="../../../elearning/index.php">Acesse</a><br />
            <img src="../images/img_info.png" alt="Legenda" /> Informações do Curso
        </div>
        </div>
        <script type="text/javascript">
            javascript:document.getElementById('legenda').style.display='none';
        </script>
        <div id="index">
            <div id="banner"><img src="../images/banner.jpg" alt="Treinamentos GZ Sistemas" /></div>

            <div id="menu">
                <ul>
                    <li><a href="../index.php"><img src="../images/img_seta.png" alt="seta" /> Início</a></li>
                    <li><a href="../agenda/index.php"><img src="../images/img_seta.png" alt="seta" /> Agenda</a></li>
                    <li><a href="#"><img src="../images/img_seta.png" alt="seta" /> Treinamentos</a></li>

                </ul>
            </div>
            <div id="corpo">
                <div id="tab_certificados">
                                                                                <?php
                                                                                $total=0;
                                                                                require '../db/conectdb.php';
                                                                                //Categoria 1
                                                                                echo "<p>";
                                                                                echo "1.Comportamental & Conceitos";
                                                                                echo "</p>";
                                                                                $resultado = mysql_query("SELECT substring(name,4,length(name)) as campo,infos,online,id FROM `courses` where directions_ID=1 AND active=1 order by name");
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $total=$total+$quant;
                                                                                $i=1;
                                                                                echo "<br />";
                                                                                while($i <= $quant) {
                                                                                    $cod = mysql_fetch_array($resultado);
                                                                                    echo "<span>";
                                                                                    $dado=$cod['infos'];
                                                                                    $nome=$cod['campo'];
                                                                                    $curso=$cod['id'];
                                                                                    echo "<img src='../images/img_info.png' onMouseOver='show$curso()' onMouseOut='hide1()'/>";
                                                                                    echo "<a class='cursor' onMouseOver='show$curso()' onMouseOut='hide1()'>$nome</a>";
                                                                                    //echo "<div id='$curso' class='info'>";
                                                                                    //echo "<b>";
                                                                                    //echo "$nome";
                                                                                    //echo "<br />";
                                                                                    //echo "</b>";
                                                                                    //echo "$dado";
                                                                                    //echo "</div>";
                                                                                    if($cod['online'] == '1') {
                                                                                        echo " <img src='../images/treinamento_ok.png' title='Disponível Online' alt='Online'/>";
                                                                                        }
                                                                                    echo "</span>";
                                                                                    $i=$i+1;
                                                                                }
                                                                                echo "<br />";
                                                                                //Categoria 2
                                                                                echo "<p>";
                                                                                echo "2.Instalação e Configuração";
                                                                                echo "</p>";
                                                                                echo "<br />";
                                                                                $resultado = mysql_query("SELECT substring(name,4,length(name)) as campo,online,infos,id FROM `courses` where directions_ID=2 AND active=1 order by name");
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $total=$total+$quant;
                                                                                $i=1;
                                                                                while($i <= $quant) {
                                                                                    $cod = mysql_fetch_array($resultado);
                                                                                    echo "<span>";
                                                                                    $dado=$cod['infos'];
                                                                                    $nome=$cod['campo'];
                                                                                    $curso=$cod['id'];
                                                                                    echo "<img src='../images/img_info.png' onMouseOver='show$curso()' onMouseOut='hide2()'/>";
                                                                                    echo "<a class='cursor' onMouseOver='show$curso()' onMouseOut='hide2()'>$nome</a>";
                                                                                    //echo "<div id='$curso' class='info'>";
                                                                                    //echo "<b>";
                                                                                    //echo "$nome";
                                                                                    //echo "<br />";
                                                                                    //echo "</b>";
                                                                                    //echo "$dado";
                                                                                    //echo "</div>";
                                                                                    if($cod['online'] == '1') {
                                                                                        echo " <img src='../images/treinamento_ok.png' title='Disponível Online' alt='Online'/>";
                                                                                        }
                                                                                    echo "</span>";
                                                                                    $i=$i+1;
                                                                                }
                                                                                echo "<br />";
                                                                                
                                                                                echo "<br />";
                                                                                //Categoria 3
                                                                                echo "<p>";
                                                                                echo "<b>3.Utilização dos Sistemas</b>";
                                                                                echo "</p>";
                                                                                echo "<br />";
                                                                                $resultado = mysql_query("SELECT substring(name,4,length(name)) as campo,online,infos,id FROM `courses` where directions_ID=4 AND active=1 order by name");
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $total=$total+$quant;
                                                                                $i=1;
                                                                                while($i <= $quant) {
                                                                                    $cod = mysql_fetch_array($resultado);
                                                                                    echo "<span>";
                                                                                    $dado=$cod['infos'];
                                                                                    $nome=$cod['campo'];
                                                                                    $curso=$cod['id'];
                                                                                    echo "<img src='../images/img_info.png' onMouseOver='show$curso()' onMouseOut='hide4()'/>";
                                                                                    echo "<a class='cursor' onMouseOver='show$curso()' onMouseOut='hide4()'>$nome</a>";
                                                                                    //echo "<div id='$curso' class='info'>";
                                                                                    //echo "<b>";
                                                                                    //echo "$nome";
                                                                                    //echo "<br />";
                                                                                    //echo "</b>";
                                                                                    //echo "$dado";
                                                                                    //echo "</div>";
                                                                                    if($cod['online'] == '1') {
                                                                                        echo " <img src='../images/treinamento_ok.png' title='Disponível Online' alt='Online'/>";
                                                                                        }
                                                                                    echo "</span>";
                                                                                    $i=$i+1;
                                                                                }
                                                                                echo "<br />";
                                                                                //Categoria 4
echo "<p>";
                                                                                echo "<b>4.Comercial</b>";
                                                                                echo "</p>";
                                                                                echo "<br />";
                                                                                $resultado = mysql_query("SELECT substring(name,4,length(name)) as campo,online,infos,id FROM `courses` where directions_ID=6 AND active=1 order by name");
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $total=$total+$quant;
                                                                                $i=1;
                                                                                while($i <= $quant) {
                                                                                    $cod = mysql_fetch_array($resultado);
                                                                                    echo "<span>";
                                                                                    $dado=$cod['infos'];
                                                                                    $nome=$cod['campo'];
                                                                                    $curso=$cod['id'];
                                                                                    echo "<img src='../images/img_info.png' onMouseOver='show$curso()' onMouseOut='hide5()'/>";
                                                                                    echo "<a class='cursor' onMouseOver='show$curso()' onMouseOut='hide5()'>$nome</a>";
                                                                                    //echo "<div id='$curso' class='info'>";
                                                                                    //echo "<b>";
                                                                                    //echo "$nome";
                                                                                    //echo "<br />";
                                                                                    //echo "</b>";
                                                                                    //echo "$dado";
                                                                                    //echo "</div>";
                                                                                    if($cod['online'] == '1') {
                                                                                        echo " <img src='../images/treinamento_ok.png' title='Dispon�vel Online' alt='Online'/>";
                                                                                        }
                                                                                    echo "</span>";
                                                                                    $i=$i+1;
                                                                                }
                                                                                echo "<br />";
                                                                                $resultado = mysql_query("SELECT active FROM `courses` where active=1 and online=1");
                                                                                $quant2 = mysql_num_rows($resultado);
                                                                                $valor =  ($quant2 / $total) * 100;
                                                                                echo "$quant2/$total - ";
                                                                                echo number_format($valor, 0, ',', '.');
                                                                                echo "% de treinamentos ONLINE";
                                                                                ?>
                    </div>
                </div>
            <div id="rodape">Todos os direitos reservados à GZ Sistemas - <a href="http://www.gzsistemas.com.br"><b>www.gzsistemas.com.br</b></a></div>

        </div>
    </body>
</html>