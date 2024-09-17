<?php

/**
 * Redimensiona una imagen
 * @param string $sourcePath Ruta de origen
 * @param string $targetPath Ruta de destino
 * @param string $targetWidth Ancho de destino
 */
function resizeImage($sourcePath, $targetPath, $targetWidth)
{

    list($width, $height, $type) = getimagesize($sourcePath);
    $ratio = $targetWidth / $width;
    $targetHeight = $height * $ratio;
    $sourceImage = imagecreatefromstring(file_get_contents($sourcePath));
    $targetImage = imagecreatetruecolor($targetWidth, $targetHeight);

    imagecopyresampled($targetImage, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($targetImage, $targetPath, 90);
            break;
        case IMAGETYPE_PNG:
            imagepng($targetImage, $targetPath, 9);
            break;
        case IMAGETYPE_GIF:
            imagegif($targetImage, $targetPath);
            break;
    }

    imagedestroy($sourceImage);
    imagedestroy($targetImage);
}