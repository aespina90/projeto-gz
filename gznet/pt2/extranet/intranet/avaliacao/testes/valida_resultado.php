<?php
	ob_start();
	session_start();
        $usuario = $_SESSION['usuario'];
        $id_prova = $_SESSION['id'];

        include('../../../classes/valida_cookies.inc');
        include('../../../classes/valida_perm.inc');
        include('../../../classes/connect.class.php');
        include('../../../classes/resultado.class.php');

        $conecta = new CONEXAO();

        $data = date("dHi");

        $hora_inicio = $conecta->consulta("select inicio_prova from aval_resumo where user = '$usuario' and id_prova = $id_prova");
        $hora = mysql_fetch_row($hora_inicio);

        $hora[0] = $hora[0] + 100;

            if(substr($hora[0], -4) >= 2400){
                $hora[0] = $hora[0] - 2400;
                $hora[0] = $hora[0] + 10000;
            }

        if($data > $hora[0]){
        $conecta->consulta("update aval_resumo set nota = 1, fim_prova = $data WHERE user = '$usuario' and id_prova = $id_prova");
            echo "<script type='text/javascript'>
            alert('Seu tempo para realizar a prova ja expirou!');
            window.opener.location.reload();
            window.close();
            </script>";
        }else{

        
        echo '<br>';

        $resultado = new RESULTADO();

        for ($i = 0; $i < 20; $i++){
            $rc[$i] = $_SESSION['rc'.$i];
        }

        for ($i = 0; $i < 20; $i++){
            $rd[$i] = $_SESSION['rd'.$i];
            echo $rd[$i];
        }
        
        for ($i = 0; $i < 20; $i++){
            $id[$i] = $_SESSION['id'.$i];
        }

        $nota = $resultado->Acertos($rd, $rc);
        $_SESSION['nota'] = $nota;
        for($i = 0; $i < 20; $i++){
            $conecta->Consulta("INSERT INTO aval_respostas VALUES (null, '$usuario', $id[$i], '$rd[$i]', '$rc[$i]')");
        }
        $conecta->consulta("UPDATE aval_resumo SET nota = $nota, fim_prova = $data where user = '$usuario' and id_prova = $id_prova");

        header ("location: resultado.php");
        }

?>