<?php
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$acessos[0] = $_SESSION['mural'];
$acessos[1] = $_SESSION['treinamento'];
$acessos[2] = $_SESSION['avaliacao'];
$acessos[3] = $_SESSION['senhas'];
$acessos[4] = $_SESSION['controle'];
$usuario = strtoupper($usuario);
?>
<html>
    <head>
        <script src="http://www.gznet.com.br/portal/js/jquery.min.js" type="text/javascript"></script>
        <script src="http://www.gznet.com.br/portal/js/geral.js" type="text/javascript"></script>
    </head>
    <body>
        <ul id="jsddm">
            <?php
            if($acessos[0]==1 || $acessos[0]==2){
            echo'
            <li><a href="http://www.gznet.com.br/portal/intranet/home/index.php"><img src="http://www.gznet.com.br/portal/images/img_seta.png"></img> Início</a><ul>';
                    if($acessos[0]==2){
                        echo '<li><a href="http://www.gznet.com.br/portal/intranet/home/revista.php">Revista</a></li>';
                    }
              echo'      </ul>
            </li>
            ';}
            if($acessos[1]==1){
            echo'
            <li><a href="#"><img src="http://www.gznet.com.br/portal/images/img_seta.png"></img> Treinamento</a>
                <ul>
                    <li><a href="#"> Agenda</a></li>
                    <li><a href="#"> Matrículas</a></li>
                </ul>
            </li>
            ';}
            if($acessos[2]==1 || $acessos[2]==2 || $acessos[2]==21 || $acessos[2]==3){
            echo '
            <li><a href="#"><img src="http://www.gznet.com.br/portal/images/img_seta.png"></img> Avaliações</a>
                <ul>
                    <li><a href="http://www.gznet.com.br/portal/intranet/avaliacao/testes/index.php">Testes</a></li>';
                    if($acessos[2]==2 || $acessos[2] == 21){
                    echo '
                        <li><a href="http://www.gznet.com.br/portal/intranet/avaliacao/relatorios/index.php">Relatórios</a></li>
                        ';}
                    if($acessos[2]==3){
                    echo '
                        <li><a href="http://www.gznet.com.br/portal/intranet/avaliacao/relatorios/index.php">Relatórios</a></li>
                        <li><a href="http://www.gznet.com.br/portal/intranet/avaliacao/prova/avaliacao.php">Controle</a></li>
                        ';}
               echo'
                    </ul>
                    </li>';
            }
            if($acessos[3]==1 || $acessos[3]==2){
            echo'
            <li><a href="#"><img src="http://www.gznet.com.br/portal/images/img_seta.png"></img> Senhas</a>
                <ul>
                    <li><a href="http://www.gznet.com.br/portal/intranet/senhas/relatorio.php">Relatórios</a></li>';
                    if($acessos[3]==2){
                        echo '<li><a href="http://www.gznet.com.br/portal/intranet/senhas/controle.php">Controle</a></li>';
                    }
              echo'      </ul>
            </li>
            ';}
            if($acessos[4]==1 || $acessos[4]==2){
            echo'
            <li><a href="#"><img src="http://www.gznet.com.br/portal/images/img_seta.png"></img> Controle</a>
                <ul>
                    <li><a href="http://www.gznet.com.br/portal/intranet/controle/horaspj.php">Horas P.J.</a></li>';
                    if($acessos[3]==2){
                        echo '<li><a href="http://www.gznet.com.br/portal/intranet/controle/validahoraspj.php">Validar Horas P.J.</a></li>';
                    }
              echo'      </ul>
            </li>
            ';}
            ?>
        </ul>
        <?php
        echo "<div class='user'>. .<a href='http://www.gznet.com.br/portal/intranet/logout.php'><b>[sair]</b></a></div>";
        echo "<div class='user'><b>Usuário: {$usuario}</b></div>";
        echo "</ul>";
        ?>

    </body>
</html>