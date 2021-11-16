<?php
//*** Início da sessão
    session_start() ;

    $var_trab_nome					= Str_Replace ( "'", "´" , $_POST['trab_nome'] ) ;
	$var_trab_rg					= Str_Replace ( "'", "´" , $_POST['trab_rg'] ) ;
	$var_trab_cpf					= Str_Replace ( "'", "´" , $_POST['trab_cpf'] ) ;
	$var_trab_data_nasc				= Str_Replace ( "'", "´" , $_POST['trab_data_nasc'] ) ;
	$var_trab_endereco				= Str_Replace ( "'", "´" , $_POST['trab_endereco'] );
	$var_estado 					= Str_Replace ( "'", "´" , $_POST['estado'] );
	$var_trab_cidades				= Str_Replace ( "'", "´" , $_POST['trab_cidades'] );
	$var_trab_bairro				= Str_Replace ( "'", "´" , $_POST['trab_bairro'] );
	$var_trab_cep 					= Str_Replace ( "'", "´" , $_POST['trab_cep'] );
	$var_trab_telefone				= Str_Replace ( "'", "´" , $_POST['trab_telefone'] );
	$var_trab_telefone2				= Str_Replace ( "'", "´" , $_POST['trab_telefone2'] );
	$var_trab_email					= Str_Replace ( "'", "´" , $_POST['trab_email'] );
	$var_trab_formacao_academica	= Str_Replace ( "'", "´" , $_POST['trab_formacao_academica'] );
	$var_trab_curso					= Str_Replace ( "'", "´" , $_POST['trab_curso'] );
	$var_trab_instituicao			= Str_Replace ( "'", "´" , $_POST['trab_instituicao'] );
	$var_trab_ano_conclusao			= Str_Replace ( "'", "´" , $_POST['trab_ano_conclusao'] );
	$var_trab_pos_grad				= Str_Replace ( "'", "´" , $_POST['trab_pos_grad'] );
	$var_trab_curso2				= Str_Replace ( "'", "´" , $_POST['trab_curso2'] );
	$var_trab_instituicao2			= Str_Replace ( "'", "´" , $_POST['trab_instituicao2'] );
	$var_trab_ano_conclusao2		= Str_Replace ( "'", "´" , $_POST['trab_ano_conclusao2'] );
	$var_trab_pos_grad3				= Str_Replace ( "'", "´" , $_POST['trab_pos_grad3'] );
	$var_trab_curso3				= Str_Replace ( "'", "´" , $_POST['trab_curso3'] );
	$var_trab_instituicao3			= Str_Replace ( "'", "´" , $_POST['trab_instituicao3'] );
	$var_trab_ano_conclusao3		= Str_Replace ( "'", "´" , $_POST['trab_ano_conclusao3'] );
	$var_ingles						= Str_Replace ( "'", "´" , $_POST['ingles'] );
	$var_ingles						= Str_Replace ( "'", "´" , $_POST['ingles'] );
	$var_espanhol					= Str_Replace ( "'", "´" , $_POST['espanhol'] );
	$var_outros						= Str_Replace ( "'", "´" , $_POST['outros'] );
	$var_outro_idioma			 	= Str_Replace ( "'", "´" , $_POST['outro_idioma'] );
	$var_outro						= Str_Replace ( "'", "´" , $_POST['outros'] );
	$var_trab_empresa				= Str_Replace ( "'", "´" , $_POST['trab_empresa'] );
	$var_trab_admissao				= Str_Replace ( "'", "´" , $_POST['trab_admissao'] );
	$var_trab_desligamento			= Str_Replace ( "'", "´" , $_POST['trab_desligamento'] );
	$var_trab_funcao				= Str_Replace ( "'", "´" , $_POST['trab_funcao'] );
	$var_descricao_atividades		= Str_Replace ( "'", "´" , $_POST['descricao_atividades'] );
	$var_qualificacoes				= Str_Replace ( "'", "´" , $_POST['qualificacoes'] );
	$var_funcao_pretendida			= Str_Replace ( "'", "´" , $_POST['funcao_pretendida'] );
	$var_pq_trabalhar				= Str_Replace ( "'", "´" , $_POST['pq_trabalhar'] );

        $email_padrao           = "gznet@gznet.com.br";


	$nCorpoEmail = '<html>
	<head>
		<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas - Trabalhe Conosco</title>
	</head>
	<body>
	<table>
	<tr>
		<td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="3" color="#FFFFFF"><strong>Trabalhe Conosco</strong></font></td>
	</tr>
	<tr>
		<td width="140"><font face="Verdana" size="2"><strong>Nome Completo:</strong></font></td>
		<td><font face="Verdana" size="2">'.$var_trab_nome.'</font></td>
	</tr>
	<tr>
		<td width="140"><font face="Verdana" size="2"><strong>RG:</strong></font></td>
		<td><font face="Verdana" size="2">'.$var_trab_rg.'</font></td>
	</tr>
	<tr>
		<td><font face="Verdana" size="2"><strong>CPF:</strong></font></td>
		<td><font face="Verdana" size="2">'.$var_trab_cpf.'</font></td>
	</tr>
	<tr>
		<td><font face="Verdana" size="2"><strong>Data de Nascimento:</strong></font></td>
		<td><font face="Verdana" size="2">'.$var_trab_data_nasc.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Endereço:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_endereco.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Estado:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_estado.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Cidade:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_cidades.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Bairro:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_bairro.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>CEP:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_cep.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Telefone:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_telefone.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Telefone:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_telefone2.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>E-mail:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_email.'</font></td>
	</tr>

	<tr>
	   <td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="2" color="#FFFFFF"><strong>Formação Acadêmica</strong></font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Grau de Instrução:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_formacao_academica.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Curso:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_curso.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Instituição:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_instituicao.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Ano de Conclusão:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_ano_conclusao.'</font></td>
	</tr>

	<tr>
	   <td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="2" color="#FFFFFF"><strong>Pós-Graduação / Especialização / Treinamento:</strong></font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Grau de Instrução:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_pos_grad.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Curso:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_curso2.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Instituição:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_instituicao2.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Ano de Conclusão:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_ano_conclusao2.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Grau de Instrução:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_pos_grad3.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Curso:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_curso3.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Instituição:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_instituicao3.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Ano de Conclusão:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_ano_conclusao3.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Inglês:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_ingles.'</font></td>
	</tr>

	<tr>
	   <td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="2" color="#FFFFFF"><strong>Idiomas</strong></font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Inglês:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_ingles.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Espanhol:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_espanhol.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Espanhol:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_outros.'</font></td>
	</tr>


	<tr>
		<td><font face="Verdana" size="2"><strong>Outros Idiomas (especificar):</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_outro_idioma.' - '. $var_outro .'</font></td>
	</tr>

	<tr>
	    <td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="2" color="#FFFFFF"><strong>Histórico Profissional</strong></font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Empresa:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_empresa.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Admissão:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_admissao.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Desligamento:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_desligamento.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Função:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_trab_funcao.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Descrição das Atividades Envolvidas:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_descricao_atividades.'</font></td>
	</tr>

	<tr>
	    <td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="2" color="#FFFFFF"><strong>Suas qualificações</strong></font></td>
	</tr>


	<tr>
		<td><font face="Verdana" size="2"><strong>Destaque aqui todas as suas qualificações:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_qualificacoes.'</font></td>
	</tr>

	<tr>
	    <td bgcolor="#7a7a7a" colspan="3" align="center"><font face="Verdana" size="2" color="#FFFFFF"><strong>Função Pretendida</strong></font></td>
	</tr>


	<tr>
		<td><font face="Verdana" size="2"><strong>Descreva abaixo a função que deseja exercer na GZ Sistemas:</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_funcao_pretendida.'</font></td>
	</tr>

	<tr>
		<td><font face="Verdana" size="2"><strong>Porque gostaria de trabalhar na GZ Sistemas?</strong></font></td>
		<td colspan="2"><font face="Verdana" size="2">'.$var_pq_trabalhar.'</font></td>
	</tr>
	</table>
	</body>
	</html>';


	// monta cabeçalho
    if ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'WIN' ))
    {
      $eol="\r\n";
    }
    elseif ( strtoupper ( substr ( PHP_OS , 0 , 3 ) == 'MAC' ))
    {
      $eol="\r";
    }
    else
    {
      $eol="\n";
    }

    $headers  = "MIME-Version: 1.0" . $eol;
    $headers .= "Content-type: text/html; charset=iso-8859-1" . $eol;
    $headers .= "From: ".$var_trab_nome." <".$var_trab_email."> " . $eol;

    mail("contato@gzsistemas.com.br","[GZ Sistemas] Trabalhe Conosco",$nCorpoEmail,$headers);
    mail($email_padrao,"[GZ Sistemas] Trabalhe Conosco",$nCorpoEmail,$headers);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<LINK REL="SHORTCUT ICON" href="imagens/logo.gif"><title>GZ Sistemas</title>
