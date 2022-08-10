<html>
<head>
    <meta charset="utf-8">
    <title>A</title>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <meta>
<?php
require 'classes/Usuarios.php';
require 'config.php';
session_start();
if (empty($_SESSION['log'])) {
    header("Location:login.php");
    exit;
} else {
    $usuario = new Usuarios($pdo);
    $id = $_SESSION['log'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $verificaIP = $usuario->verificaLoginIP($id,$ip);

}
?>

</head>
<body>
<h1>Conteúdo Convidencial</h1>

</body>

</html>