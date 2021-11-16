<?php
session_start();
$usuario = $_SESSION['usuario'];
include('../../../classes/valida_perm.inc');
include('../../../classes/valida_cookies.inc');
include('../../../classes/connect.class.php');

$conexao = new CONEXAO();
$conexao->Conecta();


$n_nivel = $conexao->Consulta("SELECT n_nivel1 FROM aval_controle");
$n_n1 = mysql_fetch_row($n_nivel);
$cont_n = $n_n1[0] * 4;

$n_licao_nivel1 = $conexao->Consulta("SELECT nivel1 FROM aval_controle");
$n_l_nivel1 = mysql_fetch_row($n_licao_nivel1);


//PEGANDO OS NOMES DAS LIÇÕES DA CATEGORIA A
$num_licoes1 = $conexao->consulta("SELECT count(*) FROM lessons where directions_ID = 1 AND active = 1");
$num_l1 = mysql_fetch_row($num_licoes1);

$nome_licoes1 = $conexao->consulta("SELECT name FROM lessons where directions_ID = 1 AND active = 1 order by name");


for ($i = 0; $i < $num_l1[0]; $i++) {
    $nome_l1[$i] = mysql_fetch_array($nome_licoes1);
}
?>
<html>
    <head>
        <script type="text/javascript" >
            function check(id){
                document.getElementById(id).checked = true;
            }
        </script>

    </head>
    <body onload="check(0)">
        <form action="insere_nivel.php" >
<?
$check = false;
for ($i = 0; $i < $num_l1[0]; $i++) {
    for ($j = 0; $j < $cont_n; $j = $j + 4) {
        if (substr($nome_l1[$i][0], 0, 4) == substr($n_l_nivel1[0], $j, 4)) {
            $check = true;
        }
    }
    if ($check == true) {
        echo "<input type='checkbox' id='0'>{$nome_l1[$i][0]}";
        echo '<br>';
        $check = false;
    } else {
        echo "<input type='checkbox'>{$nome_l1[$i][0]}";
        echo '<br>';
    }
}
echo $var;
?>
        </form>
    </body>
</html>