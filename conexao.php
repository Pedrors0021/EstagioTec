<?php

// Parametros de conexão
$servidor = "localhost";
$u = "root";
$s = "";
$bd = "bd_tcc";

// Conexao com o BD
$conn = mysqli_connect($servidor, $u, $s, $bd);

// Verifica se a conexão foi bem-sucedida
if (mysqli_connect_errno()) {
    die("Falha na conexão com o BD: " . mysqli_connect_error($conn));
}

?>