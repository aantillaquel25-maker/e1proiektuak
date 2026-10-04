<?php
// Clase que crea (una sola vez) la conexión a la base de datos con PDO
class Konexioa
{
    private static ?PDO $pdo = null;

    public static function obtener(): PDO
    {
        // Si todavía no hay conexión, la creamos
        if (self::$pdo === null) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // errores como excepciones
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // filas como array asociativo
            ]);
        }
        return self::$pdo;
    }
}
