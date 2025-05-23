<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page-header">
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <p>Bem-vindo ao nosso Sistema</p>
        <p>Qual operação gostaria de realizar?</p>

        <a href="dados_enviados.txt" class="btn btn-primary">Listar todos os livros</a>
        <a href="cadastro_pedido_livro.php" class="btn btn-primary">Cadastrar pedidos de Livros</a>
    </div>
    <p>
        <a href="logout.php" class="btn btn-primary">Sair da conta</a>
    </p>
</body>

</html>