<?php
session_start();

include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["profile-image"])) {
        $targetDirectory = "uploads/";
        $rm = $_SESSION['rm'];
        $extension = pathinfo($_FILES["profile-image"]["name"], PATHINFO_EXTENSION); // Obtenha a extensão da imagem
        $newFileName = $rm . "." . $extension; // Nome do arquivo com RM do aluno + extensão
        $targetPath = $targetDirectory . $newFileName;

        if (move_uploaded_file($_FILES["profile-image"]["tmp_name"], $targetPath)) {
            // Upload bem-sucedido, armazene o caminho da nova imagem na sessão
            //$_SESSION["new_profile_image"] = $targetPath;
            $stmt = "UPDATE cadastroaluno SET foto = '$targetPath' WHERE rm = $rm;";
            mysqli_query($conn, $stmt);
            mysqli_close($conn);

            // Redirecione para a página inicial
            header("Location: indexaluno.php");
            exit();
        } else {
            // Upload falhou
            $_SESSION["upload_error"] = "O upload da imagem falhou.";
            header("Location: perfil.php");
            exit();
        }
    }
}
?>
