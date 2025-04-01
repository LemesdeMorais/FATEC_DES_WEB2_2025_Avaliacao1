<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $editora = trim($_POST['editora']);
    $isbn = trim($_POST['isbn']);

    if (!empty($titulo) && !empty($autor) && !empty($editora) && !empty($isbn)) {
        $linha = "$titulo|$autor|$editora|$isbn\n";
        if (file_put_contents("dados_enviados.txt", $linha, FILE_APPEND)) {
            echo "<p class='text-success text-center'>Livro cadastrado com sucesso!</p>";
        } else {
            echo "<p class='text-danger text-center'>Erro ao cadastrar o livro.</p>";
        }
    } else {
        echo "<p class='text-danger text-center'>Todos os campos são obrigatórios!</p>";
    }
}

$livros = file_exists("dados_enviados.txt") ? file("dados_enviados.txt", FILE_IGNORE_NEW_LINES) : [];
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livros</title>
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
        <h2>Cadastro de Livros</h2>
        <form method="post">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="editora">Editora:</label>
                <input type="text" name="editora" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
        </form>

        <h2>Livros Cadastrados</h2>
        <table class="table table-bordered">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>ISBN</th>
            </tr>
            <?php if (!empty($livros)): ?>
                <?php foreach ($livros as $livro): ?>
                    <?php $dados = explode('|', $livro); ?>
                    <tr>
                        <td><?php echo htmlspecialchars($dados[0]); ?></td>
                        <td><?php echo htmlspecialchars($dados[1]); ?></td>
                        <td><?php echo htmlspecialchars($dados[2]); ?></td>
                        <td><?php echo htmlspecialchars($dados[3]); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum livro cadastrado ainda.</td>
                </tr>
            <?php endif; ?>
        </table>

        <p>
            <a href="logout.php" class="btn btn-primary">Sair da conta</a>
        </p>
    </div>
</body>

</html>