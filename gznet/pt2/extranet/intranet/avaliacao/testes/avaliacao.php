<?php
    session_start();
        $_SESSION['menu'] = 'avaliacao';
        $_SESSION['licao'] = 'testes';

        include('../../../classes/valida_perm.inc');
        include('../../../classes/valida_cookies.inc');
    $usuario = $_SESSION['usuario'];
    $id_p=$_GET['id'];
    $_SESSION['id'] = $id_p;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>

<script type="text/javascript">
	function valida(){

		if(document.getElementById('resp1').checked == false && document.getElementById('resp2').checked == false && document.getElementById('resp3').checked == false && document.getElementById('resp4').checked == false && document.getElementById('resp5').checked == false){
			alert('Você não respondeu a Questão 1');
                        return false;
		}else if(document.getElementById('resp6').checked == false && document.getElementById('resp7').checked == false && document.getElementById('resp8').checked == false && document.getElementById('resp9').checked == false && document.getElementById('resp10').checked == false){
			alert('Você não respondeu a Questão 2')
                        return false;
		}else if(document.getElementById('resp11').checked == false && document.getElementById('resp12').checked == false && document.getElementById('resp13').checked == false && document.getElementById('resp14').checked == false && document.getElementById('resp15').checked == false){
			alert('Você não respondeu a Questão 3')
                        return false;
		}else if(document.getElementById('resp16').checked == false && document.getElementById('resp17').checked == false && document.getElementById('resp18').checked == false && document.getElementById('resp19').checked == false && document.getElementById('resp20').checked == false){
			alert('Você não respondeu a Questão 4')
                        return false;
		}else if(document.getElementById('resp21').checked == false && document.getElementById('resp22').checked == false && document.getElementById('resp23').checked == false && document.getElementById('resp24').checked == false && document.getElementById('resp25').checked == false){
			alert('Você não respondeu a Questão 5')
                        return false;
		}else if(document.getElementById('resp26').checked == false && document.getElementById('resp27').checked == false && document.getElementById('resp28').checked == false && document.getElementById('resp29').checked == false && document.getElementById('resp30').checked == false){
			alert('Você não respondeu a Questão 6')
                        return false;
		}else if(document.getElementById('resp31').checked == false && document.getElementById('resp32').checked == false && document.getElementById('resp33').checked == false && document.getElementById('resp34').checked == false && document.getElementById('resp35').checked == false){
			alert('Você não respondeu a Questão 7')
                        return false;
		}else if(document.getElementById('resp36').checked == false && document.getElementById('resp37').checked == false && document.getElementById('resp38').checked == false && document.getElementById('resp39').checked == false && document.getElementById('resp40').checked == false){
			alert('Você não respondeu a Questão 8')
                        return false;
		}else if(document.getElementById('resp41').checked == false && document.getElementById('resp42').checked == false && document.getElementById('resp43').checked == false && document.getElementById('resp44').checked == false && document.getElementById('resp45').checked == false){
			alert('Você não respondeu a Questão 9')
                        return false;
		}else if(document.getElementById('resp46').checked == false && document.getElementById('resp47').checked == false && document.getElementById('resp48').checked == false && document.getElementById('resp49').checked == false && document.getElementById('resp50').checked == false){
			alert('Você não respondeu a Questão 10')
                        return false;
		}else if(document.getElementById('resp51').checked == false && document.getElementById('resp52').checked == false && document.getElementById('resp53').checked == false && document.getElementById('resp54').checked == false && document.getElementById('resp55').checked == false){
			alert('Você não respondeu a Questão 11')
                        return false;
		}else if(document.getElementById('resp56').checked == false && document.getElementById('resp57').checked == false && document.getElementById('resp58').checked == false && document.getElementById('resp59').checked == false && document.getElementById('resp60').checked == false){
			alert('Você não respondeu a Questão 12')
                        return false;
		}else if(document.getElementById('resp61').checked == false && document.getElementById('resp62').checked == false && document.getElementById('resp63').checked == false && document.getElementById('resp64').checked == false && document.getElementById('resp65').checked == false){
			alert('Você não respondeu a Questão 13')
                        return false;
		}else if(document.getElementById('resp66').checked == false && document.getElementById('resp67').checked == false && document.getElementById('resp68').checked == false && document.getElementById('resp69').checked == false && document.getElementById('resp70').checked == false){
			alert('Você não respondeu a Questão 14')
                        return false;
		}else if(document.getElementById('resp71').checked == false && document.getElementById('resp72').checked == false && document.getElementById('resp73').checked == false && document.getElementById('resp74').checked == false && document.getElementById('resp75').checked == false){
			alert('Você não respondeu a Questão 15')
                        return false;
		}else if(document.getElementById('resp76').checked == false && document.getElementById('resp77').checked == false && document.getElementById('resp78').checked == false && document.getElementById('resp79').checked == false && document.getElementById('resp80').checked == false){
			alert('Você não respondeu a Questão 16')
                        return false;
		}else if(document.getElementById('resp81').checked == false && document.getElementById('resp82').checked == false && document.getElementById('resp83').checked == false && document.getElementById('resp84').checked == false && document.getElementById('resp85').checked == false){
			alert('Você não respondeu a Questão 17')
                        return false;
		}else if(document.getElementById('resp86').checked == false && document.getElementById('resp87').checked == false && document.getElementById('resp88').checked == false && document.getElementById('resp89').checked == false && document.getElementById('resp90').checked == false){
			alert('Você não respondeu a Questão 18')
                        return false;
		}else if(document.getElementById('resp91').checked == false && document.getElementById('resp92').checked == false && document.getElementById('resp93').checked == false && document.getElementById('resp94').checked == false && document.getElementById('resp95').checked == false){
			alert('Você não respondeu a Questão 19')
                        return false;
		}else if(document.getElementById('resp96').checked == false && document.getElementById('resp97').checked == false && document.getElementById('resp98').checked == false && document.getElementById('resp99').checked == false && document.getElementById('resp100').checked == false){
			alert('Você não respondeu a Questão 20')
                        return false;
		}else{
                    
                }
	}
