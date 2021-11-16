<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />        
        <link rel="stylesheet" href="css/estilo.css" type="text/css" media="all"></link>
        
        <link href="themes/redmond/jquery.ui.all.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#tabs").tabs();
            });
        </script>

        <title>GZ Sistemas - Treinamentos</title>
    </head>
    <body>
        <div id="index">
            <div id="banner"><img src="images/banner.jpg" alt="Treinamentos GZ Sistemas" /></div>
            <div id="menu">
                <ul>
                    <li><a href="#"><img src="images/img_seta.png" alt="seta" /> Início</a></li>
                    <li><a href="agenda/index.php"><img src="images/img_seta.png" alt="seta" /> Agenda</a></li>
                    <li><a href="treinamentos/index.php"><img src="images/img_seta.png" alt="seta" /> Treinamentos</a></li>
                </ul>
            </div>
            <div id="corpo">
                <div id="tabs">
                    <ul>
                        <li><a href="#aba-1"><span>Introdução</span></a></li>
                        <li><a href="#aba-2"><span>1 - Treinamento Online</span></a></li>
                        <li><a href="#aba-3"><span>2 - Área Restrita</span></a></li>
                        <li><a href="#aba-4"><span>3 - Terminal Server</span></a></li>
                    </ul>
                    <div id="aba-1">
                        <div id="intro">
                        <object type="application/x-shockwave-flash" data="videos/portal_treinamentos.swf" width="500" height="407" border="1">
                            <param name="movie" value="videos/portal_treinamentos.swf" />
                        </object>
                        </div>
                         <div id="elearning">
                        <a href="../../elearning/index.php"><img src="images/img_treinamento.jpg" alt="Treinamento Online" title="Entre agora!" /></a>
                        </div>
                        <div id="lista_treinamentos">
                            
                            <p>
                                <span class="col1"> Agenda Treinamentos <a class="links" href="agenda/index.php">(ver +)</a></span>
                                <span class="col2"> Data </span>
                            </p>
                                                                                <?php
																				$limite = date("md");
                                                                                require 'db/conectdb.php';
                                                                                $resultado = mysql_query("SELECT substring(nome,5,30) as treinamento,data_inicio,data_limite,ativo FROM tbl_treinamento where ativo=1 and data_limite>".$limite);
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $i=1;
                                                                                while($i <= $quant) {
                                                                                echo "<p>";
                                                                                    $cod = mysql_fetch_array($resultado);
                                                                                //Treinamento
                                                                                    echo "<span class='dadocol1'>";
                                                                                    echo $cod['treinamento'];
                                                                                    echo "...";
                                                                                    echo "</span>";
                                                                                //Data
                                                                                    echo "<span class='dadocol2'>";
                                                                                    echo $cod['data_inicio'];
                                                                                    echo "</span>";
                                                                                    echo "</p>";
                                                                                    $i=$i+1;
                                                                                }
                                                                                ?>
                        </div>
                    </div>
                    <div id="aba-2">
                        <object type="application/x-shockwave-flash" data="videos/treinamento_online.swf" width="640" height="480" border="1">
                            <param name="movie" value="videos/treinamento_online.swf" />
                        </object>
                    </div>
                    <div id="aba-3">
                        <object type="application/x-shockwave-flash" data="videos/area_restrita.swf" width="640" height="480" border="1">
                            <param name="movie" value="videos/area_restrita.swf" />
                        </object>
                    </div>
                    <div id="aba-4">
                        <object type="application/x-shockwave-flash" data="videos/terminalserver.swf" width="640" height="480" border="1">
                            <param name="movie" value="videos/terminalserver.swf" />
                        </object>
                    </div>
                </div>

                </div>
            <div id="rodape">Todos os direitos reservados à GZ Sistemas - <a href="http://www.gzsistemas.com.br"><b>www.gzsistemas.com.br</b></a></div>
                    <div id="w3c">
            <p>
                <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
            </p>
        </div>
        </div>
    </body>
</html>
