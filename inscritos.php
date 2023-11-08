<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Adicionando o CSS do Bootstrap para os cards -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    $id = $_GET['id'];

    $sql = "select * from cadastroinscricao where id_vaga = $id;";

    include_once("conexao.php");

    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($i = mysqli_fetch_assoc($resultado)) {
            echo '
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">RM: <a href="dadosinscrito.php?rm=' . $i['rm_aluno'] . '">' . $i['rm_aluno'] . '</a></h5>
                    <p class="card-text">Data: ' . $i['data'] . '</p>
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
