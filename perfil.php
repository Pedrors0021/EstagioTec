

<!DOCTYPE html>
<html>
	<head>
			<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="theme-color" content="#061948">
			<meta name="msapplication-navbutton-color" content="#061948">
			<meta name="apple-mobile-web-app-status-bar-style" content="#061948">
		 			<title>EstágioTec</title>
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/responsive.css">
			<link rel="stylesheet" type="text/css" href="caminho-para/cropper.min.css">
		
		
		<style type="text/css">
			
			* {
				font-family: 'Ubuntu', sans-serif;	
				margin: 0;
				padding: 0;
			}
			
			body {
				font-family: 'Ubuntu', sans-serif;
				text-align: center;
				background-color: #f1f1f1;
			}
					
			.header {
				background-color: #fff;
				padding: 20px;
			}
			
			.header > h1 {
				color: #1C1C1C;
			}
			
			.header > img.avatar {
				width: 200px;
				border-radius: 10%;
				filter: grayscale(1);
				transition: .3s;
				cursor: pointer;
			}
			
			.img.ico {
				margin-top: 15px;
				width: 20px;
				border-radius: 10%;
				filter: grayscale(1);
				cursor: pointer;
			}
			
			img.avatar:hover {
				cursor: pointer;
				filter: grayscale(0);
				border-radius: 50%;
				box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
			}
			
			.about {
				background-color: #fff;
				margin: 10px;
				padding: 10px;
			}
			
			.about > h1 {				
				color: #1C1C1C;
				font-size: 1.25em;
			}
			
			.detalhes > h1 {				
				color: #1C1C1C;
				font-size: 1.25em;
			}
			
			.negrito {
				font-weight: 700;				
			}
			
			p {
				color: #404040;
				padding: 10px;
			}

			#profile-form {
            text-align: center;
        }
        
        #my-file {
            margin: 10px 0;
            width: 100%; /* O botão ocupa 100% da largura do contêiner */
        }
        
        #save {
            background-color: #061948;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* O botão ocupa 100% da largura do contêiner */
        }
        
        #save:hover {
            background-color: #05173a;
        }

        #user-info {
            margin-top: 20px;
        }

        #user-info h3 {
            font-size: 18px;
            color: #061948;
            margin-bottom: 10px;
        }

        #edit-profile-link {
            color: #061948;
            text-decoration: underline;
            cursor: pointer;
        }

        #edit-profile-link:hover {
            color: #05173a;
        }
			
		.footer {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100px;
		}

		.ico {
			margin: 0 10px;
			transition: transform 0.2s ease-in-out; /* Adiciona uma transição suave */
			cursor: pointer; /* Altera o cursor para um indicador de clique */
		}

		.ico:hover {
			transform: scale(1.2); /* Aumenta a escala ao passar o mouse */
    	}

					.about {
				/* ... Outros estilos ... */
				text-align: center; /* Centralize o conteúdo horizontalmente */
			}

			.salvar-button{
				background-color: #061948;
				color: #fff;
				border: none;
				padding: 10px 20px;
				border-radius: 5px;
				

			}
		


		</style>
		
	</head>
		
	<body>
	<div class="header">
    <h1>Meu perfil</h1>

<?php

    // Inicie a sessão
    session_start();

    // Verifique se o usuário está logado
    if (isset($_SESSION['rm'])) {
        include_once('conexao.php');
        $stmt = 'select foto, sobre, email, rm from cadastroaluno where rm = ' . $_SESSION['rm'] . ';';
        $resultado = mysqli_query($conn, $stmt);
        $registro = mysqli_fetch_assoc($resultado);

        // Verifique se um registro foi encontrado
        if ($registro) {
            echo '<img class="avatar" src="' . $registro['foto'] . '" alt="Avatar">';
        } else {
            echo '<p>Profile image not found</p>';
        }

        mysqli_close($conn);
    } else {
        echo '<p>User not logged in</p>';
    }
    ?>
</div>

<div class="about">
    <h1>Sobre mim</h1>
    
    <form method="get" action="editarsobre.php">
        <input type="hidden" name="rm" value="<?php echo $_SESSION['rm']; ?>">
        <textarea name="sobre" rows="10" cols="100" maxlength="600"><?php echo $registro['sobre']; ?></textarea>
        <p id="sobre-detalhes"></p>
        <textarea id="sobre-edit" style="display: none;"><?php echo $registro['sobre']; ?></textarea>
        <center><button type="submit" class="salvar-button">
            Salvar <i class="fas fa-save"></i>
        </button> </center>
    </form>
</div>



<div class="detalhes">
    <h1>Detalhes</h1>
    <!-- Campo de email editável -->
	<span class="negrito">Meu email: </span>
<span id="email-detalhes"><?php echo $registro['email']; ?></span>
<br><br><br>

    <span class="negrito">Meu RM:</span>
    <span id="rm"><?php echo $registro['rm']; ?></span>
</div><br><br>

<form action="processar_formulario.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="rm" value="<?php echo $_SESSION['rm']; ?>"> 
<label for="curriculo" class="negrito">Anexe seu currículo:</label>
<p> (Observação: Apenas arquivos PDF)</p> <br>
  <input type="file" id="curriculo" name="curriculo" accept=".pdf">
  <input type="submit" value="Enviar">
</form>

<br><br><br><br>

    <h2>Sua foto de perfil</h2>

    <center> <form id="profile-form" action="upload_profile.php" method="post" enctype="multipart/form-data">
        <input type="file" id="my-file" name="profile-image" accept="image/*" />
        <br>
        <input type="submit" value="Salvar foto" id="save" />
    </form>
</div>
</div> </center>    <br><br><b><br></b> <br><br><br><br> 

<div class="footer">
    <a href="link_do_instagram.html" target="_blank">
        <img src="ico_insta.png" class="ico" alt="Instagram">
    </a>
    <a href="link_do_twitter.html" target="_blank">
        <img src="ico_twitter.png"  class="ico" alt="Twitter">
    </a>
    <a href="link_do_facebook.html" target="_blank">
        <img src="ico_facebook.png" class="ico" alt="Facebook">
    </a>
</div>
</body>
</html>