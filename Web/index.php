<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
  $fecha_consultar = $_GET['fecha'];
  $horario = $_GET['fecha'];

} else {
  // para tener la hora de mexico
  date_default_timezone_set('America/Mexico_City');
  $fecha_consultar = date("Y-m-d");
  $horario = date("H:i:s");

}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$nahualRuta = ".\\imgs\\" . $nahual['nahual-ruta'];
$cholquij = $nahual['nahual-name'] . " " . strval($energia);


// horarios especificos 
// amanecer 3 am - 9 am
// medio dia 10 am - 3 pm
// tarde 4pm - 7 pm
// noche 9 pm - 2 am
$amanecerHora1 = "03:00:00";
$amanecerHora2 = "09:59:59";

$medioDiaHora1 = "10:00:00";
$medioDiaHora2 = "15:59:59";

$tardeHora1 = "16:00:00";
$tardeHora2 = "19:59:59";

$nocheHora1 = "20:00:00";
$nocheHora2 = "23:59:59"; // Modificado para antes de medianoche
$nocheHora2Alt = "02:59:59"; // Para después de medianoche

$prueba = "17:01:59";

$amanecerDatetime1 = new DateTime($amanecerHora1);
$amanecerDatetime2 = new DateTime($amanecerHora2);

$medioDiaDatetime1 = new DateTime($medioDiaHora1);
$medioDiaDatetime2 = new DateTime($medioDiaHora2);

$tardeDatetime1 = new DateTime($tardeHora1);
$tardeDatetime2 = new DateTime($tardeHora2);

$nocheDatetime1 = new DateTime($nocheHora1);
$nocheDatetime2 = new DateTime($nocheHora2);
$nocheDatetime2Alt = new DateTime($nocheHora2Alt);

$pruebaDatetime = new DateTime($prueba);

$horarioDeterminado = '';
$horarioDatetime = new DateTime($horario);

// verifica que tipo de horario esta
if ($horarioDatetime >= $amanecerDatetime1 && $horarioDatetime <= $amanecerDatetime2) {
  $horarioDeterminado = 'amanecer';
} else if ($horarioDatetime >= $medioDiaDatetime1 && $horarioDatetime <= $medioDiaDatetime2) {
  $horarioDeterminado = 'mediodia';

} else if ($horarioDatetime >= $tardeDatetime1 && $horarioDatetime <= $tardeDatetime2) {
  $horarioDeterminado = 'tarde';

} else if ($horarioDatetime >= $nocheDatetime1 && $horarioDatetime <= $nocheDatetime2) {
  $horarioDeterminado = 'noche';

} else if ($horarioDatetime <= $nocheDatetime2Alt) {
  $horarioDeterminado = 'noche';

}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Tiempo Maya</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php include "blocks/bloquesCss.html" ?>

  <!--ACA en estilo.css es donde estaran los fondos-->
  <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />

  <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />


</head>

<body>

  <?php include "NavBar.php" ?>
  <div>
    <section id="inicio">
      <div id="inicioContainer" class="inicio-container">
        <h1>Bienvenido al Tiempo Maya</h1>
        <div class="div-haab">
          <h5>Calendario Haab : <?php echo isset($haab["uinal-date"]) ? $haab["uinal-date"] : ''; ?></h5>
          <img src="<?php echo ".\\imgs\\" . $haab["uinal-ruta"] ?>" alt="<?php echo $haab["uinal-ruta"] ?>"
            class="img-uinal"></img>
        </div>
        <div class="div-cholquij">
          <h5>Calendario Cholquij : <?php echo isset($cholquij) ? $cholquij : ''; ?></h5>
          <img src="<?php echo $nahualRuta ?>" alt="<?php echo $nahualRuta ?>" class="img-nahual"></img>
        </div>
        <div class="div-cuentalarga">
          <h5>Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
          <img src=".\imgs\cuentaLarga.png" alt="Cuenta larga" class="img-cuentalarga"></img>
          <!--<label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>-->
        </div>
      </div>
    </section>
  </div>


  <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>

<script>

  //aca haria los cambios 
  document.addEventListener("DOMContentLoaded", function () {
    // para tener las images
    const amanecerImages = [
      "./imgs/imagenesHora/amanecer/Guatemala.jpg",
      "./imgs/imagenesHora/amanecer/imagen1.jpg",
      "./imgs/imagenesHora/amanecer/Tikal.jpg",
      "./imgs/imagenesHora/amanecer/Tikal1-885x500.jpg"
    ];

    const iamgenesMedioDia = [
      "./imgs/imagenesHora/mediodia/imagen2.jpg",
      "./imgs/imagenesHora/mediodia/imagen3.jpg",
      "./imgs/imagenesHora/mediodia/imagen4.jpg",
      "./imgs/imagenesHora/mediodia/imagen6.jpg",
      "./imgs/imagenesHora/mediodia/imagen12.jpg"
    ];

    const imagenesNoche = [
      "./imgs/imagenesHora/noche/Campamento-en-Tikal-para-observar-la-Luna-Llena-Enero-2021-1-885x500.jpg",
      "./imgs/imagenesHora/noche/Foto-de-Tikal-destaca-en-National-Geographic-en-Espanol-885x500.jpg",
      "./imgs/imagenesHora/noche/estrellas.jpeg",
    ];

    const imagenesTarde = [
      "./imgs/imagenesHora/tarde/imagen9.jpg",
      "./imgs/imagenesHora/tarde/imagen10.jpg",
      "./imgs/imagenesHora/tarde/imagn7.jpg",
      "./imgs/imagenesHora/tarde/imagne11.jpg",
      "./imgs/imagenesHora/tarde/Untitled.jpg",
    ];

    let currentIndex = 0;
    //array para las imagenes
    let images = [];
    const container = document.getElementById('inicio');
    const horario = "<?php echo $horarioDeterminado; ?>";
    console.log(horario);
    switch (horario) {
      case "amanecer":
        images = amanecerImages;
        break;
      case "mediodia":
        images = iamgenesMedioDia;

        break;
      case "tarde":
        images = imagenesTarde;


        break;
      case "noche":
        images = imagenesNoche;


        break;

    }
    function changeBackground() {
      currentIndex = (currentIndex + 1) % images.length;
      container.style.backgroundImage = `url(${images[currentIndex]})`;
    }

    setInterval(changeBackground, 7000);
  });

</script>