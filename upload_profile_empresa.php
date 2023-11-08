<?php
session_start();

include_once('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["profile-image"])) {
        $targetDirectory = "uploads/";
        $cnpj = $_SESSION['cnpj'];
        $extension = pathinfo($_FILES["profile-image"]["name"], PATHINFO_EXTENSION); // Obtenha a extensão da imagem
        $newFileName = $cnpj . "." . $extension; // Nome do arquivo com cnpj do aluno + extensão
        $targetPath = $targetDirectory . $newFileName;

        if (move_uploaded_file($_FILES["profile-image"]["tmp_name"], $targetPath)) {
            // Upload bem-sucedido, armazene o caminho da nova imagem na sessão
            //$_SESSION["new_profile_image"] = $targetPath;
            $stmt = "UPDATE cadastroempresa SET foto = '$targetPath' WHERE cnpj = $cnpj;";
            mysqli_query($conn, $stmt);
            mysqli_close($conn);

            // Redirecione para a página inicial
            header("Location: index2.php");
            exit();
        } else {
            // Upload falhou
            $_SESSION["upload_error"] = "O upload da imagem falhou.";
            header("Location: index2.php");
            exit();
        }
    }
}
?>
