<?php

include_once("conexao.php");
$sobre= $_GET['sobre'];
$rm = $_GET['rm'];



$stmt = "update cadastroaluno set sobre='$sobre' where rm = '$rm'";

mysqli_query($conn,$stmt);

mysqli_close($conn);

header("location:perfil.php");





?>