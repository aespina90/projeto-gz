<?php
/**
* ./includes/inc_funcoes.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 Lógica Digital
* Descrição: Lista de funcoes da aplicação.
*/
/**
* Lista de Funções
* fun_pri_envia_mensagem ( mensagem )
* fun_cumprimento ()
* fun_data_lettera ( $data_lettera )
* fun_tratamento_data ( data , var_acao )
* fun_seguranca ( id_usuario , id_grupo , id_modulo , var_acao , pag_nivel )
* fun_log
* fun_paginacao
* WARNING: Função de Segurança - Erro 3 desabilitado
*/
/**
 * Retorna uma data baseada na soma ou subtracao de
 * outra data
 *
 * @param    string   $data   A data original
 * @param    string   $inc    Dias apos a data
 * @param    string   $dec    Dias antes da data
 * @param    string   $modo   Formatacao da data
 * @return   array   Data (anterior, original, posterior)
 * @access   public
 * @author   Maikel Finck <maikel@logicadigital.com.br>
 */

 function fun_tratamento_moeda ( $var_valor )
{
			// Configura o valor para visualizaç&atilde;o de moeda
			setlocale(LC_MONETARY, 'pt_BR');
			$var_moeda = localeconv ();
			$var_moeda = $var_moeda['currency_symbol'] .' '. money_format ( '%!n' , $var_valor) ;
                        return $var_moeda;
}

 function fun_calcula_espaco_de_tempo ( $data , $inc , $dec , $modo = 'd/m/Y H:i:s' )
{
	// Gera o multiplicador
	$multiplicador = 60 * 60 * 24 ;
	// Calcula a data a ser decrementada
	$data_dec = date ( $modo , $data - ( $multiplicador * $dec )) ;
	// Calcula a data a ser decrementada
	$data_inc = date ( $modo , $data + ( $multiplicador * $inc )) ;
	// Retorna as datas
	return array ( $data_dec , $data , $data_inc ) ;
}
/**
 * Muda a página atual
 *
 * @param   $str_destino   URL a ser destinada
 * @author  Maikel Finck <maikel@logicadigital.com.br>
 */
function fun_vai_para_url ( $str_destino )

{
	# Código javascript
?>
<script language="javascript" type="text/javascript">
	document.location.href = "<?php print $str_destino ; ?>" ;
</script>
<?php
}
/**
 * Envia uma mensagem javascript para o usuário
 *
 * @param   $str_mensagem   Mensagem a ser enviada
 * @author  Maikel Finck <maikel@logicadigital.com.br>
 */
