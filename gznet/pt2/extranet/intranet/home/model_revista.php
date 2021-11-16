<?php

// Buscando Informa��es das publica��es do M�s
include('../../classes/connect.class.php');
include('../../classes/valida_cookies.inc');
$data = date(mY);
$conexao = new CONEXAO();
$conexao->Conecta();
$sql = $conexao->Consulta("SELECT * FROM tbl_revista WHERE data = '{$data}'");
$num = mysql_num_rows($sql);
$num = $num + 1;
// Pasta onde o arquivo vai ser salvo
$dir = '' . $data . '/pages/';
$_UP['pasta'] = $dir;

// Tamanho m�ximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
// Array com as extens�es permitidas
$_UP['extensoes'] = array('jpg');

// Renomeia o arquivo? (Se true, o arquivo ser� salvo como .jpg e um nome �nico)
$_UP['renomeia'] = true;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'N�o houve erro';
$_UP['erros'][1] = 'O arquivo no upload � maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'N�o foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("N�o foi poss�vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execu��o do script
}

// Caso script chegue a esse ponto, n�o houve erro com o upload e o PHP pode continuar
// Faz a verifica��o da extens�o do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com a extens�o: jpg";
}

// O arquivo passou em todas as verifica��es, hora de tentar mov�-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extens�o .jpg
        $nome_final = '0' . $num . '.jpg';
    } else {
// Mant�m o nome original do arquivo
        $nome_final = $_FILES['arquivo']['name'];
    }

// Depois verifica se � poss�vel mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        $caminho = 'page src=' . chr(34) . 'pages' . chr(47) . '' . $nome_final . '' . chr(34) . '';
        $sql = $conexao->Consulta("INSERT into tbl_revista VALUES (null,'{$caminho}','{$data}')  ");
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo$
    } else {
// N�o foi poss�vel fazer o upload, provavelmente a pasta est� incorreta
        echo "N�o foi poss�vel enviar o arquivo, tente novamente";
    }
// Gerando XML da Revista
    // Definindo diret�rio do XML
    $dir2 = '' . $data . '/xml/Pages.xml';
    // Apagando XML antigo
    unlink($dir2);
    //echo $dir2;
    //Criando novo XML
    $sql = $conexao->Consulta("SELECT url FROM tbl_revista WHERE data = '{$data}' order by abs(id) asc");
    $fp = fopen("$dir2", "a");
    $i = 0;

    // print_r($links[6]);
    fwrite($fp, "<content width='368' height='450' bgcolor='cccccc' loadercolor='ffffff' panelcolor='5d5d61' buttoncolor='5d5d61' textcolor='ffffff' tellafriendmode='auto'>
<page src='pages/capa.jpg'/>\n");
    while ($url = mysql_fetch_array($sql)) {
        fwrite($fp, "<{$url["url"]}/>\n");
        $i++;

    }
    $tmp_pag = $num;
    $resto=($tmp_pag % 2);
    if($resto == 0 ){
    fwrite($fp, "<page src='pages/capa.jpg'/>\n");
    }
    fwrite($fp, "</content>\n");
    fclose($abre);
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=revista.php'>";
    }
?>
