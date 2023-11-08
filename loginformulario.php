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
    <form method="post" action="login.php">
        <div class="main-login">
            <div class="left-login">
                <h1>Faça login<br>E entre para o nosso time</h1>
                <img src="login2.svg" class="left-login-image" alt="animação do svg">
            </div>
            <div class="right-login">
                <div class="card-Login">
                    <h1>LOGIN</h1>
                    <div class="textfield">
                        <label for="usuario">RM</label>
                        <input type="text" name="rm" placeholder="Usuário" required>
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>
                    <button class="btn-login">Login</button>
                    <p class="link">
                        Ainda não tem conta?
                        <a class="teste" href="cadastro.php">Cadastre-se</a>
                    </p>
                    <p class="link">
                    Você é uma empresa? Faça seu login
                    <a class="teste" href="loginempresa.php" onclick="mostrarCadastro()">Logar</a>
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