function fun_pri_envia_mensagem ( $str_mensagem )
{
	# Código javascript
?>
<script language="javascript" type="text/javascript">
	alert ( "<?php print $str_mensagem ; ?>" ) ;
</script>
<?php
}
/*******************************************************************************************************************/
function fun_cumprimento ()
{
	// Pega o horário do servidor (0h~23h)
	$horario = date ( 'H' , time ()) ;
	// Testa se for de manhã
	if (( $horario > 5 ) && ( $horario <= 12 ))
	{
		$mensage = 'Bom dia ' ;
	}
	// Testa se for de noite
	elseif (( $horario > 12 ) && ( $horario < 19 ))
	{
		$mensage = 'Boa tarde ' ;
	}
	// Não é manhã ou tarde, noite.
	else
	{
		$mensage = 'Boa noite ' ;
	}
	// Retorna a mensagem
	return $mensage ;
}
/*******************************************************************************************************************/
function fun_data_lettera ( $data_lettera )
{
            # padrão plugin
            if ( strlen ( $data_lettera ) == 19 )
            {
                    $data['ano']	= substr ( $data_lettera , 0 , 4 ) ;
                    $data['mes']	= substr ( $data_lettera , 5 , 2 ) ;
                    $data['dia']	= substr ( $data_lettera , 8 , 2 ) ;
                    $data['hora']	= substr ( $data_lettera , 11 , 2 ) ;
                    $data['min']	= substr ( $data_lettera , 14 , 2 ) ;
            }
            # padrão interno
            elseif ( strlen ( $data_lettera ) == 14 )
            {
                    $data['ano']	= substr ( $data_lettera , 0 , 4 ) ;
                    $data['mes']	= substr ( $data_lettera , 4 , 2 ) ;
                    $data['dia']	= substr ( $data_lettera , 6 , 2 ) ;
                    $data['hora']	= substr ( $data_lettera , 8 , 2 ) ;
                    $data['min']	= substr ( $data_lettera , 10 , 2 ) ;
            }

            return $data ;
}
/*******************************************************************************************************************/
function fun_tratamento_data ( $data , $acao = 'L' )
{
	switch ( strtoupper ( $acao ))
	{
		case 'L':
			# 2006-03-07 18:37:03 » 07/03/2006 18:37
			if ( strlen ( $data ) == 19 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 5 , 2 ) ;
				$data_dia	= substr ( $data , 8 , 2 ) ;
				$data_hora	= substr ( $data , 11 , 2 ) ;
				$data_min	= substr ( $data , 14 , 2 ) ;
			}
			# 20060307183703 » 07/03/2006 18:37
			elseif ( strlen ( $data ) == 14 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 4 , 2 ) ;
				$data_dia	= substr ( $data , 6 , 2 ) ;
				$data_hora	= substr ( $data , 8 , 2 ) ;
				$data_min	= substr ( $data , 10 , 2 ) ;
			}
			# 20060307 » 07/03/2006
			elseif ( strlen ( $data ) == 10 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 5 , 2 ) ;
				$data_dia	= substr ( $data , 8 , 2 ) ;
			}
                        # 07/03/2006 00:00 » 07/03/2006
                        if (( $data_hora == 00 ) && ( $data_min == 00 ))
                        {
			     $data_final	= $data_dia .'/'. $data_mes .'/'. $data_ano ;
                        }
                        else
                        {
			     $data_final	= $data_dia .'/'. $data_mes .'/'. $data_ano .' '. $data_hora .':'. $data_min ;
                        }

			break ;

			case 'L2':
			# 2006-03-07 18:37:03 » 07/03/2006 18:37
			if ( strlen ( $data ) == 19 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 5 , 2 ) ;
				$data_dia	= substr ( $data , 8 , 2 ) ;
				//$data_hora	= substr ( $data , 11 , 2 ) ;
				//$data_min	= substr ( $data , 14 , 2 ) ;
			}
			# 20060307183703 » 07/03/2006 18:37
			elseif ( strlen ( $data ) == 14 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 4 , 2 ) ;
				$data_dia	= substr ( $data , 6 , 2 ) ;
				//$data_hora	= substr ( $data , 8 , 2 ) ;
				//$data_min	= substr ( $data , 10 , 2 ) ;
				$data_final	= $data_dia .'/'. $data_mes .'/'. $data_ano;
			}
			break ;

		case 'E':
			# 07/03/2006 18:37:03 » 20060307183703
			$data_dia	= substr ( $data , 0 , 2 ) ;
			$data_mes	= substr ( $data , 3 , 2 ) ;
			$data_ano	= substr ( $data , 6 , 4 ) ;
			$data_hora	= substr ( $data , 11 , 2 ) ;
			$data_min	= substr ( $data , 14 , 2 ) ;
			$data_sec	= substr ( $data , 17 , 2 ) ;
			$data_final	= $data_ano . $data_mes . $data_dia . $data_hora . $data_min . $data_sec ;
			break ;

		case 'E2':
			# 07/03/2006 » 2006-03-07
			$data_dia	= substr ( $data , 0 , 2 ) ;
			$data_mes	= substr ( $data , 3 , 2 ) ;
			$data_ano	= substr ( $data , 6 , 4 ) ;
			$data_final	= $data_ano . $data_mes . $data_dia ;
			break ;

		case 'S':
			# 2006-03-07 18:37:03 » 07/03/2006 18:37
			if ( strlen ( $data ) == 19 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 5 , 2 ) ;
				$data_dia	= substr ( $data , 8 , 2 ) ;
			}
			# 20060307183703 » 07/03/2006 18:37
			elseif ( strlen ( $data ) == 14 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 4 , 2 ) ;
				$data_dia	= substr ( $data , 6 , 2 ) ;
			}
			# 20060307 » 07/03/2006
			elseif ( strlen ( $data ) == 10 )
			{
				$data_ano	= substr ( $data , 0 , 4 ) ;
				$data_mes	= substr ( $data , 5 , 2 ) ;
				$data_dia	= substr ( $data , 8 , 2 ) ;
			}

			$data_final	= $data_dia .'/'. $data_mes .'/'. $data_ano ;
			break ;
	}
	return $data_final ;
}
/*******************************************************************************************************************/
function fun_seguranca ( $id_usuario , $id_grupo , $id_modulo , $var_acao , $pag_nivel )
{

//*** Inclusões:
	// Nível de
	$default['nivel'] = $pag_nivel ;
	// Configurações da aplicação
	require ( $default['nivel'] . 'global.php' ) ;
	// Conexão com o banco de dados
    require ( $include['conexao'] ) ;
	// Impressão em tempo de teste
	if (( !is_numeric ( $id_usuario )) || ( !is_numeric ( $id_grupo )) || ( !is_numeric ( $id_modulo )) || ( $var_acao == '' ) || ( $pag_nivel == '' ))
	{
?>
		<script language="javascript">
			document.location.href = ("<?php print $template['err403'] .'?err=1' ; ?>") ;
		</script>
<?php
	}
	elseif ( $id_grupo != 0 )
	{
		if (( $var_acao == 'A' ) || ( $var_acao == 'E' ) || ( $var_acao == 'I' ) || ( $var_acao == 'F' ) )
		{
			$tmp_acao = 'escrita' ;
		}
		if ( $var_acao == 'C' )
		{
			$tmp_acao = 'leitura' ;
		}
		$rs_sql		= 'SELECT * FROM tbsegurancaacessos WHERE idgrupo = '. $id_grupo .' AND idmodulo = '. $id_modulo ;
		$rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;
		$rs_linhas	= mysql_num_rows ( $rs_query ) ;
		if ( $rs_linhas > 0 )
		{
			for ( $cont_i = 0 ; $cont_i < $rs_linhas ; $cont_i ++ )
			{
				$rs_dados = mysql_fetch_array ( $rs_query ) ;
				if ( $rs_dados[$tmp_acao] != 'S' )
				{
?>
					<script language="javascript">
						document.location.href = ("<?php print $template['err403'] .'?err=2' ; ?>") ;
					</script>
<?php
				}
			}
		}
		else
		{
?>
			<script language="javascript">
				document.location.href = ("<?php print $template['err403'] .'?err=3' ; ?>") ;
			</script>
<?php
		}
	}
}
/*******************************************************************************************************************/
function fun_log ( )
{
	// A função precisa ser reescrita
}

