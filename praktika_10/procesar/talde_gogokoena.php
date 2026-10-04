<?php
// crear el boton de favorito y esto guarda el id en la cokie 
require_once __DIR__ . '/../includes/inicio.php';

Formularioak::exigirPost('../index.php');

$id = Formularioak::entero('id');
$taldea = new Taldea(Konexioa::obtener());

// mira si la gela existe antes de guardarlo 
if ($id === null || $taldea->buscarPorId($id) === null) {
    Sesion::redirigir('../index.php', 'error', 'Taldea ez da aurkitu.');
}

Sesion::guardarFavorito($id);

Sesion::redirigir('../index.php', 'ok', 'Talde gogokoena aukeratu da.');
