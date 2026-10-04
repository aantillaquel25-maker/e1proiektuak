<?php
// prueba de aver si lo incluyen en todas las hojas.
require_once __DIR__ . '/../config/config.php';

// se carga solo, PHP tendria que buscar todas las clsases que sean .php. 
spl_autoload_register(function (string $clase) {
    require_once __DIR__ . '/../clases/' . $clase . '.php';
});

// se inicia la sesion una vez SOLO
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
