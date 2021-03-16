<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="jumbotron" style="margin-bottom: 0; padding: 1rem 3rem;">
    <h1 class="display-5">Ejercicio 3</h1>
        <p class="lead">
            Programa una aplicación sencilla para que los usuarios puedan subir sus propias imágenes al servidor web.
        </p>
        <p>
            a. Un formulario para usuarios ya registrados, que deja introducir el nombre y contraseña.<span class="rojo">(0.5 puntos)</span><br>
            b. Un formulario para nuevos usuarios, que solicita un nuevo nombre de usuario y la contraseña, que debe ser verificado en un nuevo campo. <span class="rojo">(0.5 punto)</span><br>
            c. Imagenes.php <span class="rojo">(4 puntos)</span><br>
            <hr>
        </p>
    </div>
    <div class="container justify-content-center mt-5">
        <div class="row">
            <h5>Imágenes del usuario "<?php $_POST["usuario"] ?>"</h5>
        </div>
        <div class="row">
            <?php
            
            // coger de la carpeta $_POST[$usuario] todas las imagenes
            $imagenes;

            foreach ($imagenes as $imagen) {
                echo '<div class="col-4">';
                echo '<img src="' . $imagen . '" class="img-fluid">';
                echo '</div>';
            }
            ?>
        </div>
        <div class="row">
            <h5>Añadir más imágenes:</h5><br><br>
            <form action="#">
                <input type="file" id="foto1" name="imagen" accept="image/jpeg, image/png, image/gif"><br>
                <input type="file" id="foto2" name="imagen" accept="image/jpeg, image/png, image/gif"><br>
                <input type="file" id="foto3" name="imagen" accept="image/jpeg, image/png, image/gif"><br>
                <input type="submit">
            </form>
        </div>
    </div>
</body>

</html>