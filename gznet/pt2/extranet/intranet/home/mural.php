<?php
session_start();
include('../../classes/valida_cookies.inc');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$nome = $_SESSION['nome'];
$usuario = $_SESSION['usuario'];
$acessos[0] = $_SESSION['mural'];
$acessos[1] = $_SESSION['treinamento'];
$acessos[2] = $_SESSION['avaliacao'];
$acessos[3] = $_SESSION['senhas'];
$usuario = strtoupper($usuario);
?>

<html>
    <head>
                <script type="text/javascript" src="../../jquery/jquery-1.4.2.min.js"></script>
                <script type="text/javascript" src="../../jquery/jquery.slidertron-0.1.js"></script>
                <style type="text/css">@import "../../css/slidertron.css";</style>
    </head>
    <body>
        <div id="index">


                <div id="perfil">
                    <div class="header_form"> Perfil </div>
                </div>
<div id="slideshow">
	<!-- start -->
	<div id="foobar">
		<div id="col1"><a href="#" class="previous">&nbsp;</a></div>
		<div id="col2">
			<div class="viewer">
                                            <b><font color="red">Desabilite seu bloqueador de POP-UP.</font></b>
				<div class="reel">
					<div class="slide"><a href="javascript:abrir('012011/index.html')"><img src="images/janeiro2011.jpg"  alt="" /></a></div>
					<div class="slide"><a href="javascript:abrir('122010/index.html')"><img src="images/dezembro2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('112010/index.html')"><img src="images/novembro2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('102010/index.html')"><img src="images/outubro2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('092010/index.html')"><img src="images/setembro2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('082010/index.html')"><img src="images/agosto2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('072010/index.html')"><img src="images/julho2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('062010/index.html')"><img src="images/junho2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('052010/index.html')"><img src="images/maio2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('042010/index.html')"><img src="images/abril2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('032010/index.html')"><img src="images/março2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('022010/index.html')"><img src="images/fevereiro2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('012010/index.html')"><img src="images/janeiro2010.jpg"  alt="" /></a></div>
                                        <div class="slide"><a href="javascript:abrir('122009/index.html')"><img src="images/dezembro2009.jpg"  alt="" /></a></div>
                                </div>
			</div>
		</div>
		<div id="col3"><a href="#" class="next">&nbsp;</a></div>
	</div>
	<script type="text/javascript">

						$('#foobar').slidertron({
							viewerSelector:			'.viewer',
							reelSelector:			'.viewer .reel',
							slidesSelector:			'.viewer .reel .slide',
							navPreviousSelector:	'.previous',
							navNextSelector:		'.next',
							navFirstSelector:		'.first',
							navLastSelector:		'.last'
						});

					</script>
	<!-- end -->
</div>
        </div>
    </body>
</html>