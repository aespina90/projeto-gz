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
                <div id="senhas_relatorio">
                    <div class="header_form"> Requisição de Senhas </div>
                    <div class="form_geral">
                        <form action="model_relatorio.php" method="POST">
                            <div class="ttl_form">*Código:</div><input name="cod" type="text" id="cod" size="30px"></input><br />
                            <div class="ttl_form">*Nome</div><input name="nome" type="text" id="nome" size="30"></input><br />
                            <div class="ttl_form">*Acessos:</div>
                            <input type="checkbox" name="cbx_ct">C.T.</input>
                            <input type="checkbox" name="cbx_ar">A.R.</input>
                            <input type="checkbox" name="cbx_el">E.L.</input>
                            <input type="checkbox" name="cbx_pc">P.C.</input>
                            <input type="checkbox" name="cbx_ts">T.S.</input>
                            <input type="checkbox" name="cbx_em">E.M.</input>
                            <input type="checkbox" name="cbx_qw">Q.W.</input><br />
                            <div class="ttl_form">*Perfil T.S.:</div>
                            <!-- Populando Dropdown com os Perfis-->
                                                                                <?
                                                                                $conecta = new CONEXAO();
                                                                                $conecta->Conecta();
                                                                                $sql = $conecta->Consulta("SELECT id,NOME FROM tbl_perfis WHERE status = 1");
                                                                                $result = $sql;
                                                                                $options = "";
                                                                                while ($row = mysql_fetch_array($result)) {
                                                                                    $id = $row["id"];
                                                                                    $perfil = $row["NOME"];
                                                                                    $options.="<OPTION VALUE=\"$id\">" . $perfil;
                                                                                }
                                                                                ?>
                            <select NAME=perfil>
                                <option VALUE=0>Escolha o Perfil...</option>
                                    <?= $options ?>
                            </select>
                                                                                <?
                                                                                $sql = $conecta->Consulta("SELECT id,ABR FROM tbl_uf");
                                                                                $result = $sql;
                                                                                $options = "";
                                                                                while ($row = mysql_fetch_array($result)) {
                                                                                    $id = $row["id"];
                                                                                    $perfil = $row["ABR"];
                                                                                    $options.="<OPTION VALUE=\"$perfil\">" . $perfil;
                                                                                }
                                                                                ?>
                            <select NAME=uf>
                                        <option VALUE=0>UF</option>
                                                                                <?= $options ?>
                            </select>
                            <br />
                            <div class="ttl_form">*E-mail:</div><input name="email" type="text" id="email" size="30"></input>
                            <input type=submit value="OK"></input>
                        </form>
                <div id="img_gz">
                    <a href="javascript:abrir2('obs.php')"><img src="../../images/obs.png" alt="GZ Sistemas"></img></a>
                </div>
                    </div>
                </div>


                <div id="senhas_ttl_lista">
                    <div class="senhas_ttl_tp1">COD</div>
                    <div class="senhas_ttl_tp1">UF</div>
                    <div class="senhas_ttl_tp2">Revenda</div>
                    <div class="senhas_ttl_tp3">Usuário</div>
                    <div class="senhas_ttl_tp3">Senha</div>
                    <div class="senhas_ttl_tp4">C.T</div>
                    <div class="senhas_ttl_tp4">A.R</div>
                    <div class="senhas_ttl_tp4">E.L</div>
                    <div class="senhas_ttl_tp4">P.C</div>
                    <div class="senhas_ttl_tp4">T.S</div>
                    <div class="senhas_ttl_tp4">E.M</div>
                    <div class="senhas_ttl_tp4">Q.W</div>
                </div>

                                                                                <?php
                                                                                $resultado = $conecta->Consulta("SELECT cod,uf,nome,login,senha,controller,area_restrita,e_learning,protcli,ts,email,qualitor FROM `tbl_usuarios` where flb_status='1' and nivel=1 order by abs(cod) asc");
                                                                                $quant = mysql_num_rows($resultado);
                                                                                $i = 1;
                                                                                echo '<div id="senhas_lista">';
                                                                                while ($i <= $quant) {
                                                                                    $dado = mysql_fetch_array($resultado);
                                                                                    echo "<div class='perm3'>{$dado['cod']}</div>";
                                                                                    echo "<div class='senhas_tp1'>{$dado['uf']}</div>";
                                                                                    echo "<div class='senhas_tp2'>{$dado['nome']}</div>";
                                                                                    echo "<div class='senhas_tp3'>{$dado['login']}</div>";
                                                                                    echo "<div class='senhas_tp4'>{$dado['senha']}</div>";
                                                                                    if ($dado['controller'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }

                                                                                    if ($dado['area_restrita'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }

                                                                                    if ($dado['e_learning'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }

                                                                                    if ($dado['protcli'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }

                                                                                    if ($dado['ts'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }

                                                                                    if ($dado['email'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }
                                                                                    if ($dado['qualitor'] == '1') {
                                                                                        echo '<img class="perm2" src="../../images/ok.jpg" >';
                                                                                    } else {
                                                                                        echo '<img class="perm2" src="../../images/no.jpg">';
                                                                                    }
                                                                                    $i++;
                                                                                }
                                                                                echo '</div>';
                                                                                ?>

                <a href="#topo"><img alt="ancora"  src="../../images/cima.png"></img></a>
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
