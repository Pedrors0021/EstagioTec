<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Procurar Alunos</title>
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
    <h1>Procurar Alunos</h1>

    <form method="POST" action="">
        <label for="rm">RM do aluno:</label>
        <input type="text" name="rm" id="rm">
        <input type="submit" value="Procurar">
    </form>
    <?php
    // Inclua o arquivo de conexão com o banco de dados
    include_once('conexao.php');

    // Consulta SQL para buscar alunos com o RM especificado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rm'])) {
        $rm = $_POST['rm'];
        $sql = "SELECT * FROM cadastroaluno WHERE rm = '$rm'";
    } else {
        // Consulta SQL para buscar todos os alunos
        $sql = "SELECT * FROM cadastroaluno";
    }

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // Exibir resultados em uma lista
        echo "<h2><center>Resultados:</center></h2>";
        echo "<div class='card-deck'>";
    
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Obter o RM do aluno
            $rm = $row['rm'];
    
            // Extensões de imagem permitidas
            $extensoesPermitidas = array("jpg", "jpeg", "png");
    
            // Construir o caminho da imagem com base no RM e extensão
            foreach ($extensoesPermitidas as $extensao) {
                $caminhoImagem = "uploads/" . $rm . "." . $extensao;
                if (file_exists($caminhoImagem)) {
                    break;
                }
            }
    
            echo '<div class="card">
            <img class="card-img-top" src="' . $caminhoImagem . '" alt="Foto de ' . $row['rm'] . '">
            <div class="card-body">
              <h5 class="card-title">' . $row['rm'] . ' - ' . $row['email'] . '</h5>
              <p class="card-text">' . $row['sobre'] . '</p>
              <p class="card-text"><small class="text-muted">Última atualização:agora há pouco</small></p>
              <a href="curriculos/' . $row['rm'] . '.pdf" class="btn btn-primary">Currículo</a>
            </div>
          </div>';
        }
    
        echo "</div>";
    } else {
        if (isset($_POST['rm'])) {
            echo "Nenhum aluno encontrado com o RM especificado.";
        } else {
            echo "Nenhum aluno cadastrado no site ainda.";
        }
    }
    

    // Feche a conexão com o banco de dados
    mysqli_close($conn);
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
