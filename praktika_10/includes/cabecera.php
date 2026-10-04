<?php
// esta clase sera el encabezado .
?>
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo) ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($titulo) ?></h1>
    <?php Sesion::mostrarMensaje(); //para enseñar si da error o no  ?>
