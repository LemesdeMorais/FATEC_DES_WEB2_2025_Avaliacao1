<?php
require_once "conexao.php";
session_start();

if (
    !isset($_SESSION['loggedin']) ||
    $_SESSION['loggedin'] !== true ||
    ($_SESSION['username'] !== 'biblio' && $_SESSION['username'] !== 'professor')
) {
    header("location: naolog.php");
    exit();
}

$resultado = $conn->query("select * from pedidos order by data_pedido desc");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title> Lista de Pedidos </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>

<body>
    <div class="container" style="margin-top: 40px;">
        <h2> Pedidos de Livros Cadastrados</h2>
        <a href="form_pedido.php" class="btn btn-primary" style="margin-bottom: 20px;">Novo Pedido</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Solicitante</th>
                    <th>Telefone</th>
                    <th>Título do Livro</th>
                    <th>Quantidade</th>
                    <th>Data do Pedido</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($pedido = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pedido['professor']); ?></td>
                        <td><?php echo htmlspecialchars($pedido['telefone']); ?></td>
                        <td><?php echo htmlspecialchars($pedido['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($pedido['quantidade']); ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($pedido['data_pedido'])); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </div>
</body>

</html>