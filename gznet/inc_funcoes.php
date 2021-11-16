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
		$pag['ultima']  = ' <a href="?pagina='. $pag_total .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag_class .'>&Uacute;ltima</a> ' ;
		$pag['proxima'] = ' <a href="?pagina='. ( $pag_atual + 1 ) .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag_class .'>Pr&oacute;xima</a> ' ;
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
			$pag['lista'] .= '<p '.$pag_class.' >' ;
			$pag['lista'] .= ' [ '. $pag['primeira'] .' ] ' ;
			$pag['lista'] .= ' [ '. $pag['anterior'] .' ] ' ;
			for ($cont_pag = $pag_inicio ; $cont_pag <= $pag_final ; $cont_pag ++ )
			{
				if ( intval ( $cont_pag ) != intval ( $pag_atual ))
				{
					$pag['lista'] .= ' [ <a href="?pagina='. $cont_pag .'&amp;ordem='. str_replace ( " ", "%20", $var_ordem ) .'&amp;busca='. $var_busca .'&amp;itens='. $var_itens .'" '. $pag['classe'] .'>'. $cont_pag .'</a> ] ' ;
				}
				else
				{
				  	$pag['lista'] .= ' [ <strong><span  style="font-size: 13px;">'. $cont_pag .' </span></strong> ] ' ;
				}
			}
			if ($cont_pag == 1 )
			{
				$pag['lista'] .= '  ['. $cont_pag .' ] ' ;
			}
			$pag['lista'] .= ' [ '. $pag['proxima'] .' ] ' ;
			$pag['lista'] .= ' [ '. $pag['ultima'] .' ] ' ;
			$pag['lista'] .= '</p>' ;
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
					$pag['lista'] .= '<strong style="font-size: 22px;">'. $cont_pag .'</strong>' ;
				}
			}
			$pag['lista'] .= $pag['proxima'] . $pag['ultima'] ;
			break ;
	}

	print $pag['lista'] ;
}

//Função

function fun_URL()
{
  if($_SERVER['SERVER_ADMIN'] == 'eureka@localhost')
  {
    $url = explode('/',$_SERVER['REQUEST_URI']);
    $url_site = $_SERVER['SERVER_NAME'].'/'.$url[1].'/'.$url[2];
   }
   else
   {
    $url_site = $_SERVER['HTTP_HOST'];
   }

   return $url_site = 'http://'.$url_site;
}

?>
