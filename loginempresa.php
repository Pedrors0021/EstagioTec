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
    <form method="post" action="loginempresa.php">
        <div class="main-login">
            <div class="left-login">
                <h1>Faça login<br>E entre para o nosso time como empresa!</h1>
                <img src="login2.svg" class="left-login-image" alt="animação do svg">
            </div>
            <div class="right-login">
                <div class="card-Login">
                    <h1>LOGIN</h1>
                    <div class="textfield">
                        <label for="usuario">CNPJ</label>
                        <input type="text" name="cnpj" placeholder="CNPJ" required>
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>
                    <button class="btn-login">Login</button>
                    <p class="link">
                        Ainda não tem conta?
                        <a class="teste" href="cadastroempresa.php">Cadastre-se</a>
                    </p>
                </div>
            </div>
        </div>
    </form>

    <script>
        function mostrarCadastro() {
            document.getElementById("cadastro").style.display = "block";
        }
    </script>
    
</body>
</html>



<?php 

include('conexao.php');

if(isset($_POST['cnpj']) && isset($_POST['senha'])) {

    if(strlen($_POST['cnpj']) == 0) {
        echo "Preencha com seu CNPJ";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $sql_code = "SELECT senha FROM cadastroempresa WHERE cnpj = ?";
          // Preparar a consulta SQL usando uma instrução preparada
        $stmt = mysqli_prepare($conn, $sql_code);
        mysqli_stmt_bind_param($stmt, "s", $cnpj); // "i" indica que $rm é um inteiro
        mysqli_stmt_execute($stmt);
      
        
        $sql_query = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($sql_query) == 1) {
            
            $usuario = mysqli_fetch_assoc($sql_query);

            if(password_verify($senha, $usuario['senha'])) { // Verificar a senha usando password_verify

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['cnpj'] = $cnpj;
                $_SESSION['senha'] = $usuario['senha'];
            
                // Redirecionar para index.php com uma mensagem de sucesso via GET
                header("Location: index2.php?login_success=true");
                exit;
            } else {
                echo "Falha ao logar! Senha incorreta";
            }
        } else {
            echo "Falha ao logar! Cnpj incorreto";
        }

    }

}
?>






