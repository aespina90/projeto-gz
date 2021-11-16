<?php
/**
* ./enquete/formcadastro.php
* @author João Vítor Molinari projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Formulário de Enquete.
*/

//*** Início da sessão
    session_start() ;

//*** Nível da página
    $default['nivel'] = '../../' ;
    $default['modulo'] = 2 ;

//*** Inclusões:
    // Configurações da aplicação
    require ( $default['nivel'] . 'global.php' ) ;
    // Conexão com o banco de dados
    require ( $include['conexao'] ) ;
    // Funçoes
    require ( $include['funcao'] ) ;

//*** Função de segurança
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , 'C' , $default['nivel'] ) ;
	
//*** Leitura das variáveis de formulário
    $var_id       = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
	
//*** Variáveis locais
	// Nome da tabela
	$default['tabela']		= 'tbletteraimagens' ;
	// Título do documento
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

	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;
?>
<script type="text/javascript">
	//Validação do Formulário
	function fVerificaForm(form,evento){
		if (form.pergunta.value==""){
			alert("Atenção!\nO campo PERGUNTA deve ser preenchido.");
			form.pergunta.focus();
			return false;}
		if (form.opcao1.value==""){
			alert("Atenção!\nO campo OPÇÃO 1 deve ser preenchido.");
			form.opcao1.focus();
			return false;}
		if (form.opcao2.value==""){
			alert("Atenção!\nO campo OPÇÃO 2 deve ser preenchido.");
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