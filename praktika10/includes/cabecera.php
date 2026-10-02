<?php
// Cabecera común. Cada página define $titulo antes de incluirla
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($titulo) ?></h1>
    <?php Sesion::mostrarMensaje(); // errores o confirmaciones ?>