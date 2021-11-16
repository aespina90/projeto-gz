<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />        
        <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="all"></link>
        <title>GZ Sistemas - Treinamentos</title>
    </head>
    <body>
        <div id="index">
            <div id="banner"><img src="../images/banner.jpg" alt="Treinamentos GZ Sistemas" /></div>
            <div id="menu">
                <ul>
                    <li><a href="../index.php"><img src="../images/img_seta.png" alt="seta" /> Início</a></li>
                    <li><a href="#"><img src="../images/img_seta.png" alt="seta" /> Agenda</a></li>
                    <li><a href="../treinamentos/index.php"><img src="../images/img_seta.png" alt="seta" /> Treinamentos</a></li>
                </ul>
            </div>
            <div id="corpo">
                <div id="tabela_treinamentos">
                <p class="aviso"><b>Agenda de treinamenos GZ Sistemas</b></p>

                    <p><span class="col1"> Treinamento </span>
                       <span class="col2"> Local </span>
                       <span class="col3"> Início </span>
                       <span class="col4"> Término </span>
                       <span class="col5"> Vagas </span>
                    </p>
                    <?php
					$limite = date("md");
             
                                                                                require '../db/conectdb.php';
                                                                                $resultado = mysql_query("SELECT * FROM tbl_treinamento where ativo=1 and data_limite>".$limite);
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $i=1;
                                                                                while($i <= $quant) {
                                                                                echo "<p>";
                                                                                    $cod = mysql_fetch_array($resultado);
                                                                                //Treinamento
                                                                                    echo "<span class='dadocol1'>";
                                                                                    echo substr($cod['nome'],5);
                                                                                    echo "</span>";
                                                                                //Local
                                                                                    echo "<span class='dadocol2'>";
                                                                                    echo $cod['local'];
                                                                                    echo "</span>";
                                                                                //Data
                                                                                    echo "<span class='dadocol3'>";
                                                                                    echo $cod['data_inicio'];
                                                                                    echo "</span>";
                                                                                //Hora
                                                                                    echo "<span class='dadocol4'>";
                                                                                    echo $cod['data_fim'];
                                                                                    echo "</span>";
                                                                                //Data
                                                                                    echo "<span class='dadocol5'>";
                                                                                    $valor = $cod['n_inscritos'];
                                                                                    echo 10 - $valor;
                                                                                    echo "</span>";
                                                                                    echo "</p>";
                                                                                    $i=$i+1;
                                                                                }
                                                                                ?>

                    <p class="aviso"><b>Avisos Importantes<br /></b></p>
                                                                                <?php
                                                                                                                                                               
                                                                                    echo "<ul>";
                                                                                    require '../db/conectdb.php';
                                                                                    $result = mysql_query("SELECT * FROM tbl_portal_avisos");
                                                                                    while($row = mysql_fetch_array($result)) {
                                                                                    echo "<li>";
                                                                                    echo $row['aviso'];
                                                                                    echo ";";
                                                                                    echo "</li>";
                                                                                    }
                                                                                    echo "</ul>";

					                                                                                    
                                                                                ?>
                </div> <!-- eof #table -->
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