/*******************************************************************************************************************/
function fun_monta_arvore ( $pai , &$conn , &$total , $nivel = 0 )
{
	// se o nível passar de 5
	if ( $nivel > 5 )
	{
		// decrementa o número de filhos se nao for válido
		$total -- ;
		// retorna um valor nulo
		return false ;
	}
	// seleciona os filhos deste nível
	$sql = '
		SELECT
			filho.id AS id_filho
		FROM
			tbVisitantes_Cadastro AS filho
		INNER JOIN
			tbVisitantes_Cadastro AS pai
		ON
			pai.id = filho.id_pai
		WHERE
			pai.id = '. $pai .'
	; ' ;
	// executa a seleção
	$qry = mysql_query ( $sql , $conn ) or die ( $sql .'<br>'. mysql_error() ) ;
	// para cada filho encontrado
	while ( $dados = mysql_fetch_array ( $qry ))
	{
		// incrementa o número de filhos
		$total ++ ;
		// procura os filhos deste filho
		monta_arvore ( $dados[ 'id_filho' ] , $conn , $total , $nivel + 1 ) ;
	}
}

/*******************************************************************************************************************/
function fun_paginacao ( $pag_atual , $pag_total , $pag_class = '' , $pag_style = 0 , $var_itens = '' , $var_ordem = '' , $var_busca = '' )
{
	// Checando a variável de estilo
	if ( $pag_class != '' )
	{
		$pag_class = 'class="'. $pag_class .'"' ;
	}
	// Primeira e Anterior
	if (( $pag_total > 1 ) && ( $pag_atual > 1 ))
	{
		$pag['primeira'] = ' <a href="?pagina=1&amp;itens='. $var_itens .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'" '. $pag_class .'>Primeira</a> ' ;
		$pag['anterior'] = ' <a href="?pagina='. ( $pag_atual - 1 ) .'>&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag_class .'>Anterior</a> ' ;
	}
	else
	{
		$pag['primeira'] = ' Primeira ' ;
		$pag['anterior'] = ' Anterior ' ;
	}
	// Próxima e Última
	if (( $pag_total > 1 ) && ( $pag_atual < $pag_total ))
	{
		$pag['ultima']  = ' <a href="index.php?pagina='. $pag_total .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag_class .'>&Uacute;ltima</a> ' ;
		$pag['proxima'] = ' <a href="index.php?pagina='. ( $pag_atual + 1 ) .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag_class .'>Pr&oacute;xima</a> ' ;
	}
	else
	{
		$pag['ultima']  = ' &Uacute;ltima ' ;
		$pag['proxima'] = ' Pr&oacute;xima ' ;
	}
	// Páginas intermediárias
	If ($pag_total < 10) {
		$pag_final = $pag_total;
		$pag_inicio = 1;}
	ElseIf ($pag_total > 9) {
		If ($pag_atual < 5) {
			$pag_final = 10;
			$pag_inicio = 1;}
		ElseIf ($pag_atual > 4) {
			If ($pag_atual+1 > $pag_total) {
				$pag_final = $pag_atual;
				$pag_inicio = $pag_atual-9;}
			Else If ($pag_atual+2 > $pag_total) {
					$pag_final = $pag_total;
					$pag_inicio = $pag_atual-8;}
			Else If ($pag_atual+3 > $pag_total) {
					$pag_final = $pag_total;
					$pag_inicio = $pag_atual-7;}
			Else If ($pag_atual+4 > $pag_total) {
					$pag_final = $pag_total;
					$pag_inicio = $pag_atual-6;}
			Else If ($pag_atual+5 > $pag_total) {
					$pag_final = $pag_total;
					$pag_inicio = $pag_atual-5;}
			Else {
					$pag_final = $pag_atual+5;
					$pag_inicio = $pag_atual-4;
				}
			}
		}

	switch ( $pag_style )
	{
	  	case 1:
	  	// Paginação - Usando Imagens
	  		break ;

		case 2:
		// Paginação - Usando Tabela
			$pag['lista']  = '<table border="0" cellpadding="4" cellspacing="1" bgcolor="#B0B0B0">' ;
			$pag['lista'] .= '<tr align="center" bgcolor="#E5E5E5">' ;
			$pag['lista'] .= '<td style="font-size: 8pt;">'. $pag['primeira'] .'</td>' ;
			$pag['lista'] .= '<td style="font-size: 8pt;">'. $pag['anterior'] .'</td>' ;
			for ($cont_pag = $pag_inicio ; $cont_pag <= $pag_final ; $cont_pag ++ )
			{
				if ( intval ( $cont_pag ) != intval ( $pag_atual ))
				{
					$pag['lista'] .= '<td style="font-size: 8pt;" width="15"><a href="?pagina='. $cont_pag .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag['classe'] .'>'. $cont_pag .'</a></td>' ;
				}
				else
				{
				  	$pag['lista'] .= '<td class="paginacao">'. $cont_pag .'</td>' ;
				}
			}
			if ($cont_pag == 1 )
			{
				$pag['lista'] .= '<td class="paginacao">'. $cont_pag .'</td>' ;
			}
			$pag['lista'] .= '<td style="font-size: 8pt;">'. $pag['proxima'] .'</td>' ;
			$pag['lista'] .= '<td style="font-size: 8pt;">'. $pag['ultima'] .'</td>' ;
			$pag['lista'] .= '</tr></table>' ;
			break ;

		default:
		// Paginação - Usando Texto
			$pag['lista'] = $pag['primeira'] . $pag['anterior'] ;
			for ($cont_pag = 1 ; $cont_pag <= $pag_total ; $cont_pag ++ )
			{
				if ( intval ( $cont_pag ) != intval ( $pag_atual ))
				{
					$pag['lista'] .= ' <a href="?pagina='. $cont_pag .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag_class .'>'. $cont_pag .'</a> ' ;
				}
				else
				{
					$pag['lista'] .= '<strong>'. $cont_pag .'</strong>' ;
				}
			}
			$pag['lista'] .= $pag['proxima'] . $pag['ultima'] ;
			break ;
	}

	print $pag['lista'] ;
}

