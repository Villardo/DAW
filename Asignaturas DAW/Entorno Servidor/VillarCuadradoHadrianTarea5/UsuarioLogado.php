<?php
session_name("Tarea5_HadrianVillarCuadrado");
session_start();

$salt = "Ejercicio_5_Entorno_Servidor";

//Nuevo usuario
if (isset($_POST['new_pass2'])) {
    try {
        if ($_POST['new_pass1'] !== $_POST['new_pass2']) {
            throw new RuntimeException('Las contraseñas no coinciden');
        }

        $hash = md5($salt . $_POST['new_pass2']);

        $carpeta = __DIR__ . '/usuarios/' . $_POST['new_user'];
        if (file_exists($carpeta)) {
            throw new RuntimeException('El usuario ya existe.');
        }

        if (mkdir($carpeta) === false) {
            throw new RuntimeException('No se pudo crear la carpeta para el usuario.');
        }

        $nombre_fichero = $carpeta . "/" . $_POST['new_user'] . ".txt";
        $fich = fopen($nombre_fichero, "w");
        if ($fich === false) {
            throw new RuntimeException('No se pudo crear el fichero ' . $nombre_fichero);
        }
        fwrite($fich, "Usuario:" . $_POST['new_user'] . PHP_EOL . "Hash:" . $hash);
        fclose($fich);
    } catch (RuntimeException $e) {
        echo '<html><body>';
        echo $e->getMessage() . '<br />';
        echo '<a href="javascript: history.go(-1)">Volver</a>';
        echo '</body></html>';
        exit();
    }
}

