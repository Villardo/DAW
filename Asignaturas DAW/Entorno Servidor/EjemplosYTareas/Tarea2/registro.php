<!DOCTYPE html>
<html>
  <head>
    <title>Login / Registro de usuarios</title>
    <meta charset="UTF-8">
    <style type="text/css">
      .forms {
        width: 100%;
        overflow: hidden;
      }
      .form1 {
        width: 300px;
      }
      .form2 {
        width: 300px;
      }
      input[type=text], input[type=password] {
        width: 60%;
        display: block;
    }

    </style>    
  </head>
  <body>
    <div class="forms">
      <div class="form1">
        <form method='post' action='imagenes.php'>
          <p>Usuario existente:</p>
          <fieldset>
            <label for="nombreusuario">Nombre:</label>
            <input id="nombreusuario" type="text" name="nombreusuario" />
            <label for="contraseña">Contraseña:</label>
            <input id="contraseña" type="password" name="contraseña" />
          </fieldset>
          <fieldset>
            <input type="submit" value="Enviar" />
          </fieldset>
        </form>
      </div>
      <div class="form2">
        <form method='post' action='imagenes.php'>
          <p>Nuevo usuario:</p>
          <fieldset>
            <label for="nuevousuario2">Nombre:</label>
            <input id="nombreusuario2" type="text" name="nombreusuario" />
            <label for="nuevacontraseña">Contraseña:</label>
            <input id="nuevacontraseña" type="password" name="contraseña" />
            <label for="nuevacontraseña2">Repita la contraseña:</label>
            <input id="nuevacontraseña2" type="password" name="contraseña2" />
          </fieldset>
          <fieldset>
            <input type="submit" value="Enviar" />
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>

