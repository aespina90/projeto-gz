<?php
    ob_start();

    include('../../../classes/connect.class.php');

    $conexao = new CONEXAO();
    $conexao->Conecta();


    $licao[0] = $_POST['opt1'];

    $dados = $conexao->consulta("SELECT name, directions_ID FROM lessons where id = $licao[0]");
    $d = mysql_fetch_row($dados);

    $comparar = $conexao->consulta("select * from aval_provas where lesson_id =$licao[0]");
    $c = mysql_fetch_row($comparar);

    if(!$c){
        $conexao->consulta("insert into aval_provas values (null, '$d[0]', $d[1], $licao[0] )");
        echo "<script type='text/javascript'>
            alert('Lição Inserida com Sucesso');
            </script>";

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=avaliacao.php'>";

    }else{
        echo "<script type='text/javascript'>
            alert('Essa lição já esta Inserida');
            </script>";

        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=avaliacao.php'>";
    }

?>