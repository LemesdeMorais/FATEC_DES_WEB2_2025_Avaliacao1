<?php
session_start();
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $editora = trim($_POST['editora']);
    $isbn = trim($_POST['isbn']);

    if (!empty($titulo) && !empty($autor) && !empty($editora) && !empty($isbn)) {
        $stmt = $conn->prepare('insert into livros (titulo, autor, editora, isbn)values (?,?,?,?)');
        $stmt->bind_param('ssss', $titulo, $autor, $editora, $isbn);

        if ($stmt->execute()) {
            echo "<p class='text-success text-center'>Livro Cadastrado com sucesso!</p>";
        } else {
            echo "< p class='text-danger text-center'>Erro ao cadastrar o livro!</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='text-danger text-center'>Todos os campos são obrigatórios!</p>";
    }
}


$livros = [];
$resultado = $conn->query("select * from livros order by id desc");
if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $livros[] = $row;
    }
}
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
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>ISBN</th>
            </tr>
            <?php if (!empty($livros)): ?>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($livro['id']); ?></td>
                        <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                        <td><?php echo htmlspecialchars($livro['editora']); ?></td>
                        <td><?php echo htmlspecialchars($livro['isbn']); ?></td>
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