// Usuario existente
if (isset($_POST['user'])) {
    try {
        $nombre_fichero = __DIR__ . '/usuarios/' . $_POST['user'] . "/" . $_POST['user'] . ".txt";

        $fich = fopen($nombre_fichero, "r");
        if ($fich === false) {
            throw new RuntimeException('No existe el usuario.');
        }

        $s = "Hash:";
        $passhashed = substr(strstr(file_get_contents($nombre_fichero), $s), strlen($s));

        //logueado correcto        
        if ($passhashed !== md5($salt . $_POST['pass']))
            throw new RuntimeException('La contraseña no es correcta');
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

//UsuarioLogado (login usuario existente)
if (isset($_POST['user'])) {
    $usuario = $_POST['user'];

    if(isset($_SESSION['username']) && isset($_SESSION['hashed_pass'])
    && isset($_SESSION['sesion']) && isset($_SESSION['tiempo'])){
        echo $_SESSION['username'] . "<br>";
        echo $_SESSION['hashed_pass']. "<br>";
        echo $_SESSION['sesion']. "<br>";
        echo $_SESSION['tiempo']. "<br>"; //------------------------------------Tiempo no se muestra, no entiendo por que
    }else{        
        $_SESSION['username']=      $_POST['user'];
        $_SESSION['hashed_pass']=   md5($salt . $_POST['pass']);
        $_SESSION['sesion']=        $_POST['sesion'];
        $_SESSION['tiempo']=        $_POST['sesion_time'];
    }
    
    // var_dump($_SESSION);

    echo '<!DOCTYPE html>';
    echo '<html lang="es">';

    echo '<head>';
        echo '<meta charset="UTF-8" />';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
        echo '<title>Ejercicio 5</title>';

        echo '<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">';
        echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>';
        echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>';
        echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">';
        echo '<link rel="icon" type="image/gif/png" href="images/montecastelo.ico">';
        echo '<link rel="stylesheet" type="text/css" href="css/estilos.css">';
        echo '<script type="text/javascript" src="js/funcs.js"></script>';

    echo '</head>';
    echo '<body>';
        echo '<div class="container d-flex justify-content-center">';
            echo '<div class="card text-light form_montecastelo mt-5 p-3">';
                        echo '<div class="text-center mt-3 mb-3">';
                            echo "<img src='https://eu.ui-avatars.com/api/?name=$usuario&length=1&background=random&rounded=true'>";
                        echo '</div>';
                        echo '<div class="datos mb-5">';
                            echo '<div class="card-title text-center">';
                                echo '<h6>';
                                    echo  $usuario;
                                echo '</h6>';
                            echo '</div>';
                            echo '<div class="card-text text-center"> Sesión permanente: ';
                            if ($_POST['sesion']==0) {
                                echo "<b>No</b>";
                            }else {
                                echo "<b>Si</b>";
                            }
                            echo '</div>'; 
                                
                            //Sesion no permanente, tiempo restante
                            if ($_POST['sesion']==0) {                                                                
                                echo '<div class="card-text text-center"> Tiempo restante: ';
                                echo '<b><span id="segundos">'.$_POST['sesion_time'].'</span></b> s';
                                echo "<script>
                                    let cont = ".$_POST['sesion_time'].";
                                    let mensaje='Hasta otra!';
                                    let tiempo = setInterval(function () {
                                        cont--;
                                        if(cont==0){
                                            document.getElementById('segundos').innerHTML = mensaje;
                                            clearInterval(tiempo);
                                        }
                                        document.getElementById('segundos').innerHTML = cont;
                                    }, 1000);
                                                                        
                                </script>";                                
                                echo '</div>'; 
                            }                                                                                  
                        echo '</div>';                    
                        echo'<form method="POST" action="#">'; // ------------------------------ Cuando se ejecutan los botones del form, da error 
                            echo '<button id="cambiarpass" class="btn btn-block bg-danger text-light mb-1">Cambiar contraseña</button>';                            
                            echo '<div class="p-4" id="form_cambio_pass" style="display:none;">';                    
                                echo '<div class="row cambiar-pass mb-2">';
                                    echo '<div class="input-group">';
                                        echo '<div class="input-group-text"><i class="fas fa-lock"></i></div>';
                                        echo '<input type="password" name="pass1" class="form-control" placeholder="Contraseña">';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="row cambiar-pass2 mb-3">';
                                    echo '<div class="input-group">';
                                        echo '<div class="input-group-text"><i class="fas fa-lock"></i></div>';
                                        echo '<input type="password" name="pass2" class="form-control" placeholder="Repite la contraseña">';
                                    echo '</div>';
                                echo '</div>';
                                echo '<button type="submit" name="aceptar_cambio" class="btn btn-block bg-danger text-light">Aceptar</button>'; 
                            echo'</div>';
                            echo '<button type="submit" name="cerrar_sesion" class="btn btn-block bg-danger text-light">Cerrar sesión</button>';   
                            echo'</form>';
                        if(isset($_POST['aceptar_cambio'])) { 
                            try {
                                if(isset($_POST['pass1']) && isset($_POST['pass2'])) { 
                                    if ($_POST['new_pass1'] !== $_POST['new_pass2']) {
                                        throw new RuntimeException('Las contraseñas no coinciden');
                                    }
                                    $archivo = __DIR__ . '/usuarios/' .$_SESSION['username']."/".$_SESSION['username'].".txt";
                                    if (!file_exists($archivo)) {
                                        throw new RuntimeException('El archivo no existe');
                                    }else{
                                        $nuevo_hash = md5($salt . $_POST['pass2']);

                                        $fich = fopen($archivo, "w");
                                        fwrite($fich, "Usuario:" . $_SESSION['username'] . PHP_EOL . "Hash:" . $nuevo_hash);
                                        fclose($fich);                                        
                                    }
                                } 
                                
                            } catch (RuntimeException $e) {
                                echo '<html><body>';
                                echo $e->getMessage() . '<br />';
                                echo '<a href="javascript: history.go(-1)">Volver</a>';
                                echo '</body></html>';
                                exit();
                            }
                        } 
                        if(isset($_POST['cerrar_sesion'])) { 
                            session_unset();
                            session_destroy();
                            setcookie("login", '', time() - 3600);
                            setcookie("hash", '', time() - 3600);
                            header('Location: Login.php');
                        } 
                        // ---------------------------------                                                              
                    echo '</div>';
        echo '</div>';
    echo '</body>';
    echo '</html>';

//Pop up registrado
} else {
    $usuario = $_POST['new_user'];

    echo '<!DOCTYPE html>';
    echo '<html lang="es">';

    echo '<head>';
        echo '<meta charset="UTF-8" />';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0" />';
        echo '<title>Ejercicio 5</title>';

        echo '<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">';
        echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>';
        echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>';
        echo '<link rel="icon" type="image/gif/png" href="images/montecastelo.ico">';
        echo '<link rel="stylesheet" type="text/css" href="css/estilos.css">';

    echo '</head>';
    echo '<body>';
        echo '<div class="container d-flex justify-content-center">';
            echo '<div class="form_montecastelo text-center mt-5 p-3 text-light rounded">';            
                echo'<div class="mb-5 mt-2">El usuario <b>' . $usuario . '</b> ha sido creado</div>';
                echo '<button onclick="javascript: history.go(-1)" class="btn btn-block bg-danger text-light">Atrás</button>';           
            echo '</div>';
        echo '</div>';
    echo '</body>';
    echo '</html>';
}


