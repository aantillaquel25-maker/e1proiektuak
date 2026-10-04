<?php
// hacer el boton ezabatu y este lo que hace es borrar todo lo que hay dentro de su tabla
require_once __DIR__ . '/../includes/inicio.php';

Formularioak::exigirPost('../index.php');

$id     = Formularioak::entero('id');
$taldea = new Taldea(Konexioa::obtener());

// mira antes de que se borre si el equipo existe sino, null 
if ($id === null || $taldea->buscarPorId($id) === null) {
    Sesion::redirigir('../index.php', 'error', 'Taldea ez da aurkitu.');
}

try {
    $taldea->eliminar($id);
} catch (PDOException $e) {
    Sesion::redirigir('../index.php', 'error', 'Errorea taldea ezabatzean.');
}

// si se boorra un equipo favorito se elimina la cookie y la sesion  para no dejar un id que ya no existe
if (Sesion::obtenerFavorito() === $id) {
    Sesion::borrarFavorito();
}

Sesion::redirigir('../index.php', 'ok', 'Taldea eta bere partaideak ezabatu dira.');
