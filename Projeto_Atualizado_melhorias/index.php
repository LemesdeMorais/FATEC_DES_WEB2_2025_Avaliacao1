<?php
session_start();

# Redireciona se já estiver logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['username'] === 'professor') {
        header("Location: professor.php");
        exit;
    } elseif ($_SESSION['username'] === 'biblio') {
        header("Location: bibliotecario.php");
        exit;
    } else {
        header("Location: visitante.php");
        exit;
    }
}

# Verificação do login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] === 'professor' && $_POST['password'] === 'professor') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'professor';
        header("Location: professor.php");
        exit;
    } elseif ($_POST['username'] === 'biblio' && $_POST['password'] === 'biblio') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'biblio';
        header("Location: bibliotecario.php");
        exit;
    } else {
        $_SESSION['loggedin'] = false;
        $_SESSION['username'] = 'visitante';
        header("Location: visitante.php");
        exit;
    }
}
?>
<!-- Front de login -->
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
            background: url(back.jpg) no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* altura da tela */
            margin: 0;
        }

        .wrapper {
            width: 500px;
            padding: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>
</body>

</html>