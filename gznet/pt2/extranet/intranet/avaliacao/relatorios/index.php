<?php
	session_start();
        $_SESSION['menu'] = 'avaliacao';
        $_SESSION['licao'] = 'relatorios';

        include('../../../classes/valida_perm.inc');
	include('../../../classes/valida_cookies.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
                $nome       = $_SESSION['nome'];
                $usuario    = $_SESSION['usuario'];
                $acessos[0] = $_SESSION['mural'];
		$acessos[1] = $_SESSION['treinamento'];
		$acessos[2] = $_SESSION['avaliacao'];
		$acessos[3] = $_SESSION['senhas'];
                $usuario    = strtoupper($usuario);
                ?>
<html xml:lang="pt-BR" lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="stylesheet" href="../../../css/estilo.css" type="text/css" media="all"></link>
        <title>GZ Net - INTRANET</title>
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

        <form name="relatorio" action="index2.php" method="post" >
            <label>Digite o nome do usuario:</label>
                <input type="text" name="user" size="25" maxlenght="240" />
                <br />

            <input type="submit" value="Enviar dados" class="margem" />
            <input type="reset" value="Limpar" class="negrito" />
        </form>
                <div id="definir_niveis">
                    <?
                    if($acessos[2] == 21 || $acessos[2] == 3){
                        include 'nivel.php';
                    }
                    ?>
                </div>
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
