<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 5</title>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- recursos-->
    <link rel="icon" type="image/gif/png" href="images/montecastelo.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script type="text/javascript" src="js/index.js"></script>
</head>

<body>

    <div class="container d-flex justify-content-center">

        <div class="form_montecastelo mt-5 rounded" id="cont_form">

            <!-- Imagen -->
            <div class="text-center">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Haz click aqui para cambiar de formulario">
                    <img src="images/montecastelo-grande.png" class="imagen mb-3 mt-3" id="montecastelo" alt="Montecastelo">
                </a>
            </div>

            <!-- Login -->
            <div class="login_form p-5">
                <form class="login" method='post' action='UsuarioLogado.php'>
                    <div class="row login_usuario mb-2">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                            <input type="text" name="user" class="form-control" placeholder="Usuario existente">
                        </div>
                    </div>
                    <div class="row login_pass mb-2">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            <input type="password" name="pass" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="sesion" id="sesion_permanente" value="1" checked>
                        <label class="form-check-label text-light" for="sesion_permanente">
                            Mantener la sesión iniciada
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="sesion" id="sesion_no_permanente" value="0">
                        <label class="form-check-label text-light" for="sesion_no_permanente">
                            Definir tiempo de sesión
                        </label>

                        <div class="form-group form-inline text-light" id="control_tiempo" style="display: none;">
                            <label for="tiempo_sesion">Tiempo de sesión</label>
                            <input type="number" name="sesion_time" min="1" max="120" class="form-control ml-5 mr-2" id="tiempo_sesion"> segundos
                        </div>
                    </div>

                    <div class="row login_button block">
                        <button type="submit" class="btn btn-block bg-danger text-light">Iniciar sesión</button>
                    </div>
                </form>
            </div>

            <!-- Registro -->
            <div class="regist_form p-5" style="display: none;">
                <form class="registro" method='post' action='UsuarioLogado.php'>
                    <div class="row registro-usuario mb-2">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                            <input type="text" name="new_user" class="form-control" placeholder="Nuevo usuario">
                        </div>
                    </div>
                    <div class="row registro-pass mb-2">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            <input type="password" name="new_pass1" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="row registro-pass2 mb-3">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            <input type="password" name="new_pass2" class="form-control" placeholder="Repite la contraseña">
                        </div>
                    </div>
                    <div class="row registro_button block">
                        <button type="submit" class="btn btn-block bg-danger text-light">Registrar usuario</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>