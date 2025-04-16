<?php 
session_start(); 


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['username'] !== 'professor') {
    header("Location: naolog.php");
    exit;
}
?>

?>

    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <title> Cadastro de pedido</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    </head>

    <body>
        <div class="container" style="margin: 50px auto; max-width:600px;">
            <h2>Cadastro de Pedido de Livro</h2>
            <form action="dados_recebidos.php" method="post">
                <div class="form-group">
                    <label>Nome do solicitante:</label>
                    <input type="text" name="professor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Título do livro:</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Pedido</button>
                <a href="lista_pedidos.php" class="btn btn-success">Ver Pedidos</a>

            </form>

    </body>

    </html>