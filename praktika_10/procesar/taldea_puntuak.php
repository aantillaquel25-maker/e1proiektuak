<?php
// el boton aldatu para cambiar los puntos de la gela 
require_once __DIR__ . '/../includes/inicio.php';

Formularioak::exigirPost('../index.php');

if (!Formularioak::camposCompletos(['id', 'puntuak'])) {
    Sesion::redirigir('../index.php', 'error', 'Eremu guztiak bete behar dira.');
}

$id      = Formularioak::entero('id');
$puntuak = Formularioak::entero('puntuak');
if ($id === null || $puntuak === null) {
    Sesion::redirigir('../index.php', 'error', 'Datu baliogabeak.');
}

$taldea = new Taldea(Konexioa::obtener());
try {
    $taldea->actualizarPuntos($id, $puntuak);
} catch (PDOException $e) {
    Sesion::redirigir('../index.php', 'error', 'Ezin izan da puntuazioa aldatu.');
}

Sesion::redirigir('../index.php', 'ok', 'Puntuak eguneratu dira.');
