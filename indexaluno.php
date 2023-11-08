<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<!-- Website Title -->
	<title>EstágioTec</title>
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#061948">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#061948">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="perfil.js"></script>

</head>

<body>
	<div class="main-page-wrapper">
		<div id="loader-wrapper">
			<div id="loader"></div>
		</div>
		<div class="theme-menu-wrapper">
			<div class="container">
				<div class="bg-wrapper clearfix">
					<div class="logo float-left"><a href="indexaluno.php"><img class="logmer" src="images/logo/logos.png" alt=""></a></div>

					<div class="menu-wrapper float-left">
						<nav id="mega-menu-holder" class="clearfix">
							<ul class="clearfix">
								<li class="active"><a href="indexaluno.php">Início</a></li>
								<li><a href="sobre.php">Sobre nós</a></li>
								<li><a href="contato.php">Nos contate</a></li>
								<li><a href="perfil.php">Perfil</a></li>
							</ul>
						</nav>
					</div>

					<div class="user-menu-wrapper float-right">
						<div class="d-flex align-items-center">
							<?php
							session_start();

							if (isset($_SESSION['rm'])) {
								echo '<div class="user-welcome mr-3">Você está logado! RM: ' . $_SESSION['rm'] . '</div>';
								echo '<a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Sair </a>';
							} elseif (isset($_SESSION['cnpj'])) {
								echo '<div class="user-welcome mr-3">Você está logado como empresa! CNPJ: ' . $_SESSION['cnpj'] . '</div>';
								echo '<a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Sair </a>';
							} else {
								echo '<a href="cadastro.php"><div class="user-welcome mr-3">Faça seu login ou cadastre-se</div></a>';
							}
       						 ?>
							<div class="user-circle">
						
								<?php
								

								if (isset($_SESSION['rm'])) {
									// Se o usuário estiver logado
									echo '<div class="user-photo">';
									include_once('conexao.php');
									$stmt = 'select foto from cadastroaluno where rm = '.$_SESSION['rm'].';';
									$resultado = mysqli_query($conn, $stmt); 
									$registro = mysqli_fetch_assoc($resultado);
									echo '<img src="'.$registro['foto'].'" alt="Foto do Usuário">';
									mysqli_close($conn);

									echo '</div>';
									echo '<div class="edit-photo">';
									echo '<a href="perfil.php" id="change-photo-btn">Trocar Foto</a>';
									echo '</div>';
								} else {
									// Se o usuário não estiver logado
									echo '<img src="images/imagempadrao.png" alt="Foto do Usuário">';
									echo '<div class="edit-photo">';
									echo '<a href="perfil.php" id="change-photo-btn">Trocar Foto</a>';
									echo '</div>';
								}
								?>
							</div>




						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
	</div>
	</div>

	<div id="theme-main-banner" class="banner-one meraba">
		<div data-src="images/slideshow/etec.png">
			<div class="camera_caption">
				<div class="container">
					<h1 class="wow fadeInUp animated" data-wow-delay="0.2s"> <br></h1>
				</div>
			</div>
		</div>
		<div data-src="images/slideshow/eetec.png">
			<div class="camera_caption">
				<div class="container">

					<h1 class="wow fadeInUp animated white" data-wow-delay="0.2s"> <br></h1>
					<a href="about.php" class="theme-button-one wow fadeInUp animated" data-wow-delay="0.39s"></a>
				</div>
			</div>
		</div>
		<div data-src="images/slideshow/eeetec.png">
			<div class="camera_caption">
				<div class="container">

					<h1 class="wow fadeInUp animated" data-wow-delay="0.2s"> <br></h1>

				</div>
			</div>
		</div>
	</div>


	<div class="callout-banner section-spacing">
		<div class="container clearfix">
		</div>
	</div>

	<style>
    .solution-container {
        display: flex;
        justify-content: center;
    }
