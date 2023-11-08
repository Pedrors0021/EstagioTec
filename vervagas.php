<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Veja suas vagas</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
		<!-- responsive style sheet -->
	
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: black;
            text-align: center; /* Centralizar o texto */
        }

        form {
            text-align: center;
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 200px;
            padding: 5px;
            margin: 5px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            margin: 10px;
            width: 18rem;
        }
        </style>
</head>
<body>
    <!-- Adicione a Navbar do primeiro código aqui -->
    <div class="theme-menu-wrapper">
        <div class="container">
            <div class="bg-wrapper clearfix">
                <div class="logo float-left">
                    <a href="indexaluno.php"><img class="logmer" src="images/logo/logos.png" alt=""></a>
                </div>
                <div class="menu-wrapper float-left">
                    <nav id="mega-menu-holder" class="clearfix">
                        <ul class="clearfix">
                            <li class="active"><a href="index2.php">Início</a></li>
                            <li><a href="sobre.php">Sobre nós</a></li>
                            <li><a href="contato.php">Nos contate</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim da Navbar -->
   
            <h2>Veja as vagas que você já cadastrou!</h2> <br>
            <?php

            include('conexao.php');

            session_start();
    
            if (isset($_SESSION['rm'])) {
                echo '<div class="user-welcome mr-3">Você está logado! RM: ' . $_SESSION['rm'] . '</div>';
                echo '<a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Sair </a>';
            } elseif (isset($_SESSION['cnpj'])) {
                echo '<div class="user-welcome mr-3">Você está logado como empresa! CNPJ: ' . $_SESSION['cnpj'] . '</div>';
                echo '<a href="logout.php" class="logout-link"><i class="fas fa-sign-out-alt"></i> Sair </a>';
            } else {
                echo '<div class
                
                ="user-welcome mr-3">Faça seu login ou cadastre-se</div>';
            }
          
    
            $user_cnpj = $_SESSION['cnpj'];
            ?>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
                $sql = "SELECT * FROM cadastrovaga where cnpj_empresa = '$user_cnpj';";
        $result = $conn->query($sql);

        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Loop através dos resultados e exibe as vagas em caixas
            while ($row = $result->fetch_assoc()) {
                $empresa = "select vaga from cadastrovaga where cnpj_empresa = '".$row['cnpj_empresa']."';";
                $result1 = $conn->query($empresa);
                $row1 = $result1->fetch_assoc();
                echo '
                <div class="col">
                <div class="card h-100">
                <div class="card-header"><h4>
                ' . $row["vaga"] . '
                </h4></div>
                 
                  <div class="card-body">
                  
                    <p class="card-text">
                    <h5>Descrição</h5>
                    ' . $row["descricao"] . '</p>
                    <p class="card-text">
                    <h5>Tipo:</h5>
                    ' . $row["tipo"] . '</p>
                     <h5>Salário:</h5>
                    <p class="card-text">' . $row["salario"] . '</p>
                     <h5>Contato:</h5>
                    <p class="card-text">' . $row["contato"] . '</p>
                    
                    
                  </div>
                  <div class="card-footer">
                    <a href="inscritos.php?id='.$row["id"].'" class="btn btn-primary">Lista de inscritos</a>
                    </div>
                </div>
              </div>
              ';
               
            }}              


            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
