<?php
// Archivo común: lo incluyen todas las páginas y procesadores al empezar
require_once __DIR__ . '/../config/config.php';

// Autocarga: al usar una clase, PHP la busca en clases/NombreClase.php
spl_autoload_register(function (string $clase) {
    require_once __DIR__ . '/../clases/' . $clase . '.php';
});

// Iniciamos la sesión (una sola vez)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}