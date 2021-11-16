<?php
	ob_start();
    session_start();
function alert($aviso) {
    echo "<script>alert('" . $aviso . "');</script>";
}
//obter valores registrados anteriormente no index
$user = $_POST['usuario'];
$senha = $_POST['senha'];
$senha = md5($senha);
//acessar db para fazer comparação
include '../classes/connect.class.php';
$conecta = new CONEXAO();
$conecta->Conecta();
$res = $conecta->Consulta("SELECT login, password, mural, treinamento, avaliacao, senhas, name, intranet, controle FROM users WHERE login='$user' AND password ='$senha'");
$linhas = mysql_fetch_row($res);
if (!$linhas) {
    alert("Usuário e/ou Senha Invalidos");
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
}
else if($linhas[7] == 0){
        alert("Acesso Negado");
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
}
else {
        $_SESSION['nome'] = $linhas[6];
        $_SESSION['usuario'] = $user;
        $_SESSION['senha'] = $senha;
	$_SESSION['mural'] = $linhas[2];
	$_SESSION['treinamento'] = $linhas[3];
	$_SESSION['avaliacao'] = $linhas[4];
	$_SESSION['senhas'] = $linhas[5];
	$_SESSION['controle'] = $linhas[8];
		
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=home/index.php'>"; //direciona para a pagina home
};
$conecta->Desconecta();
?>