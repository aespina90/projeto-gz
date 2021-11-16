<?php

    session_start();
    include('../../../classes/valida_cookies.inc');
    include('../../../classes/valida_perm.inc');
    $hora = $_SESSION['hora'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="../../../css/estilo_aval.css" type="text/css" media="all"></link>
        <title>Certifica��o GZ Sistemas | <?php $user='Rafael Zago'; echo $user;?></title>
    </head>
    <body>
        <div id="index">
        	<div id="cabeca">
        		#header
        	</div>
<?php

    $q2 = $_SESSION['q2'];
    $respostas = $_SESSION['respostas'];

        for ($i = 0; $i < 20; $i++){
            $rd[$i] = $_POST['resp'.$i];;
        }

        for($i = 0; $i < 20; $i++){
            $_SESSION['rd'.$i] = $rd[$i];
        }

    include('../../../classes/connect.class.php');
    include('../../../classes/avaliacao.class.php');

    $conecta = new CONEXAO();
    $avaliacao = new AVALIACAO();


    $conecta->Conecta();


//PEGA O NOME DA PROVA
    $nome = $conecta->consulta("select name from aval_provas where id = 1");
    $n = mysql_fetch_row($nome);
         	echo "<div id='infos'>";
   				echo $n[0];
        	echo "</div>";

                
        echo '<form name="prova" action="valida_resultado.php" method="post">';
            for($i = 0; $i < 20; $i++){

                    echo "<div id='num_pergunta'>";
                            echo $i+1;
                    echo "</div>";
                    echo "<div id='txt_pergunta'>";
                            $avaliacao->Quest_show($q2, $i);
                    echo "</div>";
                    echo "<div id='respostas'>";
                    $avaliacao->Perg_show2($respostas, $i);
                    echo "</div>";

                    
            }

		echo '<input type="submit" value="Concluir" />';
            echo '</form>';


?>   
        </div>
    </body>
</html>