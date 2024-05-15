<?php
session_start();
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
// cambio en un mal llamado del array en php
$cholquij = $nahual['nahual-name'] . " " . strval($energia);

$nombreNahual =  isset($nahual['nahual-name'])? $nahual['nahual-name']: 'ddd';

// split  a los numeors de cuenta larga 
$valores = explode(".", $cuenta_larga);

function determinarTzoik($nombre){
    switch ($nombre) {
        case "Tzikin":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-tzikin.png";
        case "Ajmaq":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-ajmaq.png";
        case "No'j":
            return "./imgs/Calendario_Cholquij/Nahuales/cholquij-Noj.png";
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
                        <img src=".\imgs\CuentaLargaEspecifico\graficoInicial.png" alt="Cuenta larga"
                            class="img-cuentalarga"></img>
                        <div class="tabla">
                            <table class="table table-dark table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="<?php echo determinar(0, $valores); ?>" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                            <img src=".\imgs\CuentaLargaEspecifico\baktun.png" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                        </td>
                                        <td>
                                            <img src="<?php echo determinar(1, $valores); ?>" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                            <img src=".\imgs\CuentaLargaEspecifico\Katun.png" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo determinar(2, $valores); ?>" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                            <img src=".\imgs\CuentaLargaEspecifico\tun.png" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                        </td>
                                        <td>
                                            <img src="<?php echo determinar(3, $valores); ?>" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                            <img src=".\imgs\CuentaLargaEspecifico\unial.png" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="<?php echo determinar(4, $valores); ?>" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                            <img src=".\imgs\CuentaLargaEspecifico\kin.png" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                        </td>
                                        <td>
                                            <img src="<?php echo determinar(5, $valores); ?>" alt="Cuenta larga"
                                                class="img-cuentalarga" width="100" height="100"></img>
                                            <img src="<?php echo determinarTzoik($nombreNahual); ?>"
                                                alt="Cuenta larga" class="img-cuentalarga" width="100"
                                                height="100"></img>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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