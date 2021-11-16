<?php
session_start();
$_SESSION['menu'] = 'avaliacao';
$_SESSION['licao'] = 'testes';

include('../../../classes/valida_perm.inc');
include('../../../classes/valida_cookies.inc');
include('../../../classes/connect.class.php');

$conexao = new CONEXAO();
$conexao->Conecta();

//PEGA DADOS DO DIRECTION ID 1
$num_provas = $conexao->consulta("SELECT count(*) FROM aval_provas where id_course = 1");
$n_provas1 = mysql_fetch_row($num_provas);

$provas_nomes = $conexao->consulta("SELECT id, name, lesson_id from aval_provas where id_course = 1 order by name");

for ($i = 0; $i < $n_provas1[0]; $i++) {
    $provas1[$i] = mysql_fetch_array($provas_nomes);
}


//PEGA DADOS DO DIRECTION ID 2
$num_provas = $conexao->consulta("SELECT count(*) FROM aval_provas where id_course = 2");
$n_provas2 = mysql_fetch_row($num_provas);

$provas_nomes = $conexao->consulta("SELECT id, name, lesson_id from aval_provas where id_course = 2 order by name");

for ($i = 0; $i < $n_provas2[0]; $i++) {
    $provas2[$i] = mysql_fetch_array($provas_nomes);
}


//PEGA DADOS DO DIRECTION ID 4
$num_provas = $conexao->consulta("SELECT count(*) FROM aval_provas where id_course = 4");
$n_provas3 = mysql_fetch_row($num_provas);

$provas_nomes = $conexao->consulta("SELECT id, name, lesson_id from aval_provas where id_course = 4 order by name");

for ($i = 0; $i < $n_provas3[0]; $i++) {
    $provas3[$i] = mysql_fetch_array($provas_nomes);
}

//PEGA DADOS DO DIRECTION ID 6
$num_provas = $conexao->consulta("SELECT count(*) FROM aval_provas where id_course = 6");
$n_provas4 = mysql_fetch_row($num_provas);

$provas_nomes = $conexao->consulta("SELECT id, name, lesson_id from aval_provas where id_course = 6 order by name");

for ($i = 0; $i < $n_provas4[0]; $i++) {
    $provas4[$i] = mysql_fetch_array($provas_nomes);
}

$licao_c_num = mysql_num_rows($licao_c);

