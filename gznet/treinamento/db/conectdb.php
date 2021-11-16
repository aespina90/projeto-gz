<?php
$server = 'localhost';
$username = 'elearning';
$password = 'tiramao2469';
$schema = 'elearning';
$db = mysql_connect($server, $username, $password);
mysql_select_db($schema, $db);
mysql_set_charset("utf8");
?>
