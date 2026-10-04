<?php
// hace un formulario de sumar un alumno 
require_once __DIR__ . '/../includes/inicio.php';

Formularioak::exigirPost('../index.php');

$db = Konexioa::obtener();

// 1. mira si la gela exisye 
$taldeaId = Formularioak::entero('taldea_id');
if ($taldeaId === null || (new Taldea($db))->buscarPorId($taldeaId) === null) {
    Sesion::redirigir('../index.php', 'error', 'Taldea ez da aurkitu.');
}

// Despues de hacerlo va a la calse partaideak 
$destino = '../partaideak.php?id=' . $taldeaId;

// 2. si se deja algo vacio salta error 
if (!Formularioak::camposCompletos(['izena', 'herrialdea'])) {
    Sesion::redirigir($destino, 'error', 'Eremu guztiak bete behar dira.');
}

// 3. guarda y si la base de datos falla salta error 
try {
    (new Partaideak($db))->crear(
        Formularioak::limpiar('izena'),
        Formularioak::limpiar('herrialdea'),
        $taldeaId
    );
} catch (PDOException $e) {
    Sesion::redirigir($destino, 'error', 'Errorea partaidea sortzean.');
}

Sesion::redirigir($destino, 'ok', 'Partaidea ondo sortu da.');
