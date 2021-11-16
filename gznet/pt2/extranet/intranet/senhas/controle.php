<?php
session_start();
include('../../classes/valida_cookies.inc');
include('../../classes/connect.class.php');
include('../../classes/valida_perm.inc');
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
        <link rel="stylesheet" type="text/css" href="../../css/dg_ctrl_senhas.css"></link>
        <script type="text/javascript" src="ajax_dg_ctrl_senhas.js"></script>
        <link rel="stylesheet" href="../../css/estilo.css" type="text/css" media="all"></link>
        <script src="http://www.gznet.com.br/portal/js/geral.js" type="text/javascript"></script>
        <title>GZ Net - INTRANET</title>
    </head>
    <body>
        <a NAME="topo"></a>
        <div id="index">
            <div id="banner"><img src="../../images/banner_intranet.jpg" alt="Treinamentos GZ Sistemas" /></div>
            <div id="menu">
                <?php
                include '../inc_menu.php';
                ?>
                <div class="clear"></div>
            </div>
            <div id="corpo">
                <div>
                    <form name="formulario">
                        <table id="minhaTabela" cellpadding="1" cellspacing="1">
                            <tr>
                                <td colspan="16" id="titulo"><strong>Controle de Usuários</strong></td>
                            </tr>
                            <tr id="cabecalho">
                                <td id="codigo"><strong>COD</strong></td>
                                <td id="uf"><strong>UF</strong></td>
                                <td id="nome"><strong>NOME</strong></td>
                                <td id="login"><strong>LOGIN</strong></td>
                                <td id="senha"><strong>SENHA</strong></td>
                                <td id="ct"><strong>CT</strong></td>
                                <td id="ar"><strong>AR</strong></td>
                                <td id="el"><strong>EL</strong></td>
                                <td id="pc"><strong>PC</strong></td>
                                <td id="ts"><strong>TS</strong></td>
                                <td id="em"><strong>EM</strong></td>
                                <td id="qw"><strong>QW</strong></td>
                                <td id="ok"><strong>OK</strong></td>
                                <td id="editar"><strong>&nbsp;</strong></td>
                                <td id="excluir"><strong>&nbsp;</strong></td>
                                <td id="infos"><strong>&nbsp;</strong></td>
                            </tr>
                            <?php
                                    $cod = $_GET['id'];
                                    $_SESSION['cod'] = $cod;
                                    $con = mysql_connect('192.168.1.2', 'intranet', 'mestre') or die("Erro de conexão");
                                    $res1 = mysql_select_db('bdusuariosgz') or die("Banco de dados inexistente");
                                    $res = mysql_query("SELECT cod,uf,nome,login,senha,controller,area_restrita,e_learning,protcli,ts,emailgz,qualitor,flb_status, flb_obs FROM `tbl_usuarios` order by abs(flb_status) asc ");
                                    $total = mysql_num_rows($res);

                                    for ($i = 0; $i < $total; $i++) {
                                        $dados = mysql_fetch_row($res);
                                        $COD = $dados[0];
                                        $UF = $dados[1];
                                        $NOME = $dados[2];
                                        $LOGIN = $dados[3];
                                        $SENHA = $dados[4];
                                        $CT = $dados[5];
                                        $AR = $dados[6];
                                        $EL = $dados[7];
                                        $PC = $dados[8];
                                        $TS = $dados[9];
                                        $email = $dados[10];
                                        $qualitor = $dados[11];
                                        $status  = $dados[12];
                                        $flb_obs = $dados[13];

                                        $idLinha = "linha$i";
                                        echo '<tr id="' . $idLinha . '">';
                                        echo '<td class="linhas_cod" align="center">' . $COD . '</td>';
                                        echo "<td class=\"linhas\">$UF</td>";
                                        echo "<td class=\"linhas\">$NOME</td>";
                                        echo "<td class=\"linhas\">$LOGIN</td>";
                                        echo "<td class=\"linhas\">$SENHA</td>";
                                        echo "<td class=\"linhas1\">$CT</td>";
                                        echo "<td class=\"linhas1\">$AR</td>";
                                        echo "<td class=\"linhas1\">$EL</td>";
                                        echo "<td class=\"linhas1\">$PC</td>";
                                        echo "<td class=\"linhas1\">$TS</td>";
                                        echo "<td class=\"linhas1\">$email</td>";
                                        echo "<td class=\"linhas1\">$qualitor</td>";
                                        echo "<td class=\"linhas1\">$status</td>";
                                        echo "<td class=\"linhas\"><a onclick=\"EditarLinha('$idLinha', '$codigo', '$cod');\"><img src=\"../../images/edit.jpg\" alt=\"Editar\" title=\"Editar\"></a></td>";
                                        echo "<td class=\"linhas\"><a onclick=\"ExcluirLinha('$idLinha', '$COD');\"><img src=\"../../images/deleta.jpg\" alt=\"Deletar\" title=\"Deletar\"></a></td>";
                                        echo "<td class=\"linhas\"><a href=\"javascript:abrir2('infos.php?cod=$COD')\">";
                                            if($flb_obs == 0){
                                                echo "<img src=\"../../images/i1.jpg\" alt=\"Infos\" title=\"Infos\"></a></td>";
                                            }else{
                                                echo "<img src=\"../../images/i2.jpg\" alt=\"Infos\" title=\"Infos\"></a></td>";
                                            }
                                    }
                                    echo '<tr>';
                            ?>
                            </tr>
                        </table>
                    </form>

                    <a href="#topo"><img alt="ancora"  src="../../images/cima.png"></img></a>
                </div>

                <div id="rodape">Todos os direitos reservados à GZ Sistemas - <a href="http://www.gzsistemas.com.br"><b>www.gzsistemas.com.br</b></a></div>
                <div id="w3c">
                    <p>
                        <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
