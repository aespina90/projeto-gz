<?php
  session_start();
  
  include("../inc_conexao.php");
  
  $login = addslashes($_POST['login']);
  $senha = sha1($_POST['senha']);
  
  $sql = mysql_query("SELECT * FROM user WHERE login = '$login' And senha = '$senha'");
  $row = mysql_fetch_assoc($sql);
  
  if($login != $row['login'] || $senha != $row['senha'] || $login == "" || $senha == ""){
	  
	    print_r("
				
				  <script>
				  
				      window.location.href=('index.php?accessykey=error');
				 
				  </script>
				
				");
	  
	  }else{
		  
		     $_SESSION['usuario'] = $login ;
			 
			 print_r("
				
				  <script>
				  
				      window.location.href=('principal.php');
				 
				  </script>
				
				");
			 
		  
		  }
?>