<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Bibliotecário</title>
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
        <p>Seja bem-vindo ao nosso sistema</p>
        <p>Qual operação deseja realizar?</p>

        <a href="cadastro.php" class="btn btn-primary">Cadastrar livros</a>
        <a href="cadastro_pedido_livro.php" class="btn btn-primary">Listar pedido de livros</a>
        <a href="dados_enviados.txt" class="btn btn-primary">Listar todos os livros</a>
    </div>
    <p>
        <a href="logout.php" class="btn btn-primary">Sair da conta</a>
    </p>
</body>

</html>