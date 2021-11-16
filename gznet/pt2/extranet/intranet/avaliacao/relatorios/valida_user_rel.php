<?php
	session_start();
        include('../../../classes/valida_perm.inc');
	include('../../../classes/valida_cookies.inc');
        include('../../../classes/connect.class.php');
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
        <title>GZ Net - INTRANET</title>
    <script src="http://www.gznet.com.br/portal/js/geral.js" type="text/javascript"></script>
        <style type="text/css" title="mystyles" media="all">
            body{
                background-repeat: repeat-x;
                background-color:#e5eaf0;
                font-family: arial;
                font-size: 12px;}
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

    </head>
    <body>
        <div id="index">
            <div id="corpo">
                <?
echo '<pre>';
	$login = $_GET['log'];

    $conecta = new CONEXAO();

    $conecta->Conecta();

    //SELECT id, name FROM aval_provas WHERE id_course = 1

    //SELECT name FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 1 and aval_resumo.user = 'aux.treina'

	// SELECIONA AS PROVAS DA CATEGORIA 1

    $num_p1 = $conecta->Consulta("select count(*) from aval_provas where id_course = 1");
    $n_p1 = mysql_fetch_row($num_p1);

    $num_p_feitas1 = $conecta->Consulta("SELECT count(aval_provas.name) FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 1 and aval_resumo.user = '{$login}'");
    $n_p_f1 = mysql_fetch_row($num_p_feitas1);

    $provas1 = $conecta->Consulta("SELECT aval_provas.name, aval_resumo.nota FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 1 and aval_resumo.user = '{$login}' order by name");


       	for ($i = 0; $i < $n_p_f1[0]; $i++){
        	$p1[$i] = mysql_fetch_row($provas1);
        };




    // SELECIONA AS PROVAS DA CATEGORIA 2

    $num_p2 = $conecta->Consulta("select count(*) from aval_provas where id_course = 2");
    $n_p2 = mysql_fetch_row($num_p2);

    $num_p_feitas2 = $conecta->Consulta("SELECT count(aval_provas.name) FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 2 and aval_resumo.user = '{$login}'");
    $n_p_f2 = mysql_fetch_row($num_p_feitas2);

    $provas2 = $conecta->Consulta("SELECT aval_provas.name, aval_resumo.nota FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 2 and aval_resumo.user = '{$login}' order by name");

       	for ($i = 0; $i < $n_p_f2[0]; $i++){
        	$p2[$i] = mysql_fetch_row($provas2);
        };


    //SELECIONA AS PROVAS DA CATEGORIA 3

    $num_p3 = $conecta->Consulta("select count(*) from aval_provas where id_course = 4");
    $n_p3 = mysql_fetch_row($num_p3);

    $num_p_feitas3 = $conecta->Consulta("SELECT count(aval_provas.name) FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 4 and aval_resumo.user = '{$login}'");
    $n_p_f3 = mysql_fetch_row($num_p_feitas3);

    $provas3 = $conecta->Consulta("SELECT aval_provas.name, aval_resumo.nota FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_provas.id_course = 4 and aval_resumo.user = '{$login}' order by name");

       	for ($i = 0; $i < $n_p_f3[0]; $i++){
        	$p3[$i] = mysql_fetch_row($provas3);
        };


    $numero = $conecta->Consulta("SELECT count(*) FROM aval_resumo WHERE user = '{$login}'");
    $n = mysql_fetch_row($numero);

    $informacao = $conecta->Consulta("SELECT * FROM aval_resumo WHERE user = '{$login}'");

        for ($i = 0; $i < $n[0]; $i++){
        	$inf[$i] = mysql_fetch_row($informacao);
        };

