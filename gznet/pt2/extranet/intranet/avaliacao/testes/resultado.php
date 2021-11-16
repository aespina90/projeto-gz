<?php
        ob_start();
	session_start();
        include('../../../classes/valida_cookies.inc');
        include('../../../classes/valida_perm.inc');
	
	$usuario = $_SESSION['usuario'];
        $nota = $_SESSION['nota'];

        if($nota >70){
            echo "<script type='text/javascript'>
            alert('Você foi Aprovado com {$nota}% de acertos!');
            window.opener.location.reload();
            window.close();
            </script>";

        }else{

            echo "<script type='text/javascript'>
            alert('Você foi Reprovado com {$nota}% de acertos!');
            window.opener.location.reload();
            window.close();
            </script>";

        }




?>
