<?php
    session_start();
    include('../../../classes/valida_cookies.inc');
    include('../../../classes/valida_perm.inc');
    $usuario = $_SESSION['usuario'];
    include('../../../classes/connect.class.php');

    $conexao = new CONEXAO();
    $conexao->Conecta();

    $cod = $_GET['cod'];
?>
<html>
    <head>
        <title>Informações</title>
        <style type="text/css" title="mystyles" media="all">
            body{
                background-repeat: repeat-x;
                background-color:#e5eaf0;
                font-family: arial;
                font-size: 13px;
            }

            #usuario{
                font-size: 15px;
                font-weight: bold;
            }
            #center{
                text-align: center;
            }
        </style>
    </head>
    <body>
<?
    if($cod == 1){
        echo '<div id="center">';
        echo 'Você precisa terminar essa lição no Treinamento Online GZ para fazer a avaliação';
        echo '</div>';
    }else if($cod == 2){
        $id = $_GET['id'];

        $infos = $conexao->consulta("SELECT nota, id, data, ip FROM aval_resumo WHERE user = '$usuario' AND id_prova = $id");
        $inf = mysql_fetch_row($infos);

        if($inf[0] == 1){
        echo '<div id="center">';
            echo 'Seu tempo para realizar essa prova expirou';
        echo '</div>';
        }else{
            echo '<div id="usuario">';
            echo 'Usuário: '.$usuario;
            echo '</div>';
            echo '<hr>';
            echo '<br />';
            echo '<div>';
            echo 'Porcentagem de Acertos: '.$inf[0].'%';
            echo '</div>';
            echo '<br />';
            echo '<div>';
            echo 'Data de Realização da Prova: '.$inf[2];
            echo '</div>';
            echo '<br />';
            echo '<div>';
            echo 'IP da Máquina que a prova foi Realizada: '.$inf[3];
            echo '</div>';
        }
    }
?>
    </body>
</html>
