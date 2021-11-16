<?php
  session_start();
  
  if($_SESSION['usuario'] == ""){
	  
	    print_r("
				
				  <script>
				  
				     window.location.href=('index.php');
				  
				  </script>
				
				");
	  
	  }
?>