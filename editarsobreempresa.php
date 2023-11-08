<?php

include_once("conexao.php");
$sobre= $_GET['sobre'];
$cnpj = $_GET['cnpj'];



$stmt = "update cadastroempresa set sobre='$sobre' where cnpj = '$cnpj'";

mysqli_query($conn,$stmt);

mysqli_close($conn);

header("location:perfilempresa.php");





?>