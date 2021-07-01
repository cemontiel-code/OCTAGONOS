<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap (2).css">
    <title>Calculo del Area de un octagono regular</title>
</head>
<body>

<?php

  // DECLARACION DE VARIABLES 
  $long = 0;  // VALORES DADOS POR EL USUARIO
  $area  =  0 ;              // AREA A CONSEGUIR 
  $error = false;            // MANEJO DE ERRORS
  $errMSg = "";
  $resmsg = "";


  // VALIDAR INPUTS
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["long"]) ) {
            $error = true;
            $errMSg= "campo vacio";
            $resmsg=$errMSg;
      } elseif (!preg_match("/^[0-9]*$/",$_POST["long"])) {
            $error = true;
            $errMSg = "no es numero";
            $resmsg=$errMSg;
      } else  {
        $long = $_POST["long"];
      }
  }

  if (!$error){
      $s22 = (22.5*pi())/180;
      $s22 = sin($s22);
      $s67 = (67.5*M_PI)/180;
      $s67 = sin($s67);
      $lAux = pow($long,2);

      $area = 2*$lAux*($s67/$s22);
      $resmsg = "el area del octagono es ".number_format($area, 2)." aprox";
  }

?>
    <div class="card text-white bg-secondary container-fluid mb-4 p-4" style="max-height: 15rem;">
        <h1> Calculadora de Area <br>de octagonos regulares</h1>
    </div>

    <div class="card border-primary mb-3 ml-3 container" style="max-width: 80%;">
    
        <div class="card-body">
            <h4 class="card-title">Qué es Octágono regular?</h4>
            <p class="card-text">Un octágono regular es un polígono de ocho lados y ocho ángulos iguales</p>

            <h4 class="card-title">Ángulos del octágono</h4>
            <p class="card-text">Suma de ángulos interiores de un octágono = (8 − 2) · 180° = 1080°
            <br>
            El valor de un ángulo interior del octágono regular es 1080º : 8 = 135º
            <br>
            El ángulo central del octágono regular mide: 360º : 8 = 45º</p>
        </div>

         <hr>

        <div class="form-group m-3">
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <h3 class="form-label" for="lados">introduzca la longitud de los lados del octagono</h3>
            <br>
            <input class="form-control form-control-lg" type="number" name="long" value="0">
            <br>
            <input class="btn btn-primary" type="submit" value="Calcular el area" id="btn-Res" style="aling-self:center;">
         </form>
        </div>
       
        <span class="container m-3" id="result">
            <?php
              echo "<div class='card bg-light border-success mb-3' style='max-width:95%;'>";
              echo "<div class='card-header'>El Resultado</div>";
              echo "<div class='card-body'>";

              echo "<h4 class='card-text'<br>$resmsg<br></h4></div>
              </div>";
              
            ?>
        </span>
    </div>

</body>
</html>