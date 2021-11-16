<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../css/estilo.css" type="text/css" media="all"></link>
        <script type="text/javascript" src="../js/animatedcollapse.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            animatedcollapse.addDiv('legenda', 'fade=1')
            animatedcollapse.addDiv('legenda', 'fade=0,speed=500,group=pets')
            animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
            }

            animatedcollapse.init()
        </script>
        <title>GZ Sistemas - Treinamentos</title>
    </head>
    <body id="body2">
        <div id="tab_certificados">
                                                                                <?php
                                                                                function alert($aviso) {echo "<script>alert('".$aviso."');</script>";}
                                                                                $dado1 = $_GET['info'];
                                                                                $nome1 =  $_GET['nome'];
                                                                                echo "<p>";
                                                                                echo $nome1;
                                                                                echo "</p>";
                                                                                echo "<span id='conteudo'>";
                                                                                echo $dado1;
                                                                                echo "</span>";
                                                                                ?>
        </div>
    </body>
</html>
