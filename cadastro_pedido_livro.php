<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = trim($_POST['cliente']);
    $telefone = trim($_POST['telefone']);
    $titulo = trim($_POST['titulo']);
    $quantidade = trim($_POST['quantidade']);

    if (!empty($cliente) && !empty($telefone) && !empty($titulo) && !empty($quantidade) && is_numeric($quantidade) && $quantidade > 0) {
        $linha = "$cliente|$telefone|$titulo|$quantidade\n";
        if (file_put_contents("pedidos.txt", $linha, FILE_APPEND)) {
            echo "<p class='text-success text-center'>Pedido cadastrado com sucesso!</p>";
        } else {
            echo "<p class='text-danger text-center'>Erro ao cadastrar o pedido.</p>";
        }
    } else {
        echo "<p class='text-danger text-center'>Todos os campos são obrigatórios e a quantidade deve ser um número válido!</p>";
    }
}

$pedidos = file_exists("pedidos.txt") ? file("pedidos.txt", FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: rgb(66, 110, 206);
            color: white;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cadastro de Pedidos</h2>
        <form method="post">
            <div class="form-group">
                <label for="cliente">Nome Solicitante:</label>
                <input type="text" name="cliente" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="titulo">Título do Livro:</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Pedido</button>
        </form>

        <h2>Pedidos Cadastrados</h2>
        <table class="table table-bordered">
            <tr>
                <th>Nome Solicitante</th>
                <th>Telefone</th>
                <th>Título do Livro</th>
                <th>Quantidade</th>
            </tr>
            <?php if (!empty($pedidos)): ?>
                <?php foreach ($pedidos as $pedido): ?>
                    <?php
                    $dados = explode('|', $pedido);
                    if (count($dados) === 4): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($dados[0]); ?></td>
                            <td><?php echo htmlspecialchars($dados[1]); ?></td>
                            <td><?php echo htmlspecialchars($dados[2]); ?></td>
                            <td><?php echo htmlspecialchars($dados[3]); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum pedido cadastrado ainda.</td>
                </tr>
            <?php endif; ?>
        </table>

        <p>
            <a href="logout.php" class="btn btn-primary">Sair da conta</a>
        </p>
    </div>
</body>

</html>