<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblioteca";

$conn = new mysqli($host, $usuario, $senha, $banco);
$conn->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>