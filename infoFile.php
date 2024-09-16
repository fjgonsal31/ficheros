<?php

function showInfoFile($path)
{
    if (!file_exists($path)) {
        return "El archivo no existe";
    }

    $info = [];
    $info['nombre'] = basename($path);
    $info['ruta'] = realpath($path);
    $info['tamano'] = filesize($path) . ' bytes';
    $info['mimeType'] = mime_content_type($path);
    $info['fechaUltimoAcceso'] = date("Y-m-d H:i:s", fileatime($path));
    $info['fechaUltimaModificacion'] = date("Y-m-d H:i:s", filemtime($path));
    $info['fechaUltimoCreacion'] = date("Y-m-d H:i:s", filectime($path));
    $permisos = fileperms($path);
    $info['permisos'] = $permisos;
    $info['permisosFiltrados'] = substr(sprintf('%o', $permisos), -4);
    $info['md5'] = md5_file($path);
    $info['sha1'] = sha1_file($path);

    if (exif_imagetype($path)) {
        $imageInfo = getimagesize($path);
        $info['dimensiones'] = $imageInfo[0] . ' px (ancho) y ' . $imageInfo[1] . ' px (alto)';
        $info['tipo'] = $imageInfo['mime'];
    }

    return $info;
}

$path = 'imagenes/joker.gif';
$fileInfo = showInfoFile($path);

echo "<h2>Información del archivo: $path</h2>";
echo "<ul>";

foreach ($fileInfo as $key => $value) {
    echo "<li>$key: $value</li>";
}

echo "</ul>";
