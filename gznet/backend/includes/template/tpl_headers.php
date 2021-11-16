<?php
/**
* ./includes/template/tpl_headers.php
* @author Jeancarlo Finck projetos@logicadigital.com.br
* @copyright (c) 2007 Lógica Digital
* Descrição: Cabeçalho do documento HTML.
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php print $backend['titulo'] ; ?></title>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1" />
        <link rel="Shortcut Icon" type="image/x-icon" href="<?php print $folders['icones'] ; ?>iconelogica.jpg" />
	<link href="<?php print $backend['estilo'] ; ?>" rel="stylesheet" type="text/css" />
	<script language="JavaScript" type="text/JavaScript" src="<?php print $include['javascript'] ; ?>"></script>
