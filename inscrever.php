<?php

$rm = $_GET['rm'];
$id = $_GET['id'];
$data = date("Y-m-d");

include_once("conexao.php");

$stmt = "insert into cadastroinscricao values ($rm, $id, '$data');";

mysqli_query($conn,$stmt);

mysqli_close($conn);

header("location:procurarvagas.php");







?>