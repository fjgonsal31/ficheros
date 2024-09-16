<?php

require 'helperImage.php';

$path = 'imagenes/';

// mostrar imagenes
function showImage($path, $file)
{
    echo "<img src='$path$file' alt='Imagen de prueba' width='200px'>";
}

// comprobar directorio
if (is_dir($path)) {
    // abrir directorio
    if ($dh = opendir($path)) {
        echo "<h1>Archivos de imagen en el directorio $path</h1>";
        echo "<ul>";

        while (($file = readdir($dh)) !== false) {
            if ($file !== "." && $file !== "..") {
                if (isImage($file)) {
                    echo "<li>";
                    showImage($path, $file);
                    echo "</li>";
                }
            }
        }

        echo "</ul>";
    }
} else {
    echo "El directorio $path no existe.";
}
