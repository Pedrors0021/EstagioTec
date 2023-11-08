<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos inscritos nessa vaga</title>

    <!-- Adicionando o CSS do Bootstrap para os cards -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    $rm = $_GET['rm'];

    $sql = "select * from cadastroaluno where rm = $rm;";

    include_once("conexao.php");

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($rm = mysqli_fetch_assoc($resultado)) {
            echo '
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">RM: <a href="dadosinscrito.php?rm=' . $rm['rm'] . '">' . $rm['rm'] . '</a></h5>
                    <p class="card-text">Email: ' . $rm['email'] . '</p>
                    <p class="card-text">Sobre: ' . $rm['sobre'] . '</p>
                    <a href="curriculos/' . $rm['rm'] . '.pdf" class="btn btn-primary">Currículo</a>
                </div>
            </div>
            <br>
            ';
        }
    } else {
        echo "Não há inscritos para essa vaga";
    }
    mysqli_close($conn);
    ?>

    <!-- Adicionando o JavaScript do Bootstrap para os cards -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
