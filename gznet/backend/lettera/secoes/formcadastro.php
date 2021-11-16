<?php
/**
* ./vendedores/formcadastro.php
* @author Maikel Finck projetos@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Formulário de cadastro de vendedores.
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

//*** Leitura das variáveis de formulário
    // A ação é lida antes pois pode ser utilizada na fun_segurança
    $var_acao    = ltrim ( rtrim ( str_replace ( "'" , "" , $_GET['acao'] ))) ;
    $var_acao    = substr ( strtoupper ( $var_acao ) , 0 , 1 ) ;

//*** Função de segurança
    fun_seguranca ( $_SESSION[$session['iduser']] , $_SESSION[$session['idgrupo']] , $default['modulo'] , $var_acao , $default['nivel'] ) ;

//*** Leitura das variáveis de formulário
    $var_id       = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['id'] ))) ;
    $var_ordem    = ltrim (rtrim ( str_replace ( "'" , "" , str_replace ( " ", "%20", $_GET['ordem'] )))) ;
    $var_busca    = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['busca'] ))) ;
    $var_filtro   = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['filtro'] ))) ;
    $var_itens    = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['itens'] ))) ;
    $var_pagina   = ltrim (rtrim ( str_replace ( "'" , "" , $_GET['pagina'] ))) ;

//*** Variáveis locais
	// Nome da tabela
	$default['tabela']		= 'tbletterasecoes' ;
	// Título do documento
	$default['titulo']		= 'Se&ccedil;&otilde;es do Lettera' ;

//*** Conexão com o banco de dados
    if ( $var_acao == 'A' || $var_acao == 'C' )
    {
        $rs_sql        = 'SELECT * FROM '. $default['tabela'] .' WHERE id = "'. $var_id . '"' ;
        $rs_query    = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
        $rs_linhas    = mysql_num_rows ( $rs_query ) ;

        if ( $rs_linhas > 0 )
        {
            // Leitura do primeiro/próximo registro
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

	// Template: Cabeçalho do HTML
	require ( $template['headers'] ) ;
?>

<script language="JavaScript" type="text/javascript">
        function fVerificaForm(form,evento)
        {
            if (form.secao.value=="")
            {
                alert("Atenção!\nO campo SEÇÃO deve ser preenchido.");
                form.secao.focus();
                return false;
            }
        }
 </script>

<?php
//*** Inclusões:
	// Menu da aplicação
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
//*** Inclusões:
    // Rodapé da aplicação
    require ( $include['footer'] ) ;
?>