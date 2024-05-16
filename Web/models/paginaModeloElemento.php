<?php

use function PHPSTORM_META\type;

session_start(); ?>
<?php

$conn = include '../conexion/conexion.php';
$tabla = $_GET['elemento'];
$table = strtolower($tabla);
$datos = $conn->query("SELECT nombre,significado,htmlCodigo,ruta FROM tiempo_maya." . $table . ";");

$elementos = $datos;
$informacion = $conn->query("SELECT htmlCodigo FROM tiempo_maya.pagina WHERE nombre='" . $tabla . "';");

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
    $horario = $_GET['fecha'];

} else {
    // para tener la hora de mexico
    date_default_timezone_set('America/Mexico_City');
    $fecha_consultar = date("Y-m-d");
    $horario = date("H:i:s");
}

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
    <title>Tiempo Maya - <?php echo $tabla; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "../blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="../css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />


</head>
<?php include "../NavBar2.php" ?>

<body>
    <section id="inicio">
        <div id="inicioContainer" class="inicio-container">

            <?php echo "<h1>" . $tabla . " </h1>";
            ?>
            <a href='#informacion' class='btn-get-started'>Informacion</a>
            <a href='#elementos' class='btn-get-started'>Elementos</a>
        </div>
    </section>
    <section id="information">
        <div class="container">
            <div class="row about-container">
                <div class="section-header">
                    <h3 class="section-title">INFORMACION</h3>
                </div>
                <?php foreach ($informacion as $info) {
                    echo $info['htmlCodigo'];
                } ?>
            </div>

        </div>
    </section>
    <hr>

    <section id="elementos">
        <div class="container">
            <div class="row about-container">
                <div class="section-header">
                    <h3 class="section-title">Elementos</h3>
                </div>
                <?php foreach ($datos as $dato) {
                    $stringPrint = "<h4 id='" . $dato['nombre'] . "'>" . $dato['nombre'] . "</h4>";
                    $stringPrint .= "<h5>Significado</h5> <p>" . $dato['significado'] . "</p>";
                    $stringPrint .= "<p>" . $dato['htmlCodigo'] . "</p> ";
                    $stringPrint .= "<img src=" . "..\\imgs\\" . $dato['ruta'] . " alt='" . $dato['ruta'] . "' class='img-elemento'> <hr>";
                    echo $stringPrint;
                } ?>
            </div>

        </div>
    </section>


    <?php include "../blocks/bloquesJs.html" ?>




</body>

</html>

<script>

    //aca haria los cambios 
    document.addEventListener("DOMContentLoaded", function () {
        // para tener las images
        const amanecerImages = [
            "../imgs/imagenesHora/amanecer/Guatemala.jpg",
            "../imgs/imagenesHora/amanecer/imagen1.jpg",
            "../imgs/imagenesHora/amanecer/Tikal.jpg",
            "../imgs/imagenesHora/amanecer/Tikal1-885x500.jpg"
        ];

        const iamgenesMedioDia = [
            "../imgs/imagenesHora/mediodia/imagen2.jpg",
            "../imgs/imagenesHora/mediodia/imagen3.jpg",
            "../imgs/imagenesHora/mediodia/imagen4.jpg",
            "../imgs/imagenesHora/mediodia/imagen6.jpg",
            "../imgs/imagenesHora/mediodia/imagen12.jpg"
        ];

        const imagenesNoche = [
            "../imgs/imagenesHora/noche/Campamento-en-Tikal-para-observar-la-Luna-Llena-Enero-2021-1-885x500.jpg",
            "../imgs/imagenesHora/noche/Foto-de-Tikal-destaca-en-National-Geographic-en-Espanol-885x500.jpg",
            "../imgs/imagenesHora/noche/estrellas.jpeg",
        ];

        const imagenesTarde = [
            "../imgs/imagenesHora/tarde/imagen9.jpg",
            "../imgs/imagenesHora/tarde/imagen10.jpg",
            "../imgs/imagenesHora/tarde/imagn7.jpg",
            "../imgs/imagenesHora/tarde/imagne11.jpg",
            "../imgs/imagenesHora/tarde/Untitled.jpg",
        ];

        let currentIndex = 0;
        //array para las imagenes
        let images2 = [];
        const container = document.getElementById('inicio');
        const horario = "<?php echo $horarioDeterminado; ?>";
        console.log(horario);
        switch (horario) {
            case "amanecer":
                images2 = amanecerImages;
                break;
            case "mediodia":
                images2 = iamgenesMedioDia;

                break;
            case "tarde":
                images2 = imagenesTarde;


                break;
            case "noche":
                images2 = imagenesNoche;


                break;

        }
        function changeBackground() {
            currentIndex = (currentIndex + 1) % images2.length;
            container.style.backgroundImage = `url(${images2[currentIndex]})`;
        }

        setInterval(changeBackground, 7000);
    });

</script>