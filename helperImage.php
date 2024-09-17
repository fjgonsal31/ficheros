<?php


/**
 * Comprueba si un archivo es de tipo imagen.
 * Los tipos válidos son: jpg, jpeg, png, gif, bmp, webp, svg y tiff.
 * @param string $file La ruta del archivo.
 * @return boolean Indica si $file es una imagen o no.
 */

function isImage($file)
{
    $validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg', 'tiff'];
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    return in_array($extension, $validExtensions);
}
