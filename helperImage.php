<?php

// comporbar si es imagen
function isImage($file)
{
    $validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg', 'tiff'];
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    return in_array($extension, $validExtensions);
}
