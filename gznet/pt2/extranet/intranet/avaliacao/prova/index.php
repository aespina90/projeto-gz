<?php 
	session_start();
        $_SESSION['menu'] = 'avaliacao';
        $_SESSION['licao'] = 'questoes';
        $nome1 = $_GET['nome'];
        include('../../../classes/valida_perm.inc');
        include('../../../classes/valida_cookies.inc');
?>
<html>
<head>
<script type="text/javascript" src="bibliotecaAjax.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/dg_ctrl_questoes.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Questões: <?php echo$nome1; ?></title>
</head>
<body>
<div id="avisos">
<form name="formulario">
	<table id="minhaTabela" cellpadding="1" cellspacing="1">
		<tr>
			<td colspan="9" id="titulo"><strong>Cadastro De Questões</strong></td>
		</tr>
		<tr id="cabecalho">
			<td id="codigo"><strong>COD</strong></td>
			<td id="nome"><strong>Pergunta:</strong></td>
			<td id="r_certa"><strong>Correta</strong></td>
			<td id="r2"><strong>A2</strong></td>
			<td id="r3"><strong>A3</strong></td>
			<td id="r4"><strong>A4</strong></td>
			<td id="r5"><strong>A5</strong></td>
			<td id="editar"><strong>&nbsp;</strong></td>
			<td id="excluir"><strong>&nbsp;</strong></td>
		</tr>
<?php
$cod = $_GET['id'];
$_SESSION['cod']=$cod;
$con = mysql_connect('mysql02.gzsistemas.com.br', 'gzsistemas12', 'elearning8520') or die ("Erro de conexão");
$res1 = mysql_select_db('gzsistemas12') or die ("Banco de dados inexistente");
$res = mysql_query("select id, pergunta, r1, r2, r3, r4, r5 from aval_perguntas where id_provas = {$cod} ");
$total = mysql_num_rows($res);


for($i=0; $i<$total; $i++){
	$dados = mysql_fetch_row($res);
	$codigo = $dados[0];
	$pergunta = $dados[1];
	$r_certa = $dados[2];
	$r_2 = $dados[3];
	$r_3 = $dados[4];
	$r_4 = $dados[5];
	$r_5 = $dados[6];

	$idLinha = "linha$i";
	echo '<tr id="'.$idLinha.'">';
	echo '<td class="linhas" align="center">'.$codigo.'</td>';
	echo "<td class=\"linhas\">".substr($pergunta,0,20)."...</td>";
	echo "<td class=\"linhas\">".substr($r_certa,0,20)."...</td>";
	echo "<td class=\"linhas\">".substr($r_2,0,20)."...</td>";
	echo "<td class=\"linhas\">".substr($r_3,0,20)."...</td>";
	echo "<td class=\"linhas\">".substr($r_4,0,20)."...</td>";
	echo "<td class=\"linhas\">".substr($r_5,0,20)."...</td>";
	echo "<td class=\"linhas\"><a href=\"#\" onclick=\"EditarLinha('$idLinha', '$codigo', '$cod');\"><img src=\"../../../images/edit.jpg\" alt=\"Editar\" title=\"Editar\"></a></td>";
	echo "<td class=\"linhas\"><a href=\"#\" onclick=\"ExcluirLinha('$idLinha', '$codigo');\"><img src=\"../../../images/deleta.jpg\" alt=\"Excluir\" title=\"Excluir\"></a></td>";
	
}
echo '<tr>';
	echo "<td class=\"linhas\" colspan=\"9\" id=\"novo\"><a href=\"javascript:NovoRegistro();\"><img src=\"images/novo.gif\" alt=\"Novo Produto\" title=\"Novo Produto\" /></a></td>";


?>
</tr>
</table>
</form>






</div>
</body>
</html>