$num_provas_feitas = $conexao->consulta("SELECT count(*) FROM aval_resumo where user = '$usuario'");
$n_provas_feitas = mysql_fetch_row($num_provas_feitas);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$acessos[0] = $_SESSION['mural'];
$acessos[1] = $_SESSION['treinamento'];
$acessos[2] = $_SESSION['avaliacao'];
$acessos[3] = $_SESSION['senhas'];
$usuario = strtoupper($usuario);
?>
<html xml:lang="pt-BR" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="../../../css/estilo.css" type="text/css" media="all"></link>
        <script src="http://www.gznet.com.br/portal/js/geral.js" type="text/javascript"></script>
        <title>GZ Net - Testes</title>
    </head>
    <body>
        <div id="index">
            <div id="banner"><img src="../../../images/banner_intranet.jpg" alt="Treinamentos GZ Sistemas" /></div>
            <div id="menu">
                <?php
                include '../../inc_menu.php';
                ?>
                <div class="clear"></div>
            </div>
            <div id="corpo">
                <?
                //CATEGORIA 1
                echo "<p id='ttl_testes'><a onclick=\"javascript: exibe('box_prova1');\">[+] Comportamental e Conceitos</a></p>";
                echo '<br />';
                echo '<div id="box_prova1">';
                for ($i = 0; $i < $n_provas1[0]; $i++) {
                    $p_feitas = $conexao->consulta("select completed from users_to_lessons where lessons_id = {$provas1[$i][2]} and users_LOGIN = '$usuario'");
                    $p_f = mysql_fetch_row($p_feitas);
                    echo "<div id='lst_teste'> {$provas1[$i][1]}";
                    if($p_f[0] == 1){


                    $p_term = $conexao->consulta("SELECT nota FROM aval_resumo WHERE user = '$usuario' AND id_prova = {$provas1[$i][0]}");
                    $p_t = mysql_fetch_row($p_term);

                        if(!$p_t[0]){
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok5.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a href=\"javascript:abrir3('avaliacao.php?id={$provas1[$i][0]}')\"><img src='../../../images/iniciar_prova.jpg'></a>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/i4.jpg'></a>";
                                echo "</div>";

                        }else{
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok3.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/prova_ok.jpg'></a>";
                                echo "<a href=\"javascript:abrir2('info.php?cod=2&id={$provas1[$i][0]}')\"><img src='../../../images/i3.jpg'></a>";
                            echo "</div>";
                        }

                    }else{
                         echo "<div id='status_testes'>";
                            echo "<img src='../../../images/ok4.jpg'>";
                         echo "</div>";
                         echo "<div id='infos_testes'>";
                            echo "<a href=\"javascript:abrir2('info.php?cod=1')\"><img src='../../../images/i3.jpg'></a>";
                         echo "</div>";
                    }

                     echo "</div>";
                }
                echo '<br>';
                echo '</div>';


                //CATEGORIA 2
                echo "<p id='ttl_testes'><a onclick=\"javascript: exibe('box_prova2');\">[+]Instalação e Configuração</a></p>";
                echo '<br />';
                echo '<div id="box_prova2">';
                for ($i = 0; $i < $n_provas2[0]; $i++) {
                    $p_feitas = $conexao->consulta("select completed from users_to_lessons where lessons_id = {$provas2[$i][2]} and users_LOGIN = '$usuario'");
                    $p_f = mysql_fetch_row($p_feitas);
                    echo "<div id='lst_teste'> {$provas2[$i][1]}";
                    if($p_f[0] == 1){


                    $p_term = $conexao->consulta("SELECT nota FROM aval_resumo WHERE user = '$usuario' AND id_prova = {$provas2[$i][0]}");
                    $p_t = mysql_fetch_row($p_term);

                        if(!$p_t[0]){
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok5.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a href=\"javascript:abrir3('avaliacao.php?id={$provas2[$i][0]}')\"><img src='../../../images/iniciar_prova.jpg'></a>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/i4.jpg'></a>";
                                echo "</div>";

                        }else{
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok3.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/prova_ok.jpg'></a>";
                                echo "<a href=\"javascript:abrir2('info.php?cod=2&id={$provas2[$i][0]}')\"><img src='../../../images/i3.jpg'></a>";
                            echo "</div>";
                        }

                    }else{
                         echo "<div id='status_testes'>";
                            echo "<img src='../../../images/ok4.jpg'>";
                         echo "</div>";
                         echo "<div id='infos_testes'>";
                            echo "<a href=\"javascript:abrir2('info.php?cod=1')\"><img src='../../../images/i3.jpg'></a>";
                         echo "</div>";
                    }

                     echo "</div>";
                }
                echo '<br>';
                echo '</div>';


                //CATEGORIA 3
                echo "<p id='ttl_testes'><a onclick=\"javascript: exibe('box_prova3');\">[+] Utilização dos Sistemas</a></p>";
                echo '<br />';
                echo '<div id="box_prova3">';
                for ($i = 0; $i < $n_provas3[0]; $i++) {
                    $p_feitas = $conexao->consulta("select completed from users_to_lessons where lessons_id = {$provas3[$i][2]} and users_LOGIN = '$usuario'");
                    $p_f = mysql_fetch_row($p_feitas);
                    echo "<div id='lst_teste'> {$provas3[$i][1]}";
                    if($p_f[0] == 1){


                    $p_term = $conexao->consulta("SELECT nota FROM aval_resumo WHERE user = '$usuario' AND id_prova = {$provas3[$i][0]}");
                    $p_t = mysql_fetch_row($p_term);

                        if(!$p_t[0]){
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok5.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a href=\"javascript:abrir3('avaliacao.php?id={$provas3[$i][0]}')\"><img src='../../../images/iniciar_prova.jpg'></a>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/i4.jpg'></a>";
                                echo "</div>";

                        }else{
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok3.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/prova_ok.jpg'></a>";
                                echo "<a href=\"javascript:abrir2('info.php?cod=2&id={$provas3[$i][0]}')\"><img src='../../../images/i3.jpg'></a>";
                            echo "</div>";
                        }

                    }else{
                         echo "<div id='status_testes'>";
                            echo "<img src='../../../images/ok4.jpg'>";
                         echo "</div>";
                         echo "<div id='infos_testes'>";
                            echo "<a href=\"javascript:abrir2('info.php?cod=1')\"><img src='../../../images/i3.jpg'></a>";
                         echo "</div>";
                    }

                     echo "</div>";
                }
                echo '<br>';
                echo '</div>';


                //CATEGORIA 4
                echo "<p id='ttl_testes'><a onclick=\"javascript: exibe('box_prova4');\">[+] Comercial</p></a>";
                echo '<br />';
                echo '<div id="box_prova4">';
                for ($i = 0; $i < $n_provas4[0]; $i++) {
                    $p_feitas = $conexao->consulta("select completed from users_to_lessons where lessons_id = {$provas4[$i][2]} and users_LOGIN = '$usuario'");
                    $p_f = mysql_fetch_row($p_feitas);
                    echo "<div id='lst_teste'> {$provas4[$i][1]}";
                    if($p_f[0] == 1){


                    $p_term = $conexao->consulta("SELECT nota FROM aval_resumo WHERE user = '$usuario' AND id_prova = {$provas4[$i][0]}");
                    $p_t = mysql_fetch_row($p_term);

                        if(!$p_t[0]){
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok5.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a href=\"javascript:abrir3('avaliacao.php?id={$provas4[$i][0]}')\"><img src='../../../images/iniciar_prova.jpg'></a>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/i4.jpg'></a>";
                                echo "</div>";

                        }else{
                     echo "<div id='status_testes'>";
                        echo "<img src='../../../images/ok3.jpg'>";
                     echo "</div>";
                             echo "<div id='infos_testes'>";
                                echo "<a class=\"seta_p_ok\"><img src='../../../images/prova_ok.jpg'></a>";
                                echo "<a href=\"javascript:abrir2('info.php?cod=2&id={$provas4[$i][0]}')\"><img src='../../../images/i3.jpg'></a>";
                            echo "</div>";
                        }

                    }else{
                         echo "<div id='status_testes'>";
                            echo "<img src='../../../images/ok4.jpg'>";
                         echo "</div>";
                         echo "<div id='infos_testes'>";
                            echo "<a href=\"javascript:abrir2('info.php?cod=1')\"><img src='../../../images/i3.jpg'></a>";
                         echo "</div>";
                    }

                     echo "</div>";
                }
                echo '<br>';
                echo '</div>';
                ?>

                <a href="#topo"><img alt="ancora"  src="../../../images/cima.png"></img></a>
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
