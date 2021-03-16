<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ejercicio 4</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/sprite.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

  <?php
  echo '<div class="jumbotron" style="margin-bottom: 0;">';
  echo '<h1 class="display-4">Ejercicio 4</h1>';
  echo '<p class="lead">Utiliza matrices para almacenar una lista de cartas de baraja española.</p>';
  echo '<p>Lista todas las cartas de la baraja ordenadas y desordenadas.</p>';
  echo '</div>';
  ?>

  <div class="container centrar mt-3">
    <form method="post">
      <div class="row centrar mb-3 mt-3">
        <div id="dorso"></div>
      </div>
      <div class="row">
        <div class="col-6">
          <input type="submit" name="button1" class="btn btn-info btn-lg btn-block" value="Ordenar" />
        </div>
        <div class="col-6">
          <input type="submit" name="button2" class="btn btn-info btn-lg btn-block" value="Desordenar" style="width: max-content;" />
        </div>
      </div>
    </form>
  </div>

  <?php
  $cartas = array(
    1 =>  "Aoros01", 2 => "Aoros02", 3 => "Aoros03", 4 => "Aoros04", 5 => "Aoros05", 6 => "Aoros06", 7 => "Aoros07", 8 => "Aoros10", 9 => "Aoros11", 10 => "Aoros12",
    11 => "Bcopas01", 12 => "Bcopas02", 13 => "Bcopas03", 14 => "Bcopas04", 15 => "Bcopas05", 16 => "Bcopas06", 17 => "Bcopas07", 18 => "Bcopas10", 19 => "Bcopas11", 20 => "Bcopas12",
    21 => "Cespadas01", 22 => "Cespadas02", 23 => "Cespadas03", 24 => "Cespadas04", 25 => "Cespadas05", 26 => "Cespadas06", 27 => "Cespadas07", 28 => "Cespadas10", 29 => "Cespadas11", 30 => "Cespadas12",
    31 => "Dbastos01", 32 => "Dbastos02", 33 => "Dbastos03", 34 => "Dbastos04", 35 => "Dbastos05", 36 => "Dbastos06", 37 => "Dbastos07", 38 => "Dbastos10", 39 => "Dbastos11", 40 => "Dbastos12"
  );

  function mostrarCartas($cartas)
  {
    for ($i = 0; $i < 40; $i++) {
      if ($i == 0 || $i == 10 || $i == 20 || $i == 30) {
        echo '<div class="container centrar mt-3"';
        echo '<div class="row">';
        echo '<div class="col-1" id="' . $cartas[$i] . '" style="width: 205px; height: 320px">';
        echo '</div>';
      } else {
        if ($i == 9 || $i == 19 || $i == 29 || $i == 39) {
          echo '<div class="col-2.5" id="' . $cartas[$i] . '" style="width: 205px; height: 320px">';
          echo '</div>';
          echo '</div>';
        } else {
          echo '<div class="col-1" id="' . $cartas[$i] . '" style="width: 205px; height: 320px">';
          echo '</div>';
        }
      }
    }
  }

  function ordenar($baraja)
  {
    sort($baraja);
    mostrarCartas($baraja);
  }

  function desordenar($baraja)
  {
    shuffle($baraja);
    mostrarCartas($baraja);
  }

  if (array_key_exists('button1', $_POST)) {
    ordenar($cartas);
  } else if (array_key_exists('button2', $_POST)) {
    desordenar($cartas);
  }
  ?>
  <div class="mt-3">

  </div>
</body>

</html>