<script type="text/javascript" src="funcoes.js"></script>

<link rel="stylesheet" href="css.css" type="text/css"/>

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
	<meta name="copyright" content="Copyright 2006 - Lógica Digital"/>
	<meta name="author" content="Lógica Digital"/>
	<meta http-equiv="reply-to" content="root@gznet.com.br"/>
    <meta http-equiv="Content-Language" content="pt-BR"/>
	<meta name="target_country" content="br"/>
	<meta name="country" content="Brazil"/>

<script language="JavaScript">
function mostra(campo)
{
    document.getElementById(campo).style.display='' ;
}
function oculta(campo)
{
    document.getElementById(campo).style.display='none' ;
}
</script>
</head>

<body>

<!--inicio da tabela geral-->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="bg_fundo_tabela">
  <tr>
    <td align="center" valign="top">
	  <!--inicio da tabela principal-->
      <table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>

          <td align="center" valign="top">
            <!--inicio da tabela do Topo-->
            <?php include("inc_topo.php"); ?>
            <!--inicio da tabela meio-->
            <table width="775" border="0" cellspacing="0" cellpadding="0">
				<tr>

                <td width="527" height="586" align="center" valign="top"> <br>
                  <table width="500" border="0" cellspacing="0" cellpadding="0">
                    <tr>

                      <td><img src="imagens/img_revendas_pq.jpg"></td>
					</tr>

					<tr>
                      <td height="105">
                        <div class="texto_geral"><br>
								 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem<br>
						 	     Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is<br>
						         simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply<br>
						         dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy<br>
						         text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of<br>
						         the printing and typesetting industry.Lorem Ipsum is simply dummy text of the<br>
							     printing and typesetting industry.
								</div></td>
				    </tr>

					<tr>
					<td><br><img src="imagens/img_trabalheconosco_pq.jpg"></td>
					</tr>
					<tr>
					<td><br>
                        <div class="texto_geral">Obrigado. Seus dados foram enviados
                          com sucesso.</div></td>
					</tr>
					</table>
                </td>

                <td width="10" valign="top"><img src="imagens/img_linha_vertical.jpg" width="2" height="597" style="margin-left:0;_margin-left:1px;"></td>

                	<td width="240" align="center" valign="top">

					<!--inicio da tabela lateral-->
					<?php include("inc_lateral.php"); ?>

                   </td>
				   </tr>
			       </table>

			<!--inicio do rodape-->
			 <?php include("inc_rodape.php"); ?>

            <!--fim da tabela principal-->
          </td>
		  </tr>
		</table>

      <!--fim da tabela geral-->
    </td>
  </tr>
</table>
</body>
</html>
