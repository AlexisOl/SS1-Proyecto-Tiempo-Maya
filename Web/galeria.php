<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
    $horario = $_GET['fecha'];

} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
    $horario = date("H:i:s");

}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual . " " . strval($energia);





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
    <title>Tiempo Maya - Relacion con la region Mesoamericana</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio">
            <div id="inicioContainer" class="inicio-container">
                <div class="contenidoCruzMaya">

                    <div class="container mx-auto">
                        <div class="card-deck">
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <div class="card">
                                        <?php
                                        $url = 'https://youtu.be/TXHiCg0xH5Q';
                                        $embed_code = '<iframe width="525" height="200" src="https://www.youtube.com/embed/TXHiCg0xH5Q?si=LnVtWuefFnyffrKh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                                        echo $embed_code;
                                        ?>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-5">

                                    <div class="card">
                                        <?php
                                        $codigo2 = '<iframe width="525" height="200" src="https://www.youtube.com/embed/4vaLpmOyVIk?si=lElrsaqVzXj8DPsQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                                        echo $codigo2;
                                        ?>
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">

                                    <div class="card">
                                        <img class="card-img-top" src="./imgs/galeria/img2.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 ">

                                    <div class="card">
                                        <img class="card-img-top" src="./imgs/galeria/img3.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">

                                    <div class="card">
                                        <img class="card-img-top" src="./imgs/galeria/img4.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="card-img-top" src="./imgs/galeria/img5.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4 mb-3">

                                    <div class="card">
                                        <img class="card-img-top" src="./imgs/galeria/img6.jpg" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">

                                    <div class="card">
                                        <img class="card-img-top" src="./imgs/galeria/Untitled.jpg"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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