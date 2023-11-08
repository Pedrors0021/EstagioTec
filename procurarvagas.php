<!DOCTYPE html>
<html lang="en">
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
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
		

	
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
									</ul>
								</nav>
							</div> 

						</div> 
					</div> 
				</div> 
			</header>  <br><br><br><br>
			

            <div class="titulo">
  <h2 style="text-align: center; font-size: 2rem; margin-bottom: 20px; color: #333;">Descubra vagas disponíveis!</h2>
</div>


           <br><br><br><br>

            <div class="principal">
    <div class="empresas-container">


  
	
	<style>
        /* Estilo para as caixas de vaga */
        .vaga-box {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Estilo para o título da vaga */
        .vaga-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        /* Estilo para os detalhes da vaga */
        .vaga-details {
            margin-top: 10px;
            font-size: 16px;
            color: #666;
        }
    </style>
</head>
<body>

<?php
// Conexão com o banco de dados
include_once("conexao.php");
session_start();
// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para recuperar as vagas
$sql = "SELECT * FROM cadastrovaga";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Loop através dos resultados e exibe as vagas em caixas
    while ($row = $result->fetch_assoc()) {
		$empresa = "select nome from cadastroempresa where cnpj = '".$row["cnpj_empresa"]."';";
		$result1 = $conn->query($empresa);
		$row1 = $result1->fetch_assoc();
        echo '<div class="vaga-box">';
        echo '<div class="vaga-title">' . $row["vaga"] . '</div>';
        echo '<div class="vaga-details"><strong>Descrição:</strong> ' . $row["descricao"] . '</div>';
        echo '<div class="vaga-details"><strong>Tipo:</strong> ' . $row["tipo"] . '</div>';
        echo '<div class="vaga-details"><strong>Salário:</strong> ' . $row["salario"] . '</div>';
        echo '<div class="vaga-details"><strong>Contato:</strong> ' . $row["contato"] . '</div>';
        echo '<div class="vaga-details"><strong>Empresa:</strong> ' . $row1["nome"] . '</div>';
        echo '<div class="vaga-details"><strong>Email:</strong> ' . $row["email"] . '</div>';
		
		$sqlinscrito = "select * from cadastroinscricao where rm_aluno = ".$_SESSION['rm']." and id_vaga =".$row["id"]." ;";
		
		$resultinscricao = mysqli_query($conn,$sqlinscrito);
		// $rowinscricao = mysqli_fetch_assoc($resultinscricao);
		if(mysqli_num_rows($resultinscricao)==0){
			echo '<div class="vaga-details"><a href="inscrever.php?rm='.$_SESSION['rm'].'&id=' . $row["id"] . '" class="btn btn-primary">Inscreva-se</a></div>';
		}else{
			echo '<div class="vaga-details"><p class="btn btn-secondary">Inscrito</p></div>';
		}
	
        echo '</div>';
    }
} else {
    echo "Nenhuma vaga de emprego encontrada.";
}


// Fechar conexão com o banco de dados
$conn->close();
?>

      </div>

  </div><br><br><br><br><br><br><br><br>


			


			<div class="our-solution section-spacing">
				<div class="container">
					<div class="theme-title-one">
						<h2>Extras</h2>
					</div> 
					<div class="wrapper">
						<div class="row">
						<div class="col-lg-4 col-sm-6 col-12">
                        <div class="single-solution-block">
                            <a href="curriculo.php"  >
                                <img src="images/icon/suitcase.svg" alt="" class="icon">
                                <h5>Como fazer um currículo? </h5>
                                <p>Veja modelos e a melhor forma de organizar seu currículo!</p>
                            </a>
                        </div>
							</div>
							
							<div class="col-lg-4 col-sm-6 col-12">
						<div class="single-solution-block">
                        <a href="https://www.facebook.com/etecsmc/?locale=pt_BR" target="_blank" >
							<img src="images/icon/target.svg" alt="" class="icon">
							<h5><a href="https://www.facebook.com/etecsmc/?locale=pt_BR" target="_blank">Facebook</a></h5>
							<p>Conheça a página da escola no Facebook! </p>
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
										<a href="#">estagiotec@gmail.com</a>
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
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
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
		<!-- Language Stitcher -->
		<script src="vendor/language-switcher/jquery.polyglot.language.switcher.js"></script>
		<!-- Google map js -->



		<!-- Theme js -->
		<script src="js/theme.js"></script>
		<!--<script src="js/map-script.js"></script> -->
		<script src="https://maps.googleapis.com/maps/api/js?key=Past Your Google Map Key Here"></script>
		<script src="js/googlemap.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>





