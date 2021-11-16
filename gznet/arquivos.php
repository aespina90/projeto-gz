<?php
/* Inicio de todo código php */
session_start();
/* Includes */
require ('inc_conexao_interno.php');
require ('inc_funcoes.php');

$id = $_SESSION['iduser'];

if ( $id == '' ) header('location: index.php');

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 06 Jan 1990 00:00:01 GMT"); 

$sql = 'SELECT * FROM tbcategoria WHERE status="A" ORDER BY descricao';
$query = mysql_query($sql,$conexao['conexao'])or die(mysql_error());
$linhas = mysql_num_rows($query);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="resource-type" content="document"/>
		<meta http-equiv="Expires" content="-1"/>
		<meta http-equiv="pragma" content="no-cache"/>
		<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT"/>
		<meta name="revisit-after" content="10"/>
		<meta name="classification" content="Site Venda de Sistemas"/>
		<meta name="description" content="Software de automação comercial, frente de loja e retaguarda.TEF. Consultoria para supermercados. Equipamentos em geral. Computadores, no-breaks, impressoras fiscais"/>
		<meta name="keywords" content="Sistema comercial, software, tef, ecf, mfd, frente de loja, retaguarda, consultoria, computador, impressoras fiscais, no-breaks, leitores, periféricos, equipamentos de informatica, microterminal, programas, ti, tecnologia de informação."/>
		<meta name="robots" content="ALL"/>
		<meta name="googlebot" content="INDEX, FOLLOW"/>
		<meta name="distribution" content="Global"/>
		<meta name="rating" content="General"/>
		<meta name="copyright" content="Copyright 2006 - GZ Sistemas"/>
		<meta name="author" content="GZ Sistemas"/>
		<meta http-equiv="reply-to" content="root@gznet.com.br"/>
		<meta http-equiv="Content-Language" content="pt-BR"/>
		<meta name="target_country" content="br"/>
		<meta name="country" content="Brazil"/>

		<title>GZ Sistemas</title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="gz/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="gz/css/social-icons.css" type="text/css" media="screen" />
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->	
		
		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->
		
		<!-- JS -->
		<script type="text/javascript" src="gz/js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="gz/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="gz/js/easing.js"></script>
		<script type="text/javascript" src="gz/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="gz/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="gz/js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="gz/js/jquery.isotope.min.js"></script>

	</head>


<body>

<?php include("inc_topo.php"); ?>
<!--inicio da tabela geral-->
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela" align="center">
	<tr>
		<td align="center" valign="top">
			<!--inicio da tabela meio-->
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="105">

						<div class="texto_geral">
<!--
							<p style="margin-top:10px; font-size:15px; font-family:verdana;">Faça o seu cadastro enviando um email para <a href="mailto:novaversao@gznet.com.br" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: red">novaversao@gznet.com.br</a> e receba automaticamente um email sempre que houver uma nova versão ou release.</p><br/>
							<p style="margin-top:10px; font-size:15px; font-family:verdana;">Para efetuar o download de arquivos com extensão <strong>.ARJ</strong> utilizar o <a href="http://windows.microsoft.com/pt-BR/internet-explorer/products/ie/home" target="_blank" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">Internet Explorer</a> ou <a href="http://www.google.com/chrome?hl=pt-BR" target="_blank" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">Google Chrome</a>.</p><br/>
-->
							<p style="margin-top:10px; font-size:12px; font-family:verdana;">Bem vindo ao Portal GZ Net - Área Restrita!<br><br>Conheça as <a href="PDF/GZNET_BOAS_PRATICAS_AREA_RESTRITA.pdf" target="_new" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: red">boas práticas<a> de uso desta ferramenta, pois aqui estarão disponíveis as Apresentações, Manuais e Versões mais atuais dos produtos GZ Sistemas.</p><br/>
							<p style="margin-top:10px; font-size:12px; font-family:verdana;">Conheça também o ambiente <a href="PDF/GZNET_REGRAS_DE_USO_FTP.pdf" target="_new" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">FTP GZ Net</a>. Arquivos podem ser disponibilizados em caráter especial neste serviço.</p><br/>
							<br>
<!--
							<p style="margin-top:10px; font-size:12px; font-family:verdana;">Você também pode baixar a lista de implementações da versão corrente do GZ Flex clicando <a href="PDF/FLEX_VERSAO.pdf" target="_new" style="margin-top:10px; font-family:verdana; text-decoration:underline; color: blue">aqui</a>. </p><br/>
-->
							<p style="margin-top:10px; font-size:12px; font-family:verdana;">Você também pode baixar a lista de implementações de cada versão, nas seções abaixo. </p><br/>

							<br/>
							<p style="font-size:15px;"><strong>ARQUIVOS E ATUALIZAÇÕES</strong></p>
						</div>

						<?php
						for($cont=1; $cont<=$linhas; $cont++) {

							$dados = mysql_fetch_assoc($query); ?>

							<div class="texto_geral" style="padding-left:20px;"><br/>
							<p><strong>* <?php echo $dados['descricao']?></strong><p>

							<?php

							$sql_secao    = 'SELECT * FROM tbsecao WHERE categoria = "'.$dados['categoria'].'" AND status="A" ORDER BY secao';
							$query_secao  = mysql_query($sql_secao,$conexao['conexao']);
							$linhas_secao = mysql_num_rows($query_secao);

							for($cont_secao=1; $cont_secao<=$linhas_secao; $cont_secao++) {

								$dados_secao = mysql_fetch_assoc($query_secao);

								if($dados_secao['atualizando']!='S') {
								?>
									<a href="arquivos_interna.php?secao=<?php echo $dados_secao['id']?>&obs=<?php echo $dados_secao['obs']?>&nome_secao=<?php echo $dados_secao['secao'];?>">
									<u><?php echo $dados_secao['secao'];?></u></a><br/>
								<?php
								} else {
								?>
									<br><p style="font: regular 22px Tahoma;">
									<?php echo $dados_secao['secao'];?>
									<strong>(EM PROCESSO DE ATUALIZAÇÃO)</strong>
									</p><br>
								<?php
								}

							} ?>
							</div>   
						<?php
						}
						?>

					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php include("inc_rodape.php"); ?>
</body>
</html>