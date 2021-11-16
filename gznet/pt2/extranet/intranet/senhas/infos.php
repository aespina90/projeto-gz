<?php
session_start();
include('../../classes/valida_cookies.inc');
include('../../classes/connect.class.php');
include('../../classes/valida_perm.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php

    $conexao = new CONEXAO();
    $conexao->Conecta();

$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$acessos[0] = $_SESSION['mural'];
$acessos[1] = $_SESSION['treinamento'];
$acessos[2] = $_SESSION['avaliacao'];
$acessos[3] = $_SESSION['senhas'];
$usuario = strtoupper($usuario);
$id1 = $_GET['cod'];

$dados_bd = $conexao->consulta("SELECT nome, pedidoacesso, obs, flb_obs FROM tbl_usuarios WHERE COD = $id1");
$dados = mysql_fetch_row($dados_bd);

?>
<html xml:lang="pt-BR" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>GZ Net - INTRANET</title>
        <style type="text/css" title="mystyles" media="all">
            body{
                background-repeat: repeat-x;
                background-color:#e5eaf0;
                font-family: arial;
                font-size: 12px;
            }
            .ttl_form{
                width: 90px;
                display:inline-block;
            }
            .header_form{
                background: url("../../images/fundo_indice1.png");
                height:22px;
                width: 100%;
                color:#fff;
                font-weight: bold;
                text-align: center;
                padding-bottom: -5px;
                margin-bottom:  5px;
            }
            #obs{
                float:left;
                line-height: 180%;
                width: 380px;
                height: 270px;
                border: 1px solid #AEAEAE;
                display: inline-block;
            }
            .ttl_form{
                width: 90px;
                display:inline-block;
                vertical-align: top;

            }
            input
            {
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000000;
                border-style:groove;
            }
            .textarea
            {
                width:240px;
                height:195px;
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000;
                border-style:groove;
            }
            input.checkbox{
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000000;
                border-style:groove;
            }
            select
            {
                background-color: #ececec;
                font-family: arial;
                font-size: 10pt;
                color: #000000;
                border-style:groove;
            }

            .ok{
                margin-left:90px;
            }
        </style>
        <script type="text/javascript" src="ajax_dg_ctrl_senhas.js"></script>

    </head>
    <body>
        <?
        echo '<div>';
            echo "<b>Nome:</b> $dados[0]";
        echo '</div>';

        echo '<div>';
            echo "<b>Acessos:</b> $dados[1]";
        echo '</div>';
        if($dados[3] == 1){
            echo "<a href=\"#\" onClick=\"Checar('$id1');\">Checado</a>";
        }
        echo '<div>';
            echo "$dados[2]";
        echo '</div>';
        ?>
    </body>
</html>