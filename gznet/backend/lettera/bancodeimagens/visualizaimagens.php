<?php
/**
* ./enquete/formcadastro.php
* @author Jo�o V�tor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Formul�rio de Enquete.
*/

//*** In�cio da sess�o
    session_start() ;

//*** N�vel da p�gina
    $default['nivel'] = '../../' ;
    $default['modulo'] = 2 ;

//*** Inclus�es:
    // Configura��es da aplica��o
    require ( $default['nivel'] . 'global.php' ) ;
    // Conex�o com o banco de dados
    require ( $include['conexao'] ) ;
    // Fun�oes
    require ( $include['funcao'] ) ;

//*** Fun��o de seguran�a
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , 'C' , $default['nivel'] ) ;
	
//*** Leitura das vari�veis de formul�rio
    $var_id       = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
	
//*** Vari�veis locais
	// Nome da tabela
	$default['tabela']		= 'tbletteraimagens' ;
	// T�tulo do documento
	$default['titulo']		= 'Visualiza&ccedil;&atilde;o de Imagem' ;
	
	//Fazendo SELECT na tabela tbEnquetes
	$rs_sql       = "SELECT * FROM ". $default['tabela'] ." WHERE id = " .$var_id ;
    $rs_query     = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
    $rs_linhas    = mysql_num_rows ( $rs_query ) ;
	
	//Retorna numero de registros encontrados
	$rs_linhas = mysql_num_rows( $rs_query ) ;
	
	//Listando registros encontrados
	for ($cont_i=0; $cont_i <$rs_linhas; $cont_i++)
    {
		$rs_dados = mysql_fetch_array( $rs_query ) ;
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql ) ;

	// Template: Cabe�alho do HTML
	require ( $template['headers'] ) ;
?>
<script type="text/javascript">
	//Valida��o do Formul�rio
	function fVerificaForm(form,evento){
		if (form.pergunta.value==""){
			alert("Aten��o!\nO campo PERGUNTA deve ser preenchido.");
			form.pergunta.focus();
			return false;}
		if (form.opcao1.value==""){
			alert("Aten��o!\nO campo OP��O 1 deve ser preenchido.");
			form.opcao1.focus();
			return false;}
		if (form.opcao2.value==""){
			alert("Aten��o!\nO campo OP��O 2 deve ser preenchido.");
			form.opcao2.focus();
			return false;}
	}
	</script>
<form name="formCadastro" method="post" action="processacadastro.php" onSubmit="return fVerificaForm(this,event);">
<input type="hidden" name="id" id="id" value="<?php echo $var_id?>" />
<input type="hidden" name="acao" id="acao" value="<?php echo $var_acao?>" />
<input type="hidden" name="ordem" id="ordem" value="<?php echo $var_ordem?>" />
<input type="hidden" name="busca" id="busca" value="<?php echo $var_busca?>" />
<input type="hidden" name="itens" id="itens" value="<?php echo $var_itens?>" />
<input type="hidden" name="pagina" id="pagina" value="<?php echo $var_pagina?>" />
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC" align="center">
    <tr bgcolor="#FFFFFF"> 
    	<td valign="top" align="center" ><img src="../<?php print  $default['nivel'] ; ?>dbimagens/<?php print $rs_dados['arquivo'] ; ?>" alt="<?php print $rs_dados['descricao'] ; ?>" border="0"></td>
    </tr>
	<tr bgcolor="#FFFFFF"> 
    	<td valign="top" align="center" ><?php print $rs_dados['descricao'] ; ?></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
    	<td valign="top" align="center" ><a href="javascript:window.close();">Fechar Janela</a></td>
    </tr>
</table>
</form>