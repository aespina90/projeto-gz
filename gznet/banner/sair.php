<?php
 session_start();
 
 session_destroy();
 
 session_unset();
 
 print_r("
		 
		    <script>
			
			   window.location.href=('index.php');
			
			</script>>
		 
		 ");
?>