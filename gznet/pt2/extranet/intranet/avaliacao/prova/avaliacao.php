<?
session_start();
$_SESSION['menu'] = 'avaliacao';
$_SESSION['licao'] = 'prova';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include('../../../classes/valida_cookies.inc');
include('../../../classes/valida_perm.inc');
include('../../../classes/connect.class.php');

$conexao = new CONEXAO();
$conexao->Conecta();

//PEGANDO OS NOMES DAS LIÇÕES DA CATEGORIA A
$num_licoes1 = $conexao->consulta("SELECT count(*) FROM lessons where directions_ID = 1 AND active = 1");
$num_l1 = mysql_fetch_row($num_licoes1);

$nome_licoes1 = $conexao->consulta("SELECT id, name FROM lessons where directions_ID = 1 AND active = 1 order by name");


for ($i = 0; $i < $num_l1[0]; $i++) {
    $nome_l1[$i] = mysql_fetch_array($nome_licoes1);
}

//PEGANDO OS NOMES DAS LIÇÕES DA CATEGORIA B
$num_licoes2 = $conexao->consulta("SELECT count(*) FROM lessons where directions_ID = 2 AND active = 1");
$num_l2 = mysql_fetch_row($num_licoes2);

$nome_licoes2 = $conexao->consulta("SELECT id, name FROM lessons where directions_ID = 2 AND active = 1 order by name");


for ($i = 0; $i < $num_l2[0]; $i++) {
    $nome_l2[$i] = mysql_fetch_array($nome_licoes2);
}

//PEGANDO OS NOMES DAS LIÇÕES DA CATEGORIA C

$num_licoes3 = $conexao->consulta("SELECT count(*) FROM lessons where directions_ID = 4 AND active = 1");
$num_l3 = mysql_fetch_row($num_licoes3);

$nome_licoes3 = $conexao->consulta("SELECT id, name FROM lessons where directions_ID = 4 AND active = 1 order by name");


for ($i = 0; $i < $num_l3[0]; $i++) {
    $nome_l3[$i] = mysql_fetch_array($nome_licoes3);
}


//PEGANDO OS NOMES DAS LIÇÕES DA CATEGORIA D

$num_licoes4 = $conexao->consulta("SELECT count(*) FROM lessons where directions_ID = 6 AND active = 1");
$num_l4 = mysql_fetch_row($num_licoes4);

$nome_licoes4 = $conexao->consulta("SELECT id, name FROM lessons where directions_ID = 6 AND active = 1 order by name");


