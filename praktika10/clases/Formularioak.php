<?php
// Clase con utilidades para leer y validar formularios (POST)
class Formularioak
{
    // Si la petición no es POST, volvemos a la página indicada
    public static function exigirPost(string $destino): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . $destino);
            exit;
        }
    }

    // Devuelve el valor de un campo sin espacios (o '' si no existe)
    public static function limpiar(string $campo): string
    {
        return trim($_POST[$campo] ?? '');
    }

    // true si TODOS los campos tienen valor (el "0" cuenta como valor)
    public static function camposCompletos(array $campos): bool
    {
        foreach ($campos as $campo) {
            if (self::limpiar($campo) === '') {
                return false;
            }
        }
        return true;
    }

    // Devuelve el campo como entero >= 0, o null si no es válido
    public static function entero(string $campo): ?int
    {
        $valor = filter_var(self::limpiar($campo), FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
        return $valor === false ? null : $valor;
    }
}