<?php

session_start(); 

session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'biblio') {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $editora = trim($_POST['editora']);
    $isbn = trim($_POST['isbn']);

    if (!empty($titulo) && !empty($autor) && !empty($editora) && !empty($isbn)) {
        $linha = "$titulo|$autor|$editora|$isbn\n";
        if (file_put_contents("dados_enviados.txt", $linha, FILE_APPEND)) {
            echo "<p style='color:green;'>Livro cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar o livro.</p>";
        }
    } else {
        echo "<p style='color:red;'>Todos os campos são obrigatórios!</p>";
    }
}

$livros = file("dados_enviados.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>


</head>

<body>
    <p>Dados armazenados no arquivo TXT !</p>
</body>

</html>