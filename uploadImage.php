<?php

require 'helperImage.php';
require 'resize.php';

// definir constantes
define('MAX_FILE_SIZE', 1 * 1024 * 1024); //1 MB
define('TARGET_WIDTH', 300); // ancho imagen
define('UPLOAD_DIR', 'uploads/'); // directorio de subida

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $file = $_FILES['imagen'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error al subir el archivo.");
    }
    if ($file['size'] > MAX_FILE_SIZE) {
        die("El archivo es demasiado grande (Maximo permitido: 1MB)");
    }
    if (!isImage($file['name'])) {
        die("El archivo no es una extensión permitida.");
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = 'image_' . date('YmdHis') . '.' . $extension;
    $destinoPath = UPLOAD_DIR . $fileName;

    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0755, true);
    }

    resizeImage($file['tmp_name'], $destinoPath, TARGET_WIDTH);
    echo "Ïmagen subida.";
} else {
?>

    <h1>Subir archivos</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="imagen" accept="image/*" required>
        <input type="submit" value="Subir imagen">
    </form>

<?php
}
