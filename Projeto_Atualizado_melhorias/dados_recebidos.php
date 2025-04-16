<?php
require_once "conexao.php"; // conexão com o banco sql
session_start();

//  Verifica se o usuário está logado como professor
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'professor') {
    header("Location: naolog.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $professor = trim($_POST['professor']);
    $telefone = trim($_POST['telefone']);
    $titulo = trim($_POST['titulo']);
    $quantidade = trim($_POST['quantidade']);

    if (!empty($professor) && !empty($telefone) && !empty($titulo) && is_numeric($quantidade) && $quantidade > 0) {
        // Prepara e executa a query
        $stmt = $conn->prepare("INSERT INTO pedidos (professor, telefone, titulo, quantidade) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $professor, $telefone, $titulo, $quantidade);

        if ($stmt->execute()) {
            echo "<p style='color:green; text-align:center;'>Pedido cadastrado com sucesso!</p>";
        } else {
            echo "<p style='color:red; text-align:center;'>Erro ao cadastrar o pedido.</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color:red; text-align:center;'>Preencha todos os campos corretamente!</p>";
    }
}

echo '<div style="text-align:center;"><a href="form_pedido.php" class="btn btn-primary">Voltar</a></div>';
?>