for ($i = 0; $i < $num_l4[0]; $i++) {
    $nome_l4[$i] = mysql_fetch_array($nome_licoes4);
}


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
        <title>GZ Net - Prova</title>
    </head>
    <body onload="minimiza()">
        <div id="index">
            <div id="banner"><img src="../../../images/banner_intranet.jpg" alt="Treinamentos GZ Sistemas" /></div>
            <div id="menu">
                <?php
                include '../../inc_menu.php';
                ?>
                <div class="clear"></div>
            </div>
            <div id="corpo">

                <form name="inserir_dados1" action="insere_dados.php" method="post" >

                    <?php
                    echo "<p id='ttl_testes'>Gerenciar Avaliações</p>";
                    echo '<div id="provas">';

                    //CATEGORIA 1
                    echo "<a onclick=\"javascript: exibe('cat1');\"><div id=\"lst_teste2\">";
                    echo "<p>[+] Comportamental e Conceitos</p>";
                    echo '</div></a>';
                    echo '<div id="cat1">';
                    for ($i = 0; $i < $num_l1[0]; $i++) {
                        $p_cadastrada = $conexao->consulta("SELECT name FROM aval_provas WHERE name = '{$nome_l1[$i][1]}'");
                        $p_c = mysql_fetch_row($p_cadastrada);
                        echo '<div id="lst_teste1">';
                        if(!$p_c){
                            echo '<input type="radio" name="opt1" value="' . $nome_l1[$i][0] . '" />';
                            echo ' ' . $nome_l1[$i][1];
                            echo '<br>';
                        }else{
                        echo '<img class="perm2" src="../../../images/ok6.jpg" >';
                            $provas_nomes = $conexao->consulta("SELECT id from aval_provas WHERE name = '{$nome_l1[$i][1]}'");
                            $provas = mysql_fetch_row($provas_nomes);
                            echo "<p>{$nome_l1[$i][1]}</a></p>";
                        echo "<a href=\"javascript:abrir('index.php?id={$provas[0]}&nome={$nome_l1[$i][1]}');\"><img class=\"questoes\" src=\"../../../images/questoes.jpg\" ></a>";
                            echo '<br>';
                        }
                    echo '</div>';
                    }
                    echo '</div>';



                    //CATEGORIA 2
                    echo "<a onclick=\"javascript: exibe('cat2');\"><div id=\"lst_teste2\">";
                    echo '<p>[+] Instalação e Configuração</p>';
                    echo '</div></a>';
                    echo '<div id="cat2">';
                    for ($i = 0; $i < $num_l2[0]; $i++) {
                        $p_cadastrada = $conexao->consulta("SELECT name FROM aval_provas WHERE name = '{$nome_l2[$i][1]}'");
                        $p_c = mysql_fetch_row($p_cadastrada);
                        echo '<div id="lst_teste1">';
                        if(!$p_c){
                            echo '<input type="radio" name="opt1" value="' . $nome_l2[$i][0] . '" />';
                            echo ' ' . $nome_l2[$i][1];
                            echo '<br>';
                        }else{
                        echo '<img class="perm2" src="../../../images/ok6.jpg" >';
                            $provas_nomes = $conexao->consulta("SELECT id from aval_provas WHERE name = '{$nome_l2[$i][1]}'");
                            $provas = mysql_fetch_row($provas_nomes);
                            echo "<p>{$nome_l2[$i][1]}</a></p>";
                        echo "<a href=\"javascript:abrir('index.php?id={$provas[0]}&nome={$nome_l2[$i][1]}');\"><img class=\"questoes\" src=\"../../../images/questoes.jpg\" ></a>";
                            echo '<br>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';

                    //CATEGORIA 3
                    echo "<a onclick=\"javascript: exibe('cat3');\"><div id=\"lst_teste2\">";
                    echo '<p>[+] Utilização dos Sistemas</p>';
                    echo '</div></a>';

                    echo '<div id="cat3">';
                    for ($i = 0; $i < $num_l3[0]; $i++) {
                        $p_cadastrada = $conexao->consulta("SELECT name FROM aval_provas WHERE name = '{$nome_l3[$i][1]}'");
                        $p_c = mysql_fetch_row($p_cadastrada);
                        echo '<div id="lst_teste1">';
                        if(!$p_c){
                            echo '<input type="radio" name="opt1" value="' . $nome_l3[$i][0] . '" />';
                            echo ' ' . $nome_l3[$i][1];
                            echo '<br>';
                        }else{
                        echo '<img class="perm2" src="../../../images/ok6.jpg" >';
                            $provas_nomes = $conexao->consulta("SELECT id from aval_provas WHERE name = '{$nome_l3[$i][1]}'");
                            $provas = mysql_fetch_row($provas_nomes);
                            echo "<p>{$nome_l3[$i][1]}</a></p>";
                        echo "<a href=\"javascript:abrir('index.php?id={$provas[0]}&nome={$nome_l3[$i][1]}');\"><img class=\"questoes\" src=\"../../../images/questoes.jpg\" ></a>";
                            echo '<br>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';

                    //CATEGORIA 4
                    echo "<a onclick=\"javascript: exibe('cat4');\"><div id=\"lst_teste2\">";
                    echo '<p>[+] Comercial</p>';
                    echo '</div></a>';

                    echo '<div id="cat4">';
                    for ($i = 0; $i < $num_l4[0]; $i++) {
                        $p_cadastrada = $conexao->consulta("SELECT name FROM aval_provas WHERE name = '{$nome_l4[$i][1]}'");
                        $p_c = mysql_fetch_row($p_cadastrada);
                        echo '<div id="lst_teste1">';
                        if(!$p_c){
                            echo '<input type="radio" name="opt1" value="' . $nome_l4[$i][0] . '" />';
                            echo ' ' . $nome_l4[$i][1];
                            echo '<br>';
                        }else{
                        echo '<img class="perm2" src="../../../images/ok6.jpg" >';
                            $provas_nomes = $conexao->consulta("SELECT id from aval_provas WHERE name = '{$nome_l4[$i][1]}'");
                            $provas = mysql_fetch_row($provas_nomes);
                            echo "<p>{$nome_l4[$i][1]}</a></p>";
                        echo "<a href=\"javascript:abrir('index.php?id={$provas[0]}&nome={$nome_l4[$i][1]}');\"><img class=\"questoes\" src=\"../../../images/questoes.jpg\" ></a>";
                            echo '<br>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';

                    echo '<input type="submit" value="Enviar dados" />';
                    echo '<input type="reset" value="Limpar" />';
                    echo '</div>';
                    ?>
                </form>
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
