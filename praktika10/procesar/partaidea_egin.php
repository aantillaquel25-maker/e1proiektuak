<?php
// Procesa el formulario "Gehitu partaidea"
require_once __DIR__ . '/../includes/inicio.php';

Formulario::exigirPost('../index.php');

$db = Conexion::obtener();

// 1. El equipo (campo oculto) tiene que existir
$taldeaId = Formulario::entero('taldea_id');
if ($taldeaId === null || (new Taldea($db))->buscarPorId($taldeaId) === null) {
    Sesion::redirigir('../index.php', 'error', 'Taldea ez da aurkitu.');
}

// Después de procesar volvemos a la página de partaideak de ese equipo
$destino = '../partaideak.php?id=' . $taldeaId;

// 2. Campos vacíos -> error
if (!Formulario::camposCompletos(['izena', 'herrialdea'])) {
    Sesion::redirigir($destino, 'error', 'Eremu guztiak bete behar dira.');
}

// 3. Guardamos. Si la BD falla, mensaje genérico
try {
    (new Partaidea($db))->crear(
        Formulario::limpiar('izena'),
        Formulario::limpiar('herrialdea'),
        $taldeaId
    );
} catch (PDOException $e) {
    Sesion::redirigir($destino, 'error', 'Errorea partaidea sortzean.');
}

Sesion::redirigir($destino, 'ok', 'Partaidea ondo sortu da.');