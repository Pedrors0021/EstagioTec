<?php
// Inclua o arquivo de conexão com o banco de dados
include_once("conexao.php");
session_start();

// Variável para armazenar o status do cadastro
$status = '';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores dos campos do formulário
    $vaga = $_POST["vaga"];
    $descricao = $_POST["descricao"];
    $tipo = $_POST["tipo"];
    $salario = $_POST["salario"];
    $contato = $_POST["contato"];
    $empresa = $_SESSION['cnpj'];
    $email = $_POST["email"];

    // Prepare e execute a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO cadastrovaga  VALUES (null, ?, ?, ?, ?, ?, ?, ?)";
    
    // Use declarações preparadas para evitar ataques de SQL Injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $vaga, $descricao, $tipo, $salario, $contato, $email, $empresa);
        
        if ($stmt->execute()) {
            // Os dados foram inseridos com sucesso
            $status = 'success'; // Defina o status como sucesso
        } else {
            // Houve um erro na execução da consulta
            $status = 'error';
        }

        // Fecha a instrução preparada
        $stmt->close();
    } else {
        // Houve um erro na preparação da consulta
        $status = 'error';
    }

    // Fecha a conexão com o BD
    $conn->close();
}

// Redirecionamento com base no status
if ($status === 'success') {
    // Use JavaScript para exibir um alerta e redirecionar o usuário
    echo '<script>alert("Vaga cadastrada com sucesso!"); window.location.href = "index2.php";</script>';
    exit();
}
?>
