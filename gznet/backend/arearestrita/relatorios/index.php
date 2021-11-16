<?php
session_start();
$default['nivel'] = '../../';
$default['modulo'] = 5;
require($default['nivel'].'global.php');
require($include['conexao']);
require($include['funcao']);
require($template['getpost']);
fun_seguranca($_SESSION[$session['iduser']],$_SESSION[$session['idgrupo']],$default['modulo'],'C',$default['nivel']);
$default['filtro'] = 'id';
$default['ordem'] = 'l.data DESC';
$default['busca'] = 'arquivo';
$default['tabela'] = 'logarquivos';
$default['titulo'] = 'Relatórios';
$default['campos'] = 'registros encontrados.';
$default['registro'] = 'regsitro encontrado.';
require($template['valvars']);
$rs_teste = '';
$var_usuario = $_POST['categoria'];
$var_busca= $_POST['busca'];
$var_completo= $_POST['completo'];

require($template['headers']);
if ($var_busca == ''){ $data='now()';}
else {$data = "'".$var_busca."'";}

$rs_sql     = "SELECT DATE(l.data) data, TIME(l.data) hora, u.nome usuario, s.secao, sub.sub_secao subsecao, a.nome, ip FROM logarquivos l
LEFT JOIN tbarearestrita u on u.id = l.usuario
LEFT JOIN tbarquivos a on a.id = l.arquivo
LEFT JOIN tbsubsecao sub on a.sub_secao = sub.id
LEFT JOIN tbsecao s on sub.secao = s.id
";


if($var_usuario == '' || $var_usuario == 'Todos'){
					$rs_sql.="WHERE DATE_FORMAT(l.data,'%Y/%m/%d') = DATE_FORMAT(".$data.",'%Y/%m/%d')";
 }else { 
		if($var_completo == ''){
												$rs_sql.="WHERE DATE_FORMAT(l.data,'%Y/%m/%d') = DATE_FORMAT(".$data.",'%Y/%m/%d') AND u.nome = '".$var_usuario."'";
		}else{
												$rs_sql.="WHERE u.nome = '".$var_usuario."'";
		}
}

if($var_ordem != '') {
  $rs_sql .= ' ORDER BY '.$var_ordem.', l.data DESC ';
} else {
  $rs_sql .= ' ORDER BY ,l.data, u.usuario DESC';
}

if($var_completo == 'completo'){
	$rs_sql.=' limit 1000';
}
//echo $rs_sql;
//echo "<br />";
$rs_query   = mysql_query($rs_sql, $conexao['conexao']);
$rs_linhas  = mysql_num_rows($rs_query);
?>
<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
</head>
<script language="JavaScript" type="text/javascript">
function jValidaBusca(form){
	if(form.busca.value == ""){
		alert("Por favor, preencha o campo BUSCA corretamente.");
		form.busca.focus();
		return false;
	}
}
function jValidaExclusao(jURL){
	jMsg = "Deseja realmente excluir o registro ?";
	input_box=confirm(jMsg);
	if(input_box==true){
		location.href = jURL;
	}
}
</script>
<?php require($include['menu']);?>
<form action="index.php" name="formItens" id="formItens" method="post">
<table width="960" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<th colspan="10">Relatório de Download  <?php if($data !='now()'){echo "do Dia ".$data;}?></th>
	</tr>
	<tr>
		<td align="center" bgcolor="#EBEBEB" colspan="6"><a href="index.php"><img src="<?php echo $folders['icones'];?>ico_lista.gif" alt="Listar todos os registros" title="Listar todos os registros" hspace="5" border="0" align="right" /></a>
        <input style="border: 0px;" type="image" src="<?php echo $folders['icones'];?>ico_buscar.gif" alt="Buscar" title="Buscar" align="right" />
		Buscar Usuário:

<select name="categoria">
<option value="Todos">Todos</option>
<?php
$sql_cat=mysql_query("SELECT u.nome FROM tbarearestrita u ORDER BY nome ASC") or die(mysql_error());
while($result_sql_cat = mysql_fetch_object($sql_cat)){
echo '<option value="'.$result_sql_cat->nome.'">'.$result_sql_cat->nome.'</option>';
}
?>
<!--  -->
</select>
		
		<script>
	$(function() {
		$( "#busca" ).datepicker({ dateFormat: 'yy/mm/dd' });
	});
	</script>

        | Buscar Data:</font> <input name="busca" type="text" id="busca" value="<?php echo $var_busca;?>" size="24" maxlength="24" /> | <input type="checkbox" name="completo" id="completo" value="completo"> Completo |
      </td>	
	</tr>
    <tr bgcolor="#F7F7F7">
		<td width="420" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=u.nome%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=u.nome&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Usuario</strong></td>
		<td width="220" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=s.secao%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=s.secao&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Seção</strong></td>
		<td width="220" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=sub.sub_secao%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=sub.sub_secao&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Sub-Seção</strong></td>
		<td width="400" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=a.nome%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=a.nome&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Arquivo</strong></td>
		<td width="220" align="center" bgcolor="#F7F7F7"><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=l.data%20desc&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_decres.gif" alt="Ordenar de Z a A" border="0" align="right" /></a><a href="?pagina=<?php echo $var_pagina;?>&amp;ordem=l.data&amp;busca=<?php echo $var_busca;?>&amp;itens=<?php echo $var_itens;?>"><img src="<?php echo $folders['icones'];?>ico_ordem_cres.gif" alt="Ordenar de A a Z" align="right" border="0" /></a><strong>Data/Hora</strong></td>
		<td width="200" align="center"><strong>IP</strong></td>
    </tr>
	<?php
	if($rs_linhas > 0){
		for($cont_i=0; $cont_i<$rs_linhas; $cont_i++){
			$rs_dados = mysql_fetch_array($rs_query);
			if(trim(strtoupper($rs_dados['status'])) == "A"){
				$var_status = $folders['icones']."ico_ativo_on.gif";
				$var_texto_status = 'Ativo';
			}
			else{
				$var_status = $folders['icones']."ico_ativo_off.gif";
				$var_texto_status = 'Inativo';
			}
	?>
    <tr bgcolor="#FFFFFF" onMouseOver="this.bgColor='#ededed';" onMouseOut="this.bgColor='#ffffff';">
		<td align="center"><?php echo $rs_dados['usuario'];?></td>
		<td align="center"><?php echo $rs_dados['secao'];?></td>
		<td align="center"><?php echo $rs_dados['subsecao'];?></td>
		<td align="center"><?php echo $rs_dados['nome'];?></td>
		<td align="center"><?php echo fun_tratamento_data($rs_dados['data'],'L');echo "<br />";echo  $rs_dados['hora'];?></td>
		<td align="center"><?php echo $rs_dados['ip'];?></td>
		    </tr>
	<?php }
	}	?>
	<tr align="left" bgcolor="#F7F7F7">
		<td colspan="11">
			<font size="2" face="Trebuchet MS"><strong><?php echo $rs_linhas;?></strong>&nbsp;<?php $rs_linhas > 1 ? print $default['campos'] : print $default['registro'];?></font>
		</td>
	</tr>
	<tr align="left" bgcolor="#FFFFFF">
		<td colspan="11" align="right">
			<?php fun_paginacao($var_pagina,$var_totalpaginas,'txt_col',2,$var_itens,$var_ordem,$var_busca);?>
		</td>
	</tr>
</table>
</form>
<?php require($include['footer']);?>