<?php
// el encabezado de abajo. saldra el favorito que se ha elegido y se enseñara en todas las hojas
$favoritoId = Sesion::obtenerFavorito();

if ($favoritoId !== null) {
    $favorito = (new Taldea(Konexioa::obtener()))->buscarPorId($favoritoId);
    // si la gela se borra no se enseña nada 
    if ($favorito !== null) {
        // que el nombre de la gela sea un enelace a que enseñe los partaideak de la gela
        echo '<p class="favorito">Zure talde favoritoa: '
            . '<a href="partaideak.php?id=' . $favorito['id'] . '">'
            . htmlspecialchars($favorito['izena']) . '</a></p>';
    }
}
?>
</body>
</html>
