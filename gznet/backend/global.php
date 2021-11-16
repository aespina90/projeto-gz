<?php
//*** Dados da aplicaчуo
	$backend['empresa']		= 'GZ Sistemas';
	$backend['titulo']		= 'GZ Sistemas - Backend';
	$backend['estilo']		= 'inc_estilo.css';
	$backend['logotipo']	= 'logo_backend.jpg';
	$backend['lembrete']	= '[GZ Sistemas] Lembrete de senha';
	$backend['session']		= 'GZ Sistemas';
//*** Dados do upload de imagem
	// Tamanho mсximo do arquivo em MB
	$upload['tamanho']		= 10;
	// Largura e Altura mсxima do arquivo em PX
	$upload['largura']		= 3000;
	$upload['altura']		= 3000;
//*** Variсveis de sessуo
	$session['iduser']		= $backend['session'] .'_id';
	$session['idgrupo']		= $backend['session'] .'_id_grupo';
	$session['nome']		= $backend['session'] .'_nome';
	$session['grupo']		= $backend['session'] .'_grupo';
	$session['lastjoin']	= $backend['session'] .'_ultimo_login';
//*** Arquivos de inclusуo
	$include['conexao']		= 'inc_conexao.php';
	$include['seguranca']	= 'inc_seguranca.php';
	$include['funcao']		= 'inc_funcoes.php';
	$include['header']		= 'inc_header.php';
	$include['menu']		= 'inc_menu.php';
	$include['javascript']	= 'inc_java.js';
	$include['footer']		= 'inc_footer.php';
	$include['popmenu']		= 'inc_menu_pop.php';
	$include['popmenu2']	= 'inc_menu_pop2.php';
	$include['popfooter']	= 'inc_footer_pop.php';
	$include['popfooter2']	= 'inc_footer_pop2.php';
//*** Arquivos de template
	$template['getpost']	= 'tpl_getpost.php';
	$template['valvars']	= 'tpl_valvars.php';
	$template['rec_set']	= 'tpl_recordset.php';
	$template['rec_set_p']	= 'tpl_recordset_pagamentos.php';
	$template['headers']	= 'tpl_headers.php';
	$template['upl_img']	= 'tpl_upload_imagem.php';
	$template['upl_vid']	= 'tpl_upload_video.php';
	$template['upl_doc']	= 'tpl_upload_arquivos.php';
	$template['upl_arq']	= 'tpl_upload_arquivos.php';
	$template['err403']		= 'inc_403.php';
//*** Pastas:
	// da aplicaчуo
	$folders['root']		= $default['nivel'];
	$folders['imagens']		= 'imagens/';
	$folders['icones']		= 'icones/';
	$folders['icones_menu']	= 'icones/menu/';
	$folders['include']		= 'includes/';
	$folders['template']	= 'template/';
	$folders['lettera']		= 'lettera/';
	$folders['seguranca']	= 'seguranca/';
	$folders['revenda']		= 'revenda/';
	$folders['treinamento']	= 'treinamento/';
	$folders['arearestrita']= 'arearestrita/';
	// da raiz
	$folders['dbimagens']	= 'dbimagens/';
	$folders['arquivos']	= 'arquivos/';
//*** Caminhos completos das pastas:
	// da aplicaчуo
	$folders['imagens']		= $folders['root'].$folders['imagens'];
	$folders['icones']		= $folders['root'].$folders['icones'];
	$folders['icones_menu'] = $folders['root'].$folders['icones_menu'];
	$folders['include']		= $folders['root'].$folders['include'];
	$folders['template']	= $folders['include'].$folders['template'];
	$folders['lettera']		= $folders['root'].$folders['lettera'];
	$folders['seguranca']	= $folders['root'].$folders['seguranca'];
	$folders['revenda']     = $folders['root'].$folders['revenda'];
	$folders['treinamento']	= $folders['root'].$folders['treinamento'];
	$folders['arearestrita']= $folders['root'].$folders['arearestrita'];
	// da raiz
	$folders['dbimagens']	= $folders['root'].'../'.$folders['dbimagens'];
	$folders['arquivos']	= $folders['root'].'../'.$folders['arquivos'];
//*** Caminhos completos dos arquivos:
	// da aplicaчуo
	$backend['estilo']		= $folders['include'].$backend['estilo'];
	$backend['logotipo']	= $folders['icones'].$backend['logotipo'];
	// de inclusуo
	$include['javascript']	= $folders['include'].$include['javascript'];
	$include['conexao']		= $folders['include'].$include['conexao'];
	$include['seguranca']	= $folders['include'].$include['seguranca'];
	$include['funcao']		= $folders['include'].$include['funcao'];
	$include['header']		= $folders['include'].$include['header'];
	$include['menu']		= $folders['include'].$include['menu'];
	$include['footer']		= $folders['include'].$include['footer'];
	$include['popmenu']		= $folders['include'].$include['popmenu'];
	$include['popmenu2']	= $folders['include'].$include['popmenu2'];
	$include['popfooter']	= $folders['include'].$include['popfooter'];
	$include['popfooter2']	= $folders['include'].$include['popfooter2'];
	// de template
	$template['getpost']	= $folders['template'].$template['getpost'];
	$template['valvars']	= $folders['template'].$template['valvars'];
	$template['rec_set']	= $folders['template'].$template['rec_set'];
	$template['rec_set_p']	= $folders['template'].$template['rec_set_p'];
	$template['headers']	= $folders['template'].$template['headers'];
	$template['upl_img']	= $folders['template'].$template['upl_img'];
	$template['upl_vid']	= $folders['template'].$template['upl_vid'];
	$template['upl_arq']	= $folders['template'].$template['upl_arq'];
	$template['upl_doc']	= $folders['template'].$template['upl_doc'];
	$template['err403']		= $folders['template'].$template['err403'];
//*** Verifica se o Grupo щ o de desenvolvimento
	if(ISSET($_SESSION[$session['idgrupo']]))
    if($_SESSION[$session['idgrupo']] == 0){ $default['modulo'] = 0; }
?>