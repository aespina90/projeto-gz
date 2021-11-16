<!DOCTYPE html>
<html>
	<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90361141-6"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-90361141-6');
    </script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		<title>GZ Sistemas - Parceiro REDE</title>

		<meta name="keywords" content="gzsistemas, gz, pdv, automação comercial, sistema de gestão, api, sistema para supermercado, sistema para franquias, parceiro rede, rede, pinpad rede" />
        <meta name="description" content="Parceiro REDE">
        <meta name="author" content="GZ Sistemas">

		<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="../img/favicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="../vendor/animate/animate.min.css">
		<link rel="stylesheet" href="../vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="../vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="../css/theme.css">
		<link rel="stylesheet" href="../css/theme-elements.css">
		<link rel="stylesheet" href="../css/theme-blog.css">
		<link rel="stylesheet" href="../css/theme-shop.css">
		<link rel="stylesheet" href="../css/skins/default.css">
		<link rel="stylesheet" href="../css/custom.css">
		<script src="../vendor/modernizr/modernizr.min.js"></script>
        <script src="https://kit.fontawesome.com/a597a44374.js" crossorigin="anonymous"></script>

	</head>
	<body>

		<div class="body">
        <?php include 'headerMenu.php'; ?>

			<div role="main" class="main">

				<section class="page-header page-header-modern page-header-background page-header-background-md py-0 overlay-show overlay-op-10" style="background-color: #005581">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 order-2 order-sm-1 align-self-center p-static">
								<p></p>
								<div class="overflow-hidden pb-2">
									<h1 class="text-10 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300"><img alt="Rede" width="300" height="180" data-sticky-width="" data-sticky-height="" src="../img/logos/parceiroRede3.png"></h1>
								</div>
                                <p></p>
								<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                                    <h1 class="text-10 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300"></h1>
									<span class="sub-title text-4 mt-4">Fale agora com o nosso time de especialistas e confira as ofertas especiais.</span>
                                <hr>
                                    	<?php
							if (isset($_POST['BTEnvia'])) {

								$nome = $_POST['nome'];
								$email = $_POST['email'];
								$telefone = $_POST['telefone'];
								$empresa = $_POST['empresa'];

								$email_remetente = "site@gzsistemas.com.br";

								$email_destinatario = "marketing@gzsistemas.com.br, rede@gzsistemas.com.br";
								$email_reply = "$email";
								$email_assunto = "PROMO REDE";

								$email_conteudo = "Nome: $nome \n";
								$email_conteudo .= "Email: $email \n";
								$email_conteudo .= "Telefone: $telefone \n";
								$email_conteudo .= "Empresa: $empresa \n";

								$email_headers = implode("\n", array("From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

								if (mail($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)) {
									echo "</b>E-Mail enviado com sucesso!</b>";
								} else {
									echo "</b>Falha no envio do E-Mail!</b>";
								}
								//====================================================
							}
							?>
                            
							<form action="<? $PHP_SELF; ?>" method="POST">
								<p>
									<font color="#ffffff">Nome *</font><br />
									<input type="text" size="52" name="nome" required>
								</p>
								<p>
                                    <font color="#ffffff">E-mail *</font><br />
									<input type="email" size="52" name="email" required>
								</p>
								<p>
                                    <font color="#ffffff">Telefone *</font><br />
									<input type="tel" size="52" name="telefone" required>
								</p>
								<p>
                                    <font color="#ffffff">Empresa *</font><br />
									<input type="text" size="52" name="empresa" required>
								</p>
								<p>
									<input type="submit" name="BTEnvia" value="Enviar">
									<input type="reset" name="BTApaga" value="Apagar">
								</p>
							</form>
                                    
								</div>
								<br>
							</div>
							<div class="col-sm-7 order-1 order-sm-2 align-items-end justify-content-end d-flex pt-5">
								<div style="min-height: 300px;" class="overflow-hidden">
									<img  alt="gpos rede" src="../img/gposRede3.png" class="img-fluid appear-animation" data-appear-animation="slideInUp" data-appear-animation-delay="600" data-appear-animation-duration="1s">
								</div>
							</div>
						</div>
					</div>
				</section>
				<div class="container">
					<div class="row">
						<div class="col py-4">
							<p class="lead"><strong>FlexPDV Mobile e GZ Cloud Plataforma</strong></p>
                            <hr>
                            <p>Sistema para controle COMPLETO de PDV, FÁCIL e SIMPLES de operar. Com operação ágil e eficiente, agora também disponível em dispositivos móveis.</p>
                            <img alt="FlexPDV Mobile" width="400" height="230" data-sticky-width="450" data-sticky-height="290" src="../img/flexpdvA.png">&nbsp; &nbsp;
                            <img alt="GZ Cloud Plataforma" width="400" height="230" data-sticky-width="450" data-sticky-height="290" src="../img/gzcloudA.png">
                            <p></p>
							<p>É necessário o cadastramento na plataforma GZ Cloud para utilização do FlexPDV MOBILE com integração do cadastros centralizados na nuvem e gerenciamento remoto de todos seus dispositivos.</p>
							<p>Para fazer o seu cadastro em nossa plataforma e conhecer nossas soluções Cloud, <a href="https://login.gzcloud.com.br/cadastro/" target="_blank">clique aqui</a>.</p>
							<p></p>
                            <br>
                            <p class="lead"><strong>ALGUNS CLIENTES </strong></p>
                            <hr>
                            <img alt="FlexPDV Mobile" width="350" height="350" data-sticky-width="400" data-sticky-height="400" src="../img/mug.jpg"> &nbsp; &nbsp;
                            <img alt="FlexPDV Mobile" width="350" height="350" data-sticky-width="400" data-sticky-height="400" src="../img/peteleco.jpg"> &nbsp; &nbsp;
                            <br><br>
                            <img alt="FlexPDV Mobile" width="350" height="350" data-sticky-width="400" data-sticky-height="400" src="../img/baffs.jpg"> &nbsp; &nbsp;
                            <img alt="FlexPDV Mobile" width="350" height="350" data-sticky-width="400" data-sticky-height="400" src="../img/ofner.jpg">
                            <p></p>
							<br>
							<!--
                            <p class="lead"><strong>FLEXPDV MOBILE </strong></p>
                            <hr>
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/y9BGDyOvT88" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/RLY1xyY3Buw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/fh1Y7e2p4i8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <hr>
                            <p class="lead"><strong>TUTORIAIS FLEXPDV MOBILE </strong></p>
                            <hr>
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/pRvW0ufheJQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/dEKd8bGAM2Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/R7A3L0zNx3Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/whMKDLHg09U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/QJZmuWYoob8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/NXAS-yGgFmo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            
                            <iframe width="450" height="300" src="https://www.youtube.com/embed/x-tcSfqrorM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							-->
						</div>
					</div>

				</div>

			</div>

			<div class="container py-2">

<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
	<li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Todos</a></li>
	<li class="nav-item" data-option-value=".logos"><a class="nav-link text-1 text-uppercase" href="#">PDV Mobile</a></li>
	<li class="nav-item" data-option-value=".websites"><a class="nav-link text-1 text-uppercase" href="#">Tutoriais PDV Mobile</a></li>
	<!--<li class="nav-item" data-option-value=".planos"><a class="nav-link text-1 text-uppercase" href="#">Planos e Soluções</a></li> -->
</ul>

<div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
	<div class="row portfolio-list sort-destination popup-gallery-ajax" data-sort-id="portfolio">

		<div class="col-sm-6 col-lg-3 isotope-item logos">
			<div class="portfolio-item">
				<a href="../ajax/ajax-youtube-rede02.html" data-ajax-on-modal>
					<span class="thumb-info thumb-info-lighten border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="../img/projects/project-gz-rede02.jpg" class="img-fluid border-radius-0" alt="projeto rede">
							<span class="thumb-info-title">
								<span class="thumb-info-inner">FlexPDV Mobile - REDE</span>
					<span class="thumb-info-type">PDV Mobile</span>
					</span>
					<span class="thumb-info-action">
								<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
					</span>
					</span>
					</span>
				</a>
			</div>
		</div>
		<!--
		<div class="col-sm-6 col-lg-3 isotope-item logos">
			<div class="portfolio-item">
				<a href="../ajax/ajax-youtube-iti.html" data-ajax-on-modal>
					<span class="thumb-info thumb-info-lighten border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="../img/projects/project-gz-iti.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner">FlexPDV Mobile - REDE - Carteira Digital ITI</span>
					<span class="thumb-info-type">PDV Mobile</span>
					</span>
					<span class="thumb-info-action">
								<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
					</span>
					</span>
					</span>
				</a>
			</div>
        </div>
        -->
        
        <div class="col-sm-6 col-lg-3 isotope-item websites">
			<div class="portfolio-item">
				<a href="../ajax/ajax-youtube-tutorial01.html" data-ajax-on-modal>
					<span class="thumb-info thumb-info-lighten border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="../img/projects/project-gz-tutorial01.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner">FlexPDV Mobile - Tutorial Abertura de Caixa</span>
					<span class="thumb-info-type">PDV Mobile Tutoriais</span>
					</span>
					<span class="thumb-info-action">
								<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
					</span>
					</span>
					</span>
				</a>
			</div>
        </div>
        <div class="col-sm-6 col-lg-3 isotope-item websites">
			<div class="portfolio-item">
				<a href="../ajax/ajax-youtube-tutorial02.html" data-ajax-on-modal>
					<span class="thumb-info thumb-info-lighten border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="../img/projects/project-gz-tutorial02.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner">FlexPDV Mobile - Tutorial Cadastro de Clientes</span>
					<span class="thumb-info-type">PDV Mobile Tutoriais</span>
					</span>
					<span class="thumb-info-action">
								<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
					</span>
					</span>
					</span>
				</a>
			</div>
        </div>
        <div class="col-sm-6 col-lg-3 isotope-item websites">
			<div class="portfolio-item">
				<a href="../ajax/ajax-youtube-tutorial03.html" data-ajax-on-modal>
					<span class="thumb-info thumb-info-lighten border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="../img/projects/project-gz-tutorial03.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner">FlexPDV Mobile - Tutorial Fechamento de Caixa</span>
					<span class="thumb-info-type">PDV Mobile Tutoriais</span>
					</span>
					<span class="thumb-info-action">
								<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
					</span>
					</span>
					</span>
				</a>
			</div>
        </div>
        <div class="col-sm-6 col-lg-3 isotope-item websites">
			<div class="portfolio-item">
				<a href="../ajax/ajax-youtube-tutorial04.html" data-ajax-on-modal>
					<span class="thumb-info thumb-info-lighten border-radius-0">
						<span class="thumb-info-wrapper border-radius-0">
							<img src="../img/projects/project-gz-tutorial04.jpg" class="img-fluid border-radius-0" alt="">
							<span class="thumb-info-title">
								<span class="thumb-info-inner">FlexPDV Mobile - Tutorial Venda Cliente Cadastrado</span>
					<span class="thumb-info-type">PDV Mobile Tutoriais</span>
					</span>
					<span class="thumb-info-action">
								<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
					</span>
					</span>
					</span>
				</a>
			</div>
		</div>

	</div>
</div>

</div>

		</div>
    </section>
    <?php include 'footer.php'; ?>
		</div>

		<script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/355c879d-86ad-458e-819a-1d6ac5e073f1-loader.js" ></script>


		 <!-- Vendor -->
		 <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="../vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.min.js"></script>
    <script src="../vendor/popper/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/common/common.min.js"></script>
    <script src="../vendor/jquery.validation/jquery.validate.min.js"></script>
    <script src="../vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="../vendor/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="../vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
    <script src="../vendor/isotope/jquery.isotope.min.js"></script>
    <script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../vendor/vide/jquery.vide.min.js"></script>
    <script src="../vendor/vivus/vivus.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="../js/theme.js"></script>

    <!-- Current Page Vendor and Views -->
    <script src="../vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="../vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Theme Custom -->
    <script src="../js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="../js/theme.init.js"></script>

      <!-- Examples -->
      <script src="../js/examples/examples.carousels.js"></script>
        <!-- Examples -->
        <script src="../js/examples/examples.portfolio.js"></script>


</body>

</html>