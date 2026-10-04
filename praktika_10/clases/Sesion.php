<?php
// Clase para los mensajes al usuario y el talde favorito (sesión + cookie)
class Sesion
{
    // Nombre de la cookie que se guarda en el navegador
    private const COOKIE_FAVORITO = 'taldea_gogokoena';

    // Guarda un mensaje ('ok' o 'error') para enseñarlo en la siguiente página
    public static function guardarMensaje(string $tipo, string $texto): void
    {
        $_SESSION['mensaje'] = ['tipo' => $tipo, 'texto' => $texto];
    }

    // Pinta el mensaje si existe y lo borra para que salga solo una vez
    public static function mostrarMensaje(): void
    {
        if (isset($_SESSION['mensaje'])) {
            $m = $_SESSION['mensaje'];
            echo '<p class="mensaje ' . $m['tipo'] . '">' . htmlspecialchars($m['texto']) . '</p>';
            unset($_SESSION['mensaje']);
        }
    }

    // Guarda el mensaje y redirige a otra página (corta la ejecución)
    public static function redirigir(string $url, string $tipo, string $texto): void
    {
        self::guardarMensaje($tipo, $texto);
        header('Location: ' . $url);
        exit;
    }

    // Guarda el favorito en una cookie (30 días) Y en $_SESSION
    public static function guardarFavorito(int $id): void
    {
        setcookie(self::COOKIE_FAVORITO, (string) $id, time() + 60 * 60 * 24 * 30, '/');
        $_SESSION['gogokoena'] = $id;
    }

    // Devuelve el id favorito o null si no hay ninguno
    public static function obtenerFavorito(): ?int
    {
        // Si la sesión caducó pero la cookie sigue ahí, recuperamos el favorito desde la cookie
        if (!isset($_SESSION['gogokoena']) && isset($_COOKIE[self::COOKIE_FAVORITO])) {
            $_SESSION['gogokoena'] = (int) $_COOKIE[self::COOKIE_FAVORITO];
        }

        return isset($_SESSION['gogokoena']) ? (int) $_SESSION['gogokoena'] : null;
    }

    // Elimina el favorito: borra la sesión y caduca la cookie (fecha en el pasado)
    public static function borrarFavorito(): void
    {
        unset($_SESSION['gogokoena']);
        setcookie(self::COOKIE_FAVORITO, '', time() - 3600, '/');
    }
}
