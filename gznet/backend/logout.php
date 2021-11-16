<?php
/**
* ./logout.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 Lуgica Digital
* Descriзгo: Encerra a aplicaзгo.
*/
//*** Inнcio da sessгo
	session_start() ;
//*** Destrуi a sessгo
	session_destroy() ;
//*** Retorna para a pбgina de autenticaзгo
	header ( "location: index.php" ) ;
?>