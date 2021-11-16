<?php
// Define o array de erro
$upload['erro'] = array () ;
// Define o tamanho da imagem em bits
$upload['tamanho'] *= ( 1024 * 1024 ) ;

// Verifica se o arquivo foi carregado com sucesso
if ( !is_uploaded_file ( $upload['campo']['tmp_name'] ))
{
  	// Falha ao carregar
	$upload['erro'][] = 'O arquivo n�o foi carregado.' ;	
}
// Carregado com sucesso
else
{		
	// Verifica o tamanho do arquivo
	if (( $upload['campo']['size'] <= $upload['tamanho'] ) && ( $upload['tamanho'] != '' ))
	{
		// Tamanho do arquivo permitido
		// Verifica a extens�o do arquivo
		if ( !eregi ( "^image\/(pjpeg|jpeg|png|gif|bmp)$" , $upload['campo']['type'] ) )
		{
		  	// Extens�o de arquivo n�o permitida
			$upload['erro'][] = 'Tipo de arquivo n�o permitido.' ;
		}
		// Extens�o de arquivo permitida
		{
		  	$upload['dimensao'] = getimagesize ( $upload['campo']['tmp_name'] ) ;
			// Verifica as dimens�es do arquivo - largura
			if (( $upload['dimensao'][0] <= $upload['largura'] ) && ( $upload['largura'] != '' ))
			{
				// Verifica as dimens�es do arquivo - altura
				if (( $upload['dimensao'][1] > $upload['altura'] ) && ( $upload['altura'] == '' ))
				// Altura n�o permitida
				{
					$upload['erro'][] = 'A altura do arquivo excede o limite.' ;
				}
			}
			// Dimens�es do arquivo permitidas
			else
			{
			  	// Largura n�o permitida
				$upload['erro'][] = 'A largura do arquivo excede o limite.' ;
			}
		}
	}
	// Tamanho do arquivo excedeu o limite
	else
	{
		$upload['erro'][] = 'O tamanho do arquivo excede o limite permitido.' ;
	}
}

// Testa o array de erros
if ( count ( $upload['erro'] ) > 0 )
{
	// Arquivo n�o foi carregado com sucesso
	foreach ( $upload['erro'] as $err )
	{
		$upload['msg_erro'] .= $err . '<br>' ;
	}
	print $upload['msg_erro'] ;
	// Zera a variavel de erro
	$upload['msg_erro'] = '' ;
}
// Carregado com sucesso
else
{
	// Gera o nome do arquivo
	$upload['extensao']	= '.'. substr ( $upload['campo']['name'] , -3 ) ;
	$upload['nome']		= md5 ( date ( 'YmdHis' , time ())) . $upload['extensao'] ;
	// Verifica se o arquivo j� existe, e gera um nome novo
	while ( is_file ( $folders['dbimagens'] . $upload['nome'] ) )
	{
		$upload['nome']	= md5 ( date ( 'YmdHis' , time ()) . rand ( 0 , 9 )) . $upload['extensao'] ;
	}
	// Copia o arquivo para a pasta de destino
	if ( !move_uploaded_file ( $upload['campo']['tmp_name'] , $folders['dbimagens'] . $upload['nome'] ))
	{
		exit ;
	}
	// C�pia efetuada
}
?>