</style>
<div class="our-solution section-spacing">
    <div class="container">
        <div class="theme-title-one">
            <h2>Extras</h2>
            <div class="solution-container">
			<div class="col-lg-4 col-sm-6 col-12">
						<div class="single-solution-block">
                        <a href="procurarvagas.php"  >
							<img src="images/icon/money.svg" alt="" class="icon">
							<h5><a href="procurarvagas.php">Procurando vagas?</a></h5>
							<p>Conheça as empresas que possuam vagas abertas! </p>
						</div>
					</div>
			<div class="col-lg-4 col-sm-6 col-12">
                        <div class="single-solution-block">
                            <a href="curriculo.php"  >
                                <img src="images/icon/suitcase.svg" alt="" class="icon">
                                <h5><a href="curriculo.php">Como fazer um currículo?</a> </h5>
                                <p>Veja modelos e a melhor forma de organizar seu currículo!</p>
                            
                        </div>
                	</div>
            <div class="col-lg-4 col-sm-6 col-12">
                    <div class="single-solution-block">
						<a href="https://www.facebook.com/etecsmc/?locale=pt_BR" target="_blank" > 
                        <img src="images/icon/target.svg" alt="" class="icon">
                        <h5><a href="https://www.facebook.com/etecsmc/?locale=pt_BR" target="_blank">Facebook</a></h5>
                        <p>Conheça a página da escola!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
				<div class="single-solution-block">
						<a href="https://www.instagram.com/etecsylviodemattos/" target="_blank" > 
                        <img src="images/icon/analysis.svg" alt="" class="icon">
                        <h5><a href="https://www.instagram.com/etecsylviodemattos/" target="_blank"> Instagram </a></h5>
                        <p>Conheça a página da escola no Instagram!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

	<footer class="theme-footer-two">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6 col-12 logo-widget">
						<div class="logo"><a href="indexaluno.php"><img class="logmer" src="images/logo/logos.png" alt=""></a></div>
					</div>
					<div class="col-lg-3 col-sm-6 col-12 footer-gallery">
						<h6 class="title"></h6>
						<div class="wrapper">
							<div class="row">
								<div class="col-4">

								</div>
								<div class="col-4">

								</div>
								<div class="col-4">

								</div>
								<div class="col-4">

								</div>
								<div class="col-4">

								</div>
								<div class="col-4">

								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6 col-12 contact-widget">
						<h6 class="title">CONTATO</h6>
						<ul>
							<li>
								<i class="flaticon-direction-signs"></i>
								Rua Cesario Mota, 644, Rua Centro Matão - SP
							</li>
							<li>
								<i class="flaticon-multimedia-1"></i>
								<a href="#">estagiotectec@gmail.com</a>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container">

			</div>
		</div>
	</footer>





	<button class="scroll-top tran3s">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</button>



	<script src="vendor/jquery.2.2.3.min.js"></script>
	<!-- Popper js -->
	<script src="vendor/popper.js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Camera Slider -->
	<script src='vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	<script src='vendor/Camera-master/scripts/jquery.easing.1.3.js'></script>
	<script src='vendor/Camera-master/scripts/camera.min.js'></script>
	<!-- menu  -->
	<script src="vendor/menu/src/js/jquery.slimmenu.js"></script>
	<!-- WOW js -->
	<script src="vendor/WOW-master/dist/wow.min.js"></script>
	<!-- owl.carousel -->
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
	<!-- js count to -->
	<script src="vendor/jquery.appear.js"></script>
	<script src="vendor/jquery.countTo.js"></script>
	<!-- Fancybox -->
	<script src="vendor/fancybox/dist/jquery.fancybox.min.js"></script>
	<script src="vendor/language-switcher/jquery.polyglot.language.switcher.js"></script>


	<script src="js/theme.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=Past Your Google Map Key Here"></script>
	<script src="js/googlemap.js"></script>
	</div>

</body>

</html>