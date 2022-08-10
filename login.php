<html>
<head>
    <meta charset="utf-8">
    <title>A</title>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

<?php
session_start();

require 'config.php';
require 'classes/Usuarios.php';
$usuarios = new Usuarios($pdo);
session_destroy();

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    $consultaUsu = $usuarios->verificaLogin($email,$senha);

        header("Location: index.php");
        exit;
    }

//}
?>
</head>
<h1>Login</h1>
<form method="post">
    <label>E-mail:</label>
    <input type="email" name="email"> </br></br>
    <label>Senha:</label>
    <input type="password" name="senha"> </br></br>
    <input type="submit">

</form>
    </body>

</html>