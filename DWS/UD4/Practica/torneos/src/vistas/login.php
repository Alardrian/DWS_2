<?php

require "../negocio/usuarioReglasNegocio.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioBL = new UsuarioReglasNegocio();
    $perfil = $usuarioBL->verificar($_POST['usuario'], $_POST['clave']);

    if ($perfil === "administrador") {
        session_start(); //inicia o reinicia una sesión
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: torneosVista.php");
    }else if($perfil === "jugador"){
        session_start(); //inicia o reinicia una sesión
        $_SESSION['usuario'] = $_POST['usuario'];
        header("Location: torneosVista.php");
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="../../css/loginVista.css">
</head>
<body>

    <div class="contenedor">
    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="textos">
    <label for = "usuario"> Usuario: </label>
        <input id="usuario" name = "usuario" type = "text">
        <label for = "usuario"> Contraseña: </label>
        <input id = "clave" name = "clave" type = "password">
    </div>

        <input id="enviar" type= "submit" value="Enviar">
    </form>
    </div>


    <?php
if (isset($error)) {
    print("<div> No tienes acceso </div>");
}
?>
</body>
</html>