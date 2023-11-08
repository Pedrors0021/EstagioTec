<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rm = $_POST['usuario'];

    // Conexao
    include_once('conexao.php');

    // Hash the password for security
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    // Set the default image path
    $defaultImagePath = 'images/imagempadrao.png';

    // Cadastrar o usuário no site
    $stmt = mysqli_prepare($conn, "INSERT INTO cadastroaluno (email, senha, rm, foto) VALUES (?, ?, ?, ?)");

    // Verifica se a preparação da declaração foi bem-sucedida
    if (!$stmt) {
        echo "Erro ao preparar a instrução SQL: " . mysqli_error($conn);
        exit;
    }

    // Vincula os dados
    mysqli_stmt_bind_param($stmt, 'ssss', $email, $hashedSenha, $rm, $defaultImagePath);

    // Executa a instrução
    if (mysqli_stmt_execute($stmt)) {
        echo "Usuário cadastrado com sucesso!<br>";
        echo "<a href='index.php'>Voltar à página inicial</a>";
    } else {
        echo "Erro ao cadastrar usuário.<br>";
        echo mysqli_error($conn) . "<br>";
        echo "<a href='cadastro.php'>Voltar</a>";
    }

    // Fecha a instrução
    mysqli_stmt_close($stmt);
    // Fecha a conexão com o BD
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="estilodoformulario.css" />
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça seu cadastro<br>E entre para o nosso time</h1>
            <img src="login2.svg" class="left-login-image" alt="animação do svg">
        </div>

        <div class="right-login">
            <div class="card-Login">
                <h1>Cadastro</h1>

                <form method="post" action="cadastro.php">
                    <div class="textfield">
                        <label for="usuario">RM</label>
                        <input type="text" name="usuario" placeholder="Usuário" required>
                    </div>

                    <div class="textfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="estagiotec@gmail.com" required>
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>

                    <button class="btn-login" type="submit">Cadastre-se</button>
                </form>



                <p class="link">
                    Já possui conta?
                    <a class="teste" href="loginformulario.php" onclick="mostrarCadastro()">Logar</a>
                </p>
                <p class="link">
                    Você é uma empresa? 
                    <a class="teste" href="cadastroempresa.php" onclick="mostrarCadastro()">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function mostrarCadastro() {
            document.getElementById("cadastro").style.display = "block";
        }
    </script>
    
</body>
</html>