//VALIDAÇÃO PARA NÍVEIS

    $n_nivel = $conecta->Consulta("SELECT n_nivel1 FROM aval_controle");
    $n_n1 = mysql_fetch_row($n_nivel);
    $cont_n = $n_n1[0] * 4;

    $n_licao_nivel1 = $conecta->Consulta("SELECT nivel1 FROM aval_controle");
    $n_l_nivel1 = mysql_fetch_row($n_licao_nivel1);

    $numeropp = $conecta->Consulta("SELECT count(*) FROM aval_resumo WHERE user = '{$login}' and nota >=75");
    $npp = mysql_fetch_row($numeropp);

    $provas_p = $conecta->Consulta("SELECT aval_provas.name FROM aval_provas INNER JOIN aval_resumo ON aval_resumo.id_prova = aval_provas.id and aval_resumo.user = '{$login}' and nota >= 75");
        for ($i = 0; $i < $npp[0]; $i++){
        	$pp[$i] = mysql_fetch_row($provas_p);
        };

        for($i = 0; $i < $cont_n; $i = $i +4){
            for($j = 0; $j <$npp[0]; $j++){
                    if(substr($pp[$j][0],0,4) == substr($n_l_nivel1[0],$i,4)){
                                    $nivel++;
                    }

            }
        }


    if ($n[0] == 0){
    	echo 'Este usuário não realizou nenehuma Avaliação';
    }else{

    	echo 'Usuário: '.$login;
    	echo '<br>';

    	if ($nivel >= $n_n1[0]){
    		echo 'Nível: 1';
    	}else{
    		echo 'Nível: 0';
    	}

$n_pp1 = 0;
$n_pp2 = 0;
$n_pp3 = 0;

    for ($i = 0; $i < $n_p_f1[0]; $i++){
        if($p1[$i][1]>=75){
        	$n_pp1++;
       	}else{
       	}
    }


	for ($i = 0; $i < $n_p_f2[0]; $i++){
        if($p2[$i][1]>=75){
        	$n_pp2++;
       	}else{
       	}
    }

    for ($i = 0; $i < $n_p_f3[0]; $i++){
        if($p3[$i][1]>=75){
        	$n_pp3++;
       	}else{
       	}
    }



    	$porc1 = ($n_pp1*100)/$n_p1[0];
    	$prc1 = number_format($porc1, 0);

    	echo "<br>";

    	echo "<a href=\"#\" onclick=\"javascript: exibe('conteudo1');\">Comportamental e Conceitos - {$prc1}%</a><br />";

    	echo "<div id=\"conteudo1\" style=\"display: none;\">";
       	for ($i = 0; $i < $n_p_f1[0]; $i++){
       		if($p1[$i][1]>=75){
        		echo "<p>{$p1[$i][0]} Nota: {$p1[$i][1]} Aprovado</p>";
                        echo '<br />';
       		}else{
       			if(!$p1[$i][1]){
       				echo "<p>{$p1[$i][0]} Nota: 0 Reprovado</p>";
                                echo '<br />';
       			}else{
       				echo "<p>{$p1[$i][0]} Nota: {$p1[$i][1]} Reprovado</p>";
                                echo '<br />';
       			}
       		}

        };
        echo "</div>";
        echo "<br>";


        $porc2 = ($n_pp2*100)/$n_p2[0];
        $prc2 = number_format($porc2, 0);

        echo "<a href=\"#\" onclick=\"javascript: exibe('conteudo2');\">Instalação e Configuração - {$prc2}%</a><br />";

        echo "<div id=\"conteudo2\" style=\"display: none;\">";
       	for ($i = 0; $i < $n_p_f2[0]; $i++){

       	    if($p2[$i][1]>=75){
        		echo "<p>{$p2[$i][0]} Nota: {$p2[$i][1]} Aprovado</p>";
                        echo '<br />';
       		}else{
       			if(!$p2[$i][1]){
       				echo "<p>{$p2[$i][0]} Nota: 0 Reprovado</p>";
                                echo '<br />';
       			}else{
       				echo "<p>{$p2[$i][0]} Nota: {$p2[$i][1]} Reprovado</p>";
                                echo '<br />';
       			}
       		}

        };
        echo "</div>";
        echo "<br>";


        $porc3 = ($n_pp3*100)/$n_p3[0];
        $prc3 = number_format($porc3, 0);

        echo "<a href=\"#\" onclick=\"javascript: exibe('conteudo3');\">Utilização dos Sistemas - {$prc3}%</a><br />";

        echo "<div id=\"conteudo3\" style=\"display: none;\">";
       	for ($i = 0; $i < $n_p_f3[0]; $i++){

       	    if($p3[$i][1]>=75){
        		echo "<p>{$p3[$i][0]} Nota: {$p3[$i][1]} Aprovado</p>";
                        echo '<br />';
       		}else{
       			if(!$p3[$i][1]){
       				echo "<p>{$p1[$i][0]} Nota: 0 Reprovado</p>";
                                echo '<br />';
       			}else{
       				echo "<p>{$p1[$i][0]} Nota: {$p1[$i][1]} Reprovado</p>";
                                echo '<br />';
       			}
       		}

        };
        echo "</div>";

    }


?>
                
            </div>
        </div>
    </body>
</html>
