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

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container2 {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            color: #061948;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        textarea,
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        textarea {
            resize: vertical;
        }

        input[type="radio"] {
            margin: 0 10px 0 5px;
        }

        input[type="submit"] {
            background-color: #061948;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0363A7;
        }
    </style>
</head>

<body>
    <div class="main-page-wrapper">
        <div class="theme-menu-wrapper">
            <div class="container">
                <div class="bg-wrapper clearfix">
                    <div class="logo float-left"><a href="index2.php"><img class="logmer" src="images/logo/logos.png" alt=""></a></div>

                    <div class="menu-wrapper float-left">
                        <nav id="mega-menu-holder" class="clearfix">
                            <ul class="clearfix">
                                <li class="active"><a href="index2.php">Início</a></li>
                                <li><a href="contato2.php">Nos contate</a></li>
                                <li><a href="perfilempresa.php">Perfil</a></li>
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
                                echo '<div class="user-welcome mr-3">Faça seu login ou cadastre-se</div>';
                            }
                            ?>
                            <div class="user-circle">

                                <?php

                                if (isset($_SESSION['rm'])) {
                                    // Se o usuário estiver logado
                                    echo '<div class="user-photo">';
                                    include_once('conexao.php');
                                    $stmt = 'select foto from cadastro where rm = ' . $_SESSION['rm'] . ';';
                                    $resultado = mysqli_query($conn, $stmt);
                                    $registro = mysqli_fetch_assoc($resultado);
                                    echo '<img src="' . $registro['foto'] . '" alt="Foto do Usuário">';
                                    mysqli_close($conn);

                                    echo '</div>';
                                    echo '<div class="edit-photo">';
                                    echo '<a href="perfilempresa.php" id="change-photo-btn">Trocar Foto</a>';
                                    echo '</div>';
                                } else {
                                    // Se o usuário não estiver logado
                                    echo '<img src="images/imagempadrao.png" alt="Foto do Usuário">';
                                    echo '<div class="edit-photo">';
                                    echo '<a href="perfilempresa.php" id="change-photo-btn">Trocar Foto</a>';
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

    <div class="container2">
        <div style="padding: 50px;">
            <h2>Formulário de Criação de Vagas</h2>
            <form action="processa_formulario.php" method="post">
                <label for="email">Email da empresa:</label>
                <input type="text" id="email" name="email" required>

                <label for="vaga">Vaga:</label>
                <input type="text" id="vaga" name="vaga" required>

                <label for="descricao">Descrição da Vaga:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>

                <label>Tipo (Estágio ou Trabalho Fixo):</label>
                <input type="radio" id="estagio" name="tipo" value="Estágio" required>
                <label for="estagio">Estágio</label>
                <input type="radio" id="trabalho_fixo" name="tipo" value="Trabalho Fixo" required>
                <label for="trabalho_fixo">Trabalho Fixo</label>

                <label for="salario">Salário:</label>
                <input type="text" id="salario" name="salario">

                <label for="contato">Contato:</label>
                <input type="text" id="contato" name="contato" required>

                <input type="submit" value="Criar Vaga">
            </form>
        </div>
    </div>
</body>
</html>
