<?php
if (isset($_POST['contraseña2'])) { // Registro de nuevo usuario
    try {
        // Comprobamos el nombre de usuario
        $regex = '/^[a-zA-Z0-9_\-]{4,12}$/';
        if (!preg_match($regex, $_POST['nombreusuario']))
            throw new RuntimeException('El nombre de usuario no es válido.');

        // Comprobamos que las contraseñas sean iguales
        if ($_POST['contraseña'] !== $_POST['contraseña2'])
            throw new RuntimeException('Las contraseñas no coinciden');

        // Comprobamos la longitud de la contraseña
        if (strlen($_POST['contraseña']) < 6)
            throw new RuntimeException('La contraseña es demasiado corta');

        // Comprobamos que no exista una subcarpeta de imagenes con ese mismo nombre
        $carpeta = __DIR__ . '/imagenes/' . $_POST['nombreusuario'];
        if (file_exists($carpeta))
            throw new RuntimeException('El usuario ya existe.');

        // Creamos la carpeta para el usuario nuevo
        if (mkdir($carpeta) === false)
            throw new RuntimeException('No se pudo crear la carpeta para el usuario.');

        // Creamos un archivo 'pass.txt' con su contraseña
        $nombre_fichero = $carpeta . '/pass.txt';
        $fich = fopen($nombre_fichero, "w");
        if ($fich === false)
            throw new RuntimeException('No se pudo crear el fichero ' . $nombre_fichero);
        fwrite($fich, $_POST['contraseña']);
        fclose($fich);
    } catch (RuntimeException $e) {
        echo '<html><body>';
        echo $e->getMessage() . '<br />';
        echo '<a href="javascript: history.go(-1)">Volver</a>';
        echo '</body></html>';
        exit();
    }
} else { // Usuario existente
    // Comprobamos su contraseña
    $carpeta = __DIR__ . '/imagenes/' . $_POST['nombreusuario'];
    $nombre_fichero = $carpeta . '/pass.txt';

    try {
        $fich = fopen($nombre_fichero, "r");
        if ($fich === false)
            throw new RuntimeException('No existe el usuario.');

        $contraseña = fgets($fich);
        if ($contraseña !== $_POST['contraseña'])
            throw new RuntimeException('La contraseña no es correcta');

        // Comprobamos si se recibieron nuevas imágenes, y, en ese caso, las guardamos
        if (!empty($_FILES['imagen'])) {
            // Comprobamos que el código de error sea UPLOAD_ERR_OK
            foreach ($_FILES['imagen']['error'] as $erro) {
                switch ($erro) {
                    case UPLOAD_ERR_OK:  // Todo correcto
                    case UPLOAD_ERR_NO_FILE:
                        break;
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException('Tamaño de imagen demasiado grande.');
                    default:
                        throw new RuntimeException('Error desconocido.');
                }
            }

            // Usamos la extensión Fileinfo para comprobar que el tipo MIME
            //  de todos los archivos recibidos sea el correspondiente a una imagen
            foreach ($_FILES['imagen']['tmp_name'] as $tmp_name) {
                if (!empty($tmp_name)) {
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $ext = array_search(
                            finfo_file($finfo, $tmp_name), array('jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif')
                    );
                    // Se non é unha imaxe, rematamos
                    if ($ext === false)
                        throw new RuntimeException('Imagen no reconocida.');
                }
            }

            // Movemos las imágenes recibidas á su localización definitiva
            $imaxe = 0;
            while ($imaxe < count($_FILES['imagen']['name'])) {
                if (!empty($_FILES['imagen']['name'][$imaxe])) {
                    $fich = $carpeta . '/' . $_FILES['imagen']['name'][$imaxe];
                    $ok = move_uploaded_file($_FILES['imagen']['tmp_name'][$imaxe], $fich);
                    if (!$ok)
                        throw new RuntimeException('La imagen no pudo ser movida.');
                }
                $imaxe++;
            }
        }
    } catch (RuntimeException $e) {
        echo '<html><head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
        echo '</head><body>';
        echo $e->getMessage() . '<br />';
        echo '<a href="javascript: history.go(-1)">Volver</a>';
        echo '</body></html>';
        exit();
    }
}

$usuario = $_POST['nombreusuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Imágenes del usuario</title>
        <meta charset=UTF-8">
        <style type="text/css">
            .imagenes {
                width: 100%;
                clear: both;
                margin-bottom: 80px;
            }
            img {
                width: 80px;
                height: 60px;
                margin: 5px;
            }
        </style>  
    </head>
    <body>
        <p>Imágenes del usuario "<span style="font-weight:bold"><?php echo $usuario; ?></span>"</p>
        <div class="imagenes">
<?php
if (opendir($carpeta) !== false) {
    while (($item = readdir()) !== false):
        if ($item === 'pass.txt' || is_dir($item))
            continue;
        $link = 'imagenes/' . $usuario . '/' . $item;
        ?>
                    <a href='<?php echo $link; ?>'><img src='<?php echo $link; ?>' alt='<?php echo $item; ?>'/></a>
                    <?php
                endwhile;
                closedir();
            }
            ?>
        </div>
        <div class="form">
            <form enctype="multipart/form-data" method='post' action='imagenes.php'>
                <p>Añadir más imágenes: </p>
                <input name="imagen[]" type="file" /><br />
                <input name="imagen[]" type="file" /><br />
                <input name="imagen[]" type="file" /><br />
                <input type="hidden" value="<?php echo $usuario ?>" name="nombreusuario" />
                <input type="hidden" value="<?php echo $_POST['contraseña']; ?>" name="contraseña" />
                <input type="submit" value="Enviar" />
            </form>
        </div>

    </body>
</html>
