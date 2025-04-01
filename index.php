<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    if ($_POST['username'] == 'professor' and $_POST['password'] == 'professor') {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION["username"] = 'Professor';
        header("location: professor.php");
    } else if ($_POST['username'] == 'biblio' and $_POST['password'] == 'biblio') {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION["username"] = 'Bibliotecário';
        header("location: bibliotecario.php");
    } else {
        $_SESSION['loggedin'] = FALSE;
        header("location: naolog.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url(back.jpg) no-repeat center center fixed;
            background-size: cover;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-group {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome de Usuário</label>
                <input type="text" name="username" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Acessar">
            </div>
        </form>
    </div>
</body>

</html>