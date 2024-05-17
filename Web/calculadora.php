<?php
session_start();
$conn = include "conexion/conexion.php";
// para la fecha
if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
    $horario = $_GET['fecha'];
} else {
    date_default_timezone_set('America/Mexico_City');
    $fecha_consultar = date("Y-m-d");
    $horario = date("H:i:s");

}

// para el idioma 
$idioma = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'espaniol';


$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
// cambio en un mal llamado del array en php
$cholquij = $nahual['nahual-name'] . " " . strval($energia);

$nombreNahual = isset($nahual['nahual-name']) ? $nahual['nahual-name'] : 'ddd';
//aqui obtiene la cruz
$cruz = include 'backend/buscar/conseguir_cruzMaya.php';
$cruzEspecifica = include 'backend/buscar/conseguir_cruzEspecifica.php';
// split  a los numeors de cuenta larga 
$valores = explode(".", $cuenta_larga);

// determina la cruz a usar
function determinarCruz($nombre)
{
    switch ($nombre) {
        case "Tzikin":
            return "./imgs/cruzmaya/tzikin.png";
        case "Ajmaq":
            return "./imgs/cruzmaya/ajmaq.png";
        case "No'j":
            return "./imgs/cruzmaya/noj.png";
        case "Tijax":
            return "./imgs/cruzmaya/tijax.png";
        case "Kawoq":
            return "./imgs/cruzmaya/kawok.png";
        case "Ajpu":
            return "./imgs/cruzmaya/ajpu.png";
        case "Imox":
            return "./imgs/cruzmaya/imox.png";
        case "Iq'":
            return "./imgs/cruzmaya/iq.png";
        case "Aq'ab'al":
            return "./imgs/cruzmaya/akabal.png";
        case "K'at":
            return "./imgs/cruzmaya/kat.png";
        case "Kan":
            return "./imgs/cruzmaya/kan.png";
        case "Kame":
            return "./imgs/cruzmaya/keme.png";
        case "Kej":
            return "./imgs/cruzmaya/kiej.png";
        case "Q'anil":
            return "./imgs/cruzmaya/qanil.png";
        case "Toj":
            return "./imgs/cruzmaya/toj.png";
        case "Tz'i'":
            return "./imgs/cruzmaya/tzi.png";
        case "B'atz'":
            return "./imgs/cruzmaya/batz.png";
        case "E'":
            return "./imgs/cruzmaya/e.png";
        case "Aj":
            return "./imgs/cruzmaya/aj.png";
        case "I'x":
            return "./imgs/cruzmaya/ix.png";
        default:
            return null;
    }
}


// determina el tzolkij
function determinarTzoik($nombre)
{
    switch ($nombre) {
        case "Tzikin":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-tzikin.png";
        case "Ajmaq":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-ajmaq.png";
        case "No'j":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-noj.png";
        case "Tijax":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-tijax.png";
        case "Kawoq":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-kawoq.png";
        case "Ajpu":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-ajpu.png";
        case "Imox":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-imox.png";
        case "Iq'":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-iq.png";
        case "Aq'ab'al":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-aqabal.png";
        case "K'at":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-kat.png";
        case "Kan":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-kan.png";
        case "Kame":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-kame.png";
        case "Kej":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-kej.png";
        case "Q'anil":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-qanil.png";
        case "Toj":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-toj.png";
        case "Tz'i'":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-tzi.png";
        case "B'atz'":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-batz.png";
        case "E'":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-e.png";
        case "Aj":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-aj.png";
        case "I'x":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-ix.png";
        default:
            return null;
    }
}


