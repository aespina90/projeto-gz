<?php
session_start() ;
$default['nivel'] = './' ;
require ( $default['nivel'] . 'global.php' ) ;
require ( $include['conexao'] ) ;

$login = $_POST['login'];
$senha = $_POST['senha'];

$login = ereg_replace("[^a-zA-Z0-9_.@]", "",strtr($login, "АЮЦБИЙМСТУЗЭГаюцбиймстузэг ","aaaaeeiooouucAAAAEEIOOOUUC_"));
$senha = ereg_replace("[^a-zA-Z0-9_.@]", "",strtr($senha, "АЮЦБИЙМСТУЗЭГаюцбиймстузэг ","aaaaeeiooouucAAAAEEIOOOUUC_"));

$rs_sql    = "SELECT * FROM tbsegurancausuarios WHERE login = '". $login ."' AND senha = '". $senha ."' AND status = 'A'" ;
$rs_query  = mysql_query ( $rs_sql , $conexao['conexao'] ) or die ( 'A conexЦo com o banco de dados nЦo foi possМvel!' ) ;
$rs_linhas = mysql_num_rows ( $rs_query ) ;

if ( $rs_linhas > 0 ) {

   $rs_dados = mysql_fetch_array ( $rs_query ) ;

   $_SESSION[$session['iduser']]        = $rs_dados['id'] ;
   $_SESSION[$session['nome']]          = $rs_dados['nome'] ;
   $_SESSION[$session['idgrupo']]       = $rs_dados['idgrupo'] ;
   $_SESSION[$session['lastjoin']]      = $rs_dados['ultimologin'] ;

   $rs_sql      = 'SELECT * FROM tbsegurancagrupos WHERE id="'. $_SESSION[$session['idgrupo']] .'"' ;
   $rs_query	= mysql_query ( $rs_sql , $conexao['conexao'] ) ;
   $rs_linhas	= mysql_num_rows ( $rs_query ) ;

   if ( $rs_linhas > 0 ) {
      $rs_dados = mysql_fetch_array ( $rs_query ) ;
      $_SESSION[$session['grupo']]	= $rs_dados['grupo'] ;
   } else {
      $_SESSION[$session['grupo']]	= 'L&oacute;gica Digital' ;
   }

   $rs_sql	= 'UPDATE tbsegurancausuarios SET ultimologin=NOW() WHERE id="'. $_SESSION[$session['iduser']] .'"' ;
   $rs_query    = mysql_query ( $rs_sql , $conexao['conexao'] ) ;
   mysql_close ( $conexao['conexao'] ) ;

   header ( "location: main.php" ) ;

} else {

   mysql_close ( $conexao['conexao'] ) ;
   header ( "location: index.php" ) ;

}
?>