</script>

        
        <link rel="stylesheet" href="../../../css/estilo_aval.css" type="text/css" media="all">
        <title>Certificaçãoo GZ Sistemas | <?php echo $user;?></title>
    </head>
    <body>
        <div id="index">
<?php
    include('../../../classes/connect.class.php');
    include('../../../classes/avaliacao.class.php');

    $conecta = new CONEXAO();
    $avaliacao = new AVALIACAO();

    

    $conecta->Conecta();

    //PEGA A DATA E O IP DO COMPUTADOR
    $data = date("dHi");
    $dia = date("d/m/Y");
    $ip = $_SERVER["REMOTE_ADDR"];


//PEGA O NOME DA PROVA
    $nome = $conecta->consulta("select name from aval_provas where id = $id_p");
    $n = mysql_fetch_row($nome);
         	echo "<div id='infos'>";
   				echo $n[0];
        	echo "</div>";

//  PEGA AS PERGUNTAS E EMBARALHA
    $quest = $conecta->consulta("select id, pergunta, r1, r2, r3, r4, r5, rc from aval_perguntas where id_provas = $id_p and status = 1");
    $c = 0;


    while($c < 20){
        $q[$c ]= mysql_fetch_array($quest);
        $c++;

        }
        
        shuffle($q);

        $q2 = $q;

        $_SESSION['q2'] = $q2;

        echo '<form name="prova" action="checkout.php" method="post" onSubmit="return valida()">';
            for($i = 0; $i < 20; $i++){

                    echo "<div id='num_pergunta'>";
                            echo $i+1;
                    echo "</div>";
                    echo "<div id='txt_pergunta'>";
                            $avaliacao->Quest_show($q, $i);
                    echo "</div>";
                    echo "<div id='respostas'>";

                    $respostas[$i] = $avaliacao->Perg_show($q, $i);
                    echo "</div>";

            }

		echo '<input type="submit" value ="Enviar">';
                echo '<input type="reset" value="Limpar" />';
        echo '</form>';

        $_SESSION['respostas'] = $respostas;

        for($i = 0; $i < 20; $i++){
            $_SESSION['rc'.$i] = $q[$i][7];
        }

        for($i = 0; $i < 20; $i++){
            $_SESSION['id'.$i] = $q[$i][0];
        }

        $hora_inicio = $conecta->consulta("select inicio_prova from aval_resumo where user = '$usuario' and id_prova = $id_p");
        $hora = mysql_fetch_row($hora_inicio);

        if(!$hora[0]){
        $conecta->consulta("INSERT INTO aval_resumo VALUES(null,'$usuario', $id_p, null,'$data', null,'$ip', '$dia')");
                        $_SESSION['hora'] = $data;
        }else{
            $_SESSION['hora'] = $hora[0];


            $hora[0] = $hora[0] + 100;

            if(substr($hora[0], -4) >= 2400){
                $hora[0] = $hora[0] - 2400;
                $hora[0] = $hora[0] + 10000;
            }
        
        if($data > $hora[0]){
        $conecta->consulta("update aval_resumo set nota = 1, fim_prova = $data WHERE user = '$usuario' and id_prova = $id_p");
            echo "<script type='text/javascript'>
            alert('Seu tempo para realizar a prova ja expirou!');
            window.opener.location.reload();
            window.close();
            </script>";
        }
        }
?>   
        </div>
    </body>
</html>
