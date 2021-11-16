<?php
    $menu = $_SESSION['menu'];
    $licao = $_SESSION['licao'];
    $acessos[0] = $_SESSION['mural'];
    $acessos[1] = $_SESSION['treinamento'];
    $acessos[2] = $_SESSION['avaliacao'];
    $acessos[3] = $_SESSION['senhas'];

    if($menu == 'avaliacao' && $licao == 'prova'){
        if($acessos[2] < 3){
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../../home/index.php'>";
        }
    }

    if($menu == 'avaliacao' && $licao == 'questoes'){
        if($acessos[2] < 3){
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../../home/index.php'>";
        }
    }

    if($menu == 'avaliacao' && $licao == 'relatorios'){
        if($acessos[2] < 2){
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../../home/index.php'>";
        }
    }

    if($menu == 'avaliacao' && $licao == 'testes'){
        if($acessos[2] < 1){
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=../../home/index.php'>";
        }
    }
?>