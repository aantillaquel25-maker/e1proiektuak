<?php
// Pie común: aquí mostramos el talde favorito en TODAS las páginas
$favoritoId = Sesion::obtenerFavorito();

if ($favoritoId !== null) {
    $favorito = (new Taldea(Conexion::obtener()))->buscarPorId($favoritoId);
    // Si el equipo ya no existe (se borró), no mostramos nada
    if ($favorito !== null) {
        // El nombre es un enlace directo a los participantes de ese equipo
        echo '<p class="favorito">Zure talde favoritoa: '
            . '<a href="partaideak.php?id=' . $favorito['id'] . '">'
            . htmlspecialchars($favorito['izena']) . '</a></p>';
    }
}
?>
</body>
</html>