<?php
/**
* ./logout.php
* @author Maikel Finck maikel@logicadigital.com.br
* @copyright (c) 2006 L�gica Digital
* Descri��o: Encerra a aplica��o.
*/
//*** In�cio da sess�o
	session_start() ;
//*** Destr�i a sess�o
	session_destroy() ;
//*** Retorna para a p�gina de autentica��o
	header ( "location: index.php" ) ;
?>