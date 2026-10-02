<?php
// Procesa el botón "Ezabatu" (borra el equipo y sus participantes)
require_once __DIR__ . '/../includes/inicio.php';

Formulario::exigirPost('../index.php');

$id     = Formulario::entero('id');
$taldea = new Taldea(Conexion::obtener());

// Comprobamos que el equipo existe antes de borrarlo
if ($id === null || $taldea->buscarPorId($id) === null) {
    Sesion::redirigir('../index.php', 'error', 'Taldea ez da aurkitu.');
}

try {
    $taldea->eliminar($id);
} catch (PDOException $e) {
    Sesion::redirigir('../index.php', 'error', 'Errorea taldea ezabatzean.');
}

// Si el equipo borrado era el favorito, limpiamos cookie y sesión
// para no dejar un id que ya no existe
if (Sesion::obtenerFavorito() === $id) {
    Sesion::borrarFavorito();
}

Sesion::redirigir('../index.php', 'ok', 'Taldea eta bere partaideak ezabatu dira.');