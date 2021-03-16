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
    <script src="js/registro.js"></script>
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
        <div id="enun1">&emsp;&ensp;1. Cuando se trata del registro de un nuevo usuario, comprobará si:</div>
        <div id="texto1" style="display: none;">
            &emsp;&emsp;i. Si el usuario no existe, crea una carpeta en imagenes con su nombre de usuario y un archivo de texto "pass.txt" con su contraseña. <span class="rojo">(0.5 puntos)</span><br>
            &emsp;&emsp;ii. El nombre de usuario tendra el formato: letras, números y guiones (bajos y altos), y tener una longitud entre 4 y 12 caracteres. <span class="rojo">(0.5 puntos)</span><br>
            &emsp;&emsp;iii. Las contraseñas coinciden y tienen una longitud mínimade 6 caracteres. <span class="rojo">(0.25 puntos)</span><br>
            &emsp;&emsp;iv. En caso de que el usuario ya exista debe de mostrar un mensaje de error. <span class="rojo">(0.5 puntos)</span><br>
        </div>
        <hr>
        <div id="enun2">&emsp;&ensp;2. Cuando se trata de un usuario existente, comprobará que:</div>
        <div id="texto2" style="display: none;">
            &emsp;&emsp;i. La pass corresponde a la almacenada en su carpeta personal bajo la carpeta común "imagenes". <span class="rojo">(0.25 puntos)</span><br>
            &emsp;&emsp;ii. Una vez verificado, mostrara un mosaico con sus imagenes en tamaño reducido, c/una tendrá un enlace que lleve a si misma.<span class="rojo">(0.5 puntos)</span><br>
        </div>
        <hr>
        <div id="enun3">&emsp;&ensp;3. Pequeño formulario que permita subir hasta 3 nuevas imagenes, por cada una debe de comprobar:</div>
        <div id="texto3" style="display: none;">
            &emsp;&emsp;i. Comprobar que no generó ningún error. <span class="rojo">(0.5 puntos)</span><br>
            &emsp;&emsp;ii. Comprobar que es de un tipo MIME adecuado: imagen JPEG, PNG o GIF. <span class="rojo">(0.5 puntos)</span><br>
            &emsp;&emsp;iii. Moverla con su nombre original a la carpeta personal del usuario. <span class="rojo">(0.5 puntos)</span><br>
        </div>
        </p>
    </div>
    <div class="container justify-content-center mt-5">
        <div class="row">
            <!-- Form usuario existente -->
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Usuario existente</h5>
                    </div>
                    <div class="card-body">
                        <form action="imagenes.php" method="POST">
                            <div class="form-group">
                                <label for="usuarioExistente">Nombre</label>
                                <input type="text" class="form-control" id="usuarioExistente" placeholder="Introducir usuario">
                            </div>
                            <div class="form-group">
                                <label for="passUsuarioExistente">Password</label>
                                <input type="password" class="form-control" id="passUsuarioExistente" placeholder="Password">
                            </div>
                            <button type="submit" name="existente" class="btn btn-primary btn-block" id="usuarioExistenteBoton">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Form usuario nuevo -->
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Nuevo usuario</h5>
                    </div>
                    <div class="card-body">
                        <form action="imagenes.php" method="POST">
                            <div class="form-group">
                                <label for="usuarioNuevo">Nombre</label>
                                <input type="text" name="nuevoUsuario" class="form-control" id="usuarioNuevo" placeholder="Introducir usuario">
                            </div>
                            <div class="form-group">
                                <label for="passUsuarioNuevo1">Password</label>
                                <input type="password" name="nuevaPass" class="form-control" id="passUsuarioNuevo1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="passUsuarioNuevo2">Repetir password</label>
                                <input type="password" class="form-control" id="passUsuarioNuevo2" placeholder="Password">
                            </div>
                            <button type="submit" name="nuevo" class="btn btn-primary btn-block" id="nuevoUsuarioBoton">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Boton auxiliar -->
    <a href="#" type="button" data-toggle="modal" data-target="#formModal" id="btnModal" style="display: none;" class="btn btn-primary mr-2 mb-2"></a>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Error</h5>
                </div>
                <div class="modal-body" id="textoModal">
                    texto
                </div>
            </div>
        </div>
    </div>

    <?php
    // FORMULARIO BOTONES
    // NUEVO USUARIO 

    echo '<script type="text/javascript">
        alert("entra");       
        </script>';

    if (array_key_exists('nuevo', $_POST)) {
        $usuario = $_POST["nuevoUsuario"];
        $pass = $_POST["nuevaPass"];

        echo '<script type="text/javascript">
        alert("aaaa");       
        </script>';

        if (comprobarNoExisteUsuario($usuario)) {
            echo '<script type="text/javascript">
                alert("222222");       
                </script>';
            creaCarpeta($usuario);
            creaTxt($usuario, $pass);
        } else {
            echo '<script type="text/javascript">',
            'mensajeModal(5);',
            '$("#btnModal").click();',
            '</script>';
        }
    }

    //---------------------------------------------------

    // USUARIO EXISTENTE
    if (isset($_POST['usuarioExistenteBoton'])) {
        // Se loguea
    }

    function crearUsuario($usuario, $pass)
    {
        if (comprobarNoExisteUsuario($usuario)) {
            creaCarpeta($usuario);
            creaTxt($usuario, $pass);
        }
    }

    function comprobarNoExisteUsuario($usuario)
    {
        if (!file_exists("images\\" . $usuario)) {
            return true;
        } else {
            return false;
        }
    }

    function creaCarpeta($usuario)
    {
        $ruta = "images\\" . $usuario;
        mkdir($ruta, 0777, true);
    }

    function creaTxt($usuario, $pass)
    {
        $archivo = fopen("images\\" . $usuario . "\\pass.txt", "w");
        fwrite($archivo, $pass);
        fclose($archivo);
    }

    ?>
</body>

</html>