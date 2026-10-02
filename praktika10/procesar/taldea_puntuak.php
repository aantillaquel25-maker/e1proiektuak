<?php
// Procesa el botón "Aldatu" (cambiar puntos de un equipo)
require_once __DIR__ . '/../includes/inicio.php';

Formulario::exigirPost('../index.php');

if (!Formulario::camposCompletos(['id', 'puntuak'])) {
    Sesion::redirigir('../index.php', 'error', 'Eremu guztiak bete behar dira.');
}

$id      = Formulario::entero('id');
$puntuak = Formulario::entero('puntuak');
if ($id === null || $puntuak === null) {
    Sesion::redirigir('../index.php', 'error', 'Datu baliogabeak.');
}

$taldea = new Taldea(Conexion::obtener());
try {
    $taldea->actualizarPuntos($id, $puntuak);
} catch (PDOException $e) {
    Sesion::redirigir('../index.php', 'error', 'Ezin izan da puntuazioa aldatu.');
}

Sesion::redirigir('../index.php', 'ok', 'Puntuak eguneratu dira.');