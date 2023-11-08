<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Veja suas vagas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
            margin: 0;
        }

        h2 {
            margin-top: 20px;
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
    <h1>Veja quem já se cadastrou nas suas vagas</h1>

    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="vervagas.php">Vagas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroaluno.php">Alunos cadastrados</a>
      </li>
    
    </ul>
  </div>

 
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
      


        $sql = "SELECT * FROM cadastrovaga where cnpj_empresa = '$user_cnpj';";
        $result = $conn->query($sql);

        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Loop através dos resultados e exibe as vagas em caixas
            while ($row = $result->fetch_assoc()) {
                $empresa = "select vaga from cadastrovaga where cnpj_empresa = '".$row['cnpj_empresa']."';";
                $result1 = $conn->query($empresa);
                $row1 = $result1->fetch_assoc();
                echo '<div class="vaga-box">';
                echo '<div class="vaga-details"><strong>Vaga:</strong>' . $row["vaga"] . '</div>';
                echo '<div class="vaga-details"><strong>Descrição:</strong> ' . $row["descricao"] . '</div>';
                echo '<div class="vaga-details"><strong>Tipo:</strong> ' . $row["tipo"] . '</div>';
                echo '<div class="vaga-details"><strong>Salário:</strong> ' . $row["salario"] . '</div>';
                echo '<div class="vaga-details"><strong>Contato:</strong> ' . $row["contato"] . '</div>';
                echo '<div class="vaga-details"><strong>Email:</strong> ' . $row["email"] . '</div>';
            }}              
?>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>