/*******************************************************************************************************************/
/**
 * Gera 'on-the-fly thumb' proporcionais do arquivo jpeg chamado
 *
 * @param    string   $src         Endereco da imagem original
 * @param    string   $salvar_como Endereco da imagem thumb onde sera salva
 * @param    integer  $largura     Largura maxima da imagem gerada
 * @param    integer  $altura      Altura maxima da imagem gerada
 * @param    integer  $qualidade   Qualidade da thumbnail
 * @param    string   $cor_fundo   Cor do fundo da imagem
 * @access   public
 * @author   Maikel Finck <maikel@logicadigital.com.br>
 */
function fun_gera_imagem_thumbnail ( $src, $salvar_como , $largura = 165 , $altura = 165 , $qualidade = 90 , $cor_fundo = 'FF0000' )
{
	// Define o cabecalho para criacao da thumbnail
//	header ( "Content-type: image/jpeg" ) ;
	// Cria a imagem na variável de tratamento
	$imagem['src']		= imagecreatefromjpeg ( $src ) ;
	// Define a largura da imagem original
	$imagem['largura']	= imagesx ( $imagem['src'] ) ;
	// Define a altura da imagem original
	$imagem['altura']	= imagesy ( $imagem['src'] ) ;
	// Se a altura ou a largura for maior do que o permitido
	if (( $imagem['largura'] > $largura ) || ( $imagem['altura'] > $altura ))
	{
		// Define a largura da thumbnail
		$thumb['largura']	= $largura ;
		// Define a altura da thumbnail
		$thumb['altura']	= $altura ;
		// Se a largura do thumb sobre a largura da imagem vezes a altura da imagem for maior que a altura do thumb
		if ((( $thumb['largura'] / $imagem['largura'] ) * $imagem['altura'] ) > $thumb['altura'] )
		{
			// Calcula a largura proporcional
			$thumb['largura'] = round (( $thumb['altura'] * $imagem['largura'] ) / $imagem['altura'] ) ;
		}
		// Se a altura do thumb for maior
		else
		{
			// Calcula a largura proporcional
			$thumb['altura'] = round (( $thumb['largura'] * $imagem['altura'] ) / $imagem['largura'] ) ;
		}
	}
	// Se a imagem original for menor que o thumbnail
	else
	{
		// Define a largura da thumbnail
		$thumb['largura']	= $imagem['largura'] ;
		// Define a altura da thumbnail
		$thumb['altura']	= $imagem['altura'] ;
	}
	// Cria a variavel da thumbnail
	$thumb['src'] = imagecreatetruecolor ( $thumb['largura'] , $thumb['altura'] ) ;
	// Insere a cor de fundo na area da imagem
	imagefilledrectangle ( $thumb['src'] , 0 , 0 , $thumb['largura'] - 1 , $thumb['altura'] - 1 , intval ( $cor_fundo , 16 )) ;
	// Copia a imagem para a area do thumbnail
	imagecopyresampled ( $thumb['src'] , $imagem['src'] , 0 , 0 , 0 , 0 , $thumb['largura'] , $thumb['altura'] , $imagem['largura'] , $imagem['altura'] ) ;
	// Seta a qualidade e cria o arquivo
	imagejpeg ( $thumb['src'] , $salvar_como , $qualidade ) ;
	// Libera a memoria utilizada para criacao da thumbnail
	imagedestroy ( $thumb['src'] ) ;

}

/*******************************************************************************************************************/
function fun_pegacategoria( $conexao, $id_categoria ) {

$rs_sql         = 'SELECT * FROM tbcategoria WHERE categoria = "'. $id_categoria .'"';
$rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;
$rs_linhas      = mysql_num_rows ( $rs_query ) ;

if ( $rs_linhas > 0 ) {
   $rs_dados = mysql_fetch_array ( $rs_query ) ;
   return $rs_dados['descricao'];
} else {
   return '';
}

}

?>