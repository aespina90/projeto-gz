<?php
session_start();
include('../../classes/valida_cookies.inc');
include('../../classes/valida_perm.inc');
?>
<?php
session_start();
$cod = $_SESSION['cod'];
include '../../classes/connect.class.php';
//$con = mysql_connect('mysql02.gzsistemas.com.br', 'gzsistemas12', 'elearning8520') or die ("Erro de conexão");
//$res = mysql_select_db('gzsistemas12') or die ("Banco de dados inexistente");
//import_request_variables("g");
$conexao=new CONEXAO();
$conexao->Conecta();
// Atualização do produto

if($_GET['acao'] == 'atualizar'){
			$sql = mysql_query("update tbl_usuarios set UF = '".$_GET['uf']."', NOME = '".$_GET['nome']."',LOGIN = '".$_GET['login']."',SENHA = '".$_GET['senha']."',CONTROLLER = '".$_GET['ct']."',AREA_RESTRITA = '".$_GET['ar']."',E_LEARNING = '".$_GET['el']."',PROTCLI = '".$_GET['pc']."',TS = '".$_GET['ts']."',EMAILGZ = '".$_GET['em']."',QUALITOR = '".$_GET['qw']."',FLB_STATUS = '".$_GET['ok']."' where cod = '".$_GET['cod']."'");
			$conexao->consulta($sql);
                        echo '1';
}

elseif($_GET['acao'] == 'excluir'){
			$sql = mysql_query("delete from tbl_usuarios where cod = '".$_GET['cod']."'");
			$conexao->consulta($sql);
                        echo '2';
}

elseif($_GET['acao'] == 'checar'){
			$sql = mysql_query("update tbl_usuarios set flb_obs = 0 where cod = '".$_GET['cod']."'");
			$conexao->consulta($sql);
                        echo '3';
}

?>