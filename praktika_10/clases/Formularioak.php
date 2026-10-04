<?php
// Clase para leer los formularios 
class Formularioak
{
    // si no es POSt se va a la  paginna de destino 
    public static function exigirPost(string $destino): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . $destino);
            exit;
        }
    }

    // devuelve el formulario vacio 
    public static function limpiar(string $campo): string
    {
        return trim($_POST[$campo] ?? '');
    }

    // true si TODOS los campos tienen valor
    public static function camposCompletos(array $campos): bool
    {
        foreach ($campos as $campo) {
            if (self::limpiar($campo) === '') {
                return false;
            }
        }
        return true;
    }

    // Devuelve el campo como entero >= 0, o null si no es bueno 
    public static function entero(string $campo): ?int
    {
        $valor = filter_var(self::limpiar($campo), FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
        return $valor === false ? null : $valor;
    }
}