function determinar($numero, $valores)
{
    switch ($valores[$numero]) {
        case 0:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\cero.png";
        case 1:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\uno.png";
        case 2:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\dos.png";
        case 3:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\tres.png";
        case 4:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\cuatro.png";
        case 5:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\cinco.png";
        case 6:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\seis.png";
        case 7:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\siete.png";
        case 8:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\ocho.png";
        case 9:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\nueve.png";
        case 10:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\diez.png";
        case 11:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\once.png";
        case 12:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\doce.png";
        case 13:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\trece.png";
        case 14:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\catorce.png";
        case 15:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\quince.png";
        case 16:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\dieciseis.png";
        case 17:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\diecisiete.png";
        case 18:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\dieciocho.png";
        case 19:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\diecinueve.png";
        case 20:
            return ".\\imgs\\CuentaLargaEspecifico\\imgnumeros\\veinte.png";
        default:
            return null;
    }
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
    <title>Tiempo Maya - Calculadora de Mayas</title>
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
                <div id='formulario'>
                    <h1>Calculadora</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>
                    <div class="container">
                        <div id="tabla">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Calendario</th>
                                        <th scope="col" style="width: 60%;">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Calendario Haab</th>
                                        <td><?php echo isset($haab) ? $haab['uinal-date'] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Calendario Cholquij</th>
                                        <td><?php echo isset($cholquij) ? $cholquij : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cuenta Larga</th>
                                        <td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                    </div>

                </div>

            </div>

    </div>

    </div>

    </div>

    </section>
    <section id="inicio2">
        <div id="inicio2Container" class="inicio2-container">
            <div class="contenidoCruzMaya">
                <img src="./imgs/CuentaLargaEspecifico/graficoInicial.png" alt="Cuenta larga" class="img-cuentalarga"
                    width="150" height="150">
                <div class="tabla">
                    <table class="table table-dark table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo determinar(0, $valores); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                    <img src="./imgs/CuentaLargaEspecifico/baktun.png" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                </td>
                                <td>
                                    <img src="<?php echo determinar(1, $valores); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                    <img src="./imgs/CuentaLargaEspecifico/Katun.png" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo determinar(2, $valores); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                    <img src="./imgs/CuentaLargaEspecifico/tun.png" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                </td>
                                <td>
                                    <img src="<?php echo determinar(3, $valores); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                    <img src="./imgs/CuentaLargaEspecifico/unial.png" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="<?php echo determinar(4, $valores); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                    <img src="./imgs/CuentaLargaEspecifico/kin.png" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                </td>
                                <td>
                                    <img src="<?php echo determinar(5, $valores); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                    <img src="<?php echo determinarTzoik($nombreNahual); ?>" alt="Cuenta larga"
                                        class="img-cuentalarga" width="100" height="100">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2>Cruz Maya</h2>
                <div class="cross-container">
                    <div class="cross-item top">
                        <img src="<?php echo determinarTzoik($cruzEspecifica['concepcion']); ?>" alt="Cuenta larga"
                            class="img-cuentalarga" height="150" width="150">
                    </div>
                    <div class="cross-item left">
                        <img src="<?php echo determinarTzoik($cruzEspecifica['izquierda']); ?>" alt="Cuenta larga"
                            class="img-cuentalarga" height="150" width="150">
                    </div>
                    <div class="cross-item center">
                        <img src="<?php echo determinarTzoik($cruzEspecifica['nahual']); ?>" alt="Cuenta larga"
                            class="img-cuentalarga" height="150" width="150">
                    </div>
                    <div class="cross-item right">
                        <img src="<?php echo determinarTzoik($cruzEspecifica['derecha']); ?>" alt="Cuenta larga"
                            class="img-cuentalarga" height="150" width="150">
                    </div>
                    <div class="cross-item bottom">
                        <img src="<?php echo determinarTzoik($cruzEspecifica['destino']); ?>" alt="Cuenta larga"
                            class="img-cuentalarga" height="150" width="150">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h3>Concepcion</h3>
                        <p style="color:white;"><?php echo $cruz['concepcion'] ?></p>
                    </div>


                    <div class="col-md-6">
                        <h3>Destino</h3>
                        <p style="color:white;"><?php echo $cruz['destino'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>izquierda</h3>
                        <p style="color:white;"><?php echo $cruz['izquierda'] ?></p>
                    </div>


                    <div class="col-md-6">
                        <h3>derecha</h3>
                        <p style="color:white;"><?php echo $cruz['derecha'] ?></p>
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
        let images = [];
        const container = document.getElementById('inicio');
        const container2 = document.getElementById('inicio2');
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
            container2.style.backgroundImage = `url(${images[currentIndex]})`;
        }

        setInterval(changeBackground, 7000);
    });

</script>