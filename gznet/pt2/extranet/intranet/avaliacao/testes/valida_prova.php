<?php
    ob_start();
    session_start();
    $usuario = $_SESSION['usuario'];
    $id_p=$_GET['id'];
    
    include('../../../classes/valida_cookies.inc');
    include('../../../classes/valida_perm.inc');
    include('../../../classes/connect.class.php');

    $conecta=new CONEXAO();
    $val = $conecta->consulta("select fim_prova from aval_resumo where user = '$usuario' and id_prova = $id_p");
    $v = mysql_fetch_row($val);
    
    $id_lesson = $conecta->consulta("SELECT lesson_id FROM aval_provas where id = $id_p");
    $id_l = mysql_fetch_row($id_lesson);


    $licao_completa = $conecta->consulta("SELECT completed FROM users_to_lessons where users_login = '$usuario' and lessons_id = $id_l[0]");
    $licao_c = mysql_fetch_row($licao_completa);



    if(!$v[0]){
        if($licao_c[0] == 1){
            header ("location: avaliacao.php?id=$id_p");
        }else{
        echo "<script type='text/javascript'>
            alert('Você precisa terminar essa lição no Treinamento Online GZ antes de fazer a prova')
            </script>";
            
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
        }

    }else{
        $nota = $conecta->consulta("select nota from aval_resumo where user = '$usuario' and id_prova = $id_p");
        $n = mysql_fetch_row($nota);

        echo "<script type='text/javascript'>
            alert('Você já concluiu essa lição, Você acertou {$n[0]}% dessa avaliação')
            </script>";

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
    }

?>