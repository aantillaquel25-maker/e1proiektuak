<?php
// aqui hace un formulario de talde gehitu y pide los datos 
require_once __DIR__ . '/../includes/inicio.php';

Formularioak::exigirPost('../index.php');

// que no haya todo vacio primero sino sale el mensaje de erro 
if (!Formularioak::camposCompletos(['izena', 'puntuak'])) {
    Sesion::redirigir('../index.php', 'error', 'Eremu guztiak bete behar dira.');
}

// LOS NUMEROS ENTEROS SINO NO VALE 
$puntuak = Formularioak::entero('puntuak');
if ($puntuak === null) {
    Sesion::redirigir('../index.php', 'error', 'Puntuak zenbaki oso positibo bat izan behar da.');
}

// SE GUARDA EN LA BASE DE DATOS AUTOMATICO SINO SALTA EL MENASJE DE ERROR 
$taldea = new Taldea(Konexioa::obtener());
try {
    $taldea->crear(Formularioak::limpiar('izena'), $puntuak);
} catch (PDOException $e) {
    Sesion::redirigir('../index.php', 'error', 'Errorea taldea sortzean.');
}

Sesion::redirigir('../index.php', 'ok', 'Taldea ondo sortu da.');
