<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rm = $_POST['rm'];
    // Verifica se o campo de arquivo foi preenchido e se não houve erros no envio
    if (isset($_FILES["curriculo"]) && $_FILES["curriculo"]["error"] == 0) {
        $destino = "curriculos/$rm.pdf";

        // Move o arquivo para o diretório de destino
        if (move_uploaded_file($_FILES["curriculo"]["tmp_name"], $destino)) {
            echo "O currículo foi enviado com sucesso.";
        } else {
            echo "Ocorreu um erro ao enviar o currículo.";
        }
    } else {
        echo "Por favor, selecione um arquivo de currículo válido para enviar.";
    }
}
?>
