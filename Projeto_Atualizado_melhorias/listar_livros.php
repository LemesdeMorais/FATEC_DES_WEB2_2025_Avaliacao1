<?php
session_start();
require_once("conexao.php");

if (
    !isset($_SESSION['loggedin']) ||
    $_SESSION['loggedin'] !== true ||
    ($_SESSION['username'] !== 'biblio' && $_SESSION['username'] !== 'professor')
) {
    header("location: naolog.php");
    exit();
}

$livros = [];
$resultado = $conn->query("select * from livros order by id desc");
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $livros[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Livros Cadastrados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: rgb(66, 110, 206);
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Lista de Livros Cadastrados</h2>
        <a href="cadastro_livro.php" class="btn btn-primary">Novo Cadastro</a>
        <a href="logout.php" class="btn btn-danger">Sair</a>

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
                    <td colspan="5">Nenhum livro cadastrado ainda.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>