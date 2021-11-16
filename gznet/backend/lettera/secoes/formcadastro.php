<?php
/**
* ./vendedores/formcadastro.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Formul�rio de cadastro de vendedores.
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

//*** Leitura das vari�veis de formul�rio
    // A a��o � lida antes pois pode ser utilizada na fun_seguran�a
    $var_acao    = ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['acao'] ))) ;
    $var_acao    = substr ( strtoupper ( $var_acao ) , 0 , 1 ) ;

//*** Fun��o de seguran�a
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Leitura das vari�veis de formul�rio
    $var_id       = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
    $var_ordem    = ltrim (rtrim ( str_replace ( "'" , "" , str_replace ( " ", "%20", $_GET['ordem'] )))) ;
    $var_busca    = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['busca'] ))) ;
    $var_filtro   = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['filtro'] ))) ;
    $var_itens    = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['itens'] ))) ;
    $var_pagina   = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['pagina'] ))) ;

//*** Vari�veis locais
	// Nome da tabela
	$default['tabela']		= 'tbletterasecoes' ;
	// T�tulo do documento
	$default['titulo']		= 'Se&ccedil;&otilde;es do Lettera' ;

//*** Conex�o com o banco de dados
    if ( $var_acao == 'A' || $var_acao == 'C' )
    {
        $rs_sql        = 'SELECT * FROM '. $default['tabela'] .' WHERE id = "'. $var_id . '"' ;
        $rs_query    = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
        $rs_linhas    = mysql_num_rows ( $rs_query ) ;

        if ( $rs_linhas > 0 )
        {
            // Leitura do primeiro/pr�ximo registro
            $rs_dados = mysql_fetch_array ( $rs_query ) ;
        }
        else
        {
            $var_acao    = 'I' ;
            $var_id      = 0 ;
        }
    }
	Else
	{
		$var_acao    = 'I' ;
		$var_id      = 0 ;
	}

//*** Log de acesso
	fun_log ( $_SESSION[$session['iduser']] , $default['modulo'] , $var_acao , $rs_sql ) ;

	// Template: Cabe�alho do HTML
	require ( $template['headers'] ) ;
?>

<script language="JavaScript" type="text/javascript">
        function fVerificaForm(form,evento)
        {
            if (form.secao.value=="")
            {
                alert("Aten��o!\nO campo SE��O deve ser preenchido.");
                form.secao.focus();
                return false;
            }
        }
 </script>

<?php
//*** Inclus�es:
	// Menu da aplica��o
	require ( $include['menu'] ) ;
?>
<form action="processacadastro.php" enctype="multipart/form-data" method="post" name="formCadastro" id="formCadastro" onSubmit="return fVerificaForm(this,event);">
<input type="hidden" name="id" id="id" value="<?php print $var_id ; ?>" />
<input type="hidden" name="acao" id="acao" value="<?php print $var_acao ; ?>" />
<input type="hidden" name="ordem" id="ordem" value="<?php print $var_ordem ; ?>" />
<input type="hidden" name="busca" id="busca" value="<?php print $var_busca ; ?>" />
<input type="hidden" name="itens" id="itens" value="<?php print $var_itens ; ?>" />
<input type="hidden" name="pagina" id="pagina" value="<?php print $var_pagina ; ?>" />
<table width="760" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <th colspan="4">Cadastro de <?php print $default['titulo'] ; ?></th>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td >Se&ccedil;&atilde;o:</td>
        <td colspan="3"> <input name="secao" type="text" id="secao" value="<?php print $rs_dados['secao'] ; ?>" size="50" maxlength="64" /></td>
    </tr>
	<?php
    if ( $var_acao != 'C' )
    {?>
    <tr bgcolor="#f5f5f5">
		<td colspan="4" align="right"> <input type="submit" name="Submit" value="Gravar..." /></td>
    </tr>
	<?php }?>
</table>
</form>
<?php
//*** Inclus�es:
    // Rodap� da aplica��o
    require ( $include['footer'] ) ;
?>