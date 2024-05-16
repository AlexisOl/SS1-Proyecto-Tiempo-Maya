<?php session_start(); ?>
<?php
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
$cholquij = $nahual . " " . strval($energia);

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