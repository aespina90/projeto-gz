<?php
//session_start();
require ('inc_conexao_interno.php');
require ('inc_funcoes.php');
?>
<!DOCTYPE  html>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90334652-1', 'auto');
  ga('send', 'pageview');

</script>
<html>
	<head>
		<meta charset="utf-8">
		<title>GZ Sistemas</title>
		
		<!-- CSS -->
		<link rel="stylesheet" href="gz/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="gz/css/social-icons.css" type="text/css" media="screen" />
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->	
		
		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->
		
		<!-- JS -->
		<script type="text/javascript" src="gz/js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="gz/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="gz/js/easing.js"></script>
		<script type="text/javascript" src="gz/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="gz/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="gz/js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="gz/js/jquery.isotope.min.js"></script>

	</head>
    <body>

  <?php include("inc_topo.php"); ?>
	
			<center><br><br><br><br><br><br>
            <form name="area_restrita" id="area_restrita" action="login.php" method="post" onSubmit="return validaform_area_restrita();">
Login:<input name="login" id="login" type="text" class="texto_area_restrita" size="22" maxlength="20"><br><br>
         Senha:<input name="senha" id="senha" type="password" class="texto_area_restrita" size="22" maxlength="10">

              <br><br>
          <input name="enviar" type="image" src="imagens/btn_enviar.jpg">
      </form>
     <br><br><br><br>
</center>

              <?php include("inc_rodape.php"); ?>

	</body>
</html>