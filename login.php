<?php 

include('conexao.php');

if(isset($_POST['rm']) && isset($_POST['senha'])) {

    if(strlen($_POST['rm']) == 0) {
        echo "Preencha com seu RM";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $rm = mysqli_real_escape_string($conn, $_POST['rm']);
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);

        $sql_code = "SELECT senha FROM cadastroaluno WHERE rm = ?";
          // Preparar a consulta SQL usando uma instrução preparada
        $stmt = mysqli_prepare($conn, $sql_code);
        mysqli_stmt_bind_param($stmt, "i", $rm); // "i" indica que $rm é um inteiro
        mysqli_stmt_execute($stmt);
      
        
        $sql_query = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($sql_query) == 1) {
            
            $usuario = mysqli_fetch_assoc($sql_query);

            if(password_verify($senha, $usuario['senha'])) { // Verificar a senha usando password_verify
                session_start();
                $_SESSION['rm'] = $rm;
                $_SESSION['senha'] = $usuario['senha'];
            
                // Redirecionar para index.php com uma mensagem de sucesso via GET
                header("Location: indexaluno.php?login_success=true");
                exit;
            } else {
                echo "Falha ao logar! Senha incorreta";
            }
        } else {
            echo "Falha ao logar! RM incorreto";
        }

    }

}
?>


