<?php
// Procesa el botón "Gogokoena": guarda el favorito en cookie y sesión
require_once __DIR__ . '/../includes/inicio.php';

Formulario::exigirPost('../index.php');

$id = Formulario::entero('id');
$taldea = new Taldea(Conexion::obtener());

// Comprobamos que el equipo existe antes de guardarlo
if ($id === null || $taldea->buscarPorId($id) === null) {
    Sesion::redirigir('../index.php', 'error', 'Taldea ez da aurkitu.');
}

Sesion::guardarFavorito($id);

Sesion::redirigir('../index.php', 'ok', 'Talde gogokoena aukeratu da.');