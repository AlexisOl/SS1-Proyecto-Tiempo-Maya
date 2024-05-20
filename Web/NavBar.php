<?php
$conn = include 'conexion/conexion.php';
// cambios de nombre de la base de datos para ir acorde ver bien

$idioma = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'espaniol';


if ($idioma == "espaniol") {
  $kinesNav = $conn->query("SELECT nombre FROM tiempo_maya.kin order by nombre;");
  $uinalesNav = $conn->query("SELECT nombre FROM tiempo_maya.uinal order by nombre;");
  $nahualesNav = $conn->query("SELECT nombre FROM tiempo_maya.nahual order by nombre;");
  $energiasNav = $conn->query("SELECT nombre FROM tiempo_maya.energia order by id;");
  $periodosNav = $conn->query("SELECT nombre FROM tiempo_maya.periodo order by orden ;");
} else {
  $kinesNav = $conn->query("SELECT nombre FROM tiempo_maya.kins order by nombre;");
  $uinalesNav = $conn->query("SELECT nombre FROM tiempo_maya.unil order by nombre;");
  $nahualesNav = $conn->query("SELECT nombre FROM tiempo_maya.nawal order by nombre;");
  $energiasNav = $conn->query("SELECT nombre FROM tiempo_maya.energiakiche order by id;");
  $periodosNav = $conn->query("SELECT nombre FROM tiempo_maya.periodo order by orden ;");
}





?>
<?php include "mensaje.php"; ?>


<header id="header" style="padding-left: 600px;">
  <div class="container">
    <nav class="navbar navbar-expand-lg" id="nav-menu-container">
      <div class="container-fluid">
        <a id="title" class="navbar-brand" href="index.php"
          style="color: white;font-size: 24px;"><strong>TIEMPO</strong> MAYA</a>
        <button class="navbar-toggler" type="button" onclick="rellenar()" data-toggle="collapse"
          data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
          aria-label="Toggle navigation">
          <span><i style="color: white;" class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav nav-menu">
            <li>
              <a class="nav-link"
                href="models/paginaModelo.php?pagina=Calendario Haab"><?php echo $idioma === 'espaniol' ? 'Calendario Haab' : "Cholq'ij Haab"; ?>
                &nbsp;&nbsp;&nbsp;&nbsp; </a>
              <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $idioma === 'espaniol' ? 'Calendario Haab' : "Cholq'ij Haab"; ?>
              </button>


              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li>
                  <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kin
                  </button>
                  <a class="nav-link" href="#" style="font-size: 13px;">Kines </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div div style="width: 200px; height: 400px; overflow-y: scroll;">
                      <?php

                      if (is_array($kinesNav) || is_object($kinesNav)) {
                        foreach ($kinesNav as $kin) {
                          $seccion = ($idioma == 'espaniol') ? 'kin#' : 'kins#';
                          echo "<li class='nav-item'><a class='nav-link' href='models/paginaModeloElemento.php?elemento=" . $seccion . $kin['nombre'] . "'>" . $kin['nombre'] . "</a></li>";
                        }

                      } ?>
                  </ul>
                </li>
                <li>
                  <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Uinal
                  </button>
                  <a class="nav-link" href="#" style="font-size: 13px;">Uniales </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div div style="width: 200px; height: 400px; overflow-y: scroll;">
                      <?php if (is_array($uinalesNav) || is_object($uinalesNav)) {
                        foreach ($uinalesNav as $uinal) {
                          $seccion2 = ($idioma == 'espaniol') ? 'uinal#' : 'unil#';

                          echo "<li class='nav-item'><a class='nav-link' href='models/paginaModeloElemento.php?elemento=" . $seccion2 . $uinal['nombre'] . "'>" . $uinal['nombre'] . "</a></li>";
                        }
                      } ?>
                  </ul>
                </li>
              </ul>
            </li>

            <li>
              <a class="nav-link"
                href="models/paginaModelo.php?pagina=Calendario Cholquij"><?php echo $idioma === 'espaniol' ? 'Calendario Cholquij' : "Cholq'ij Ajaw"; ?>
                &nbsp;&nbsp;&nbsp;&nbsp; </a>
              <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php echo $idioma === 'espaniol' ? 'Calendario Cholquij' : "Cholq'ij Ajaw"; ?>

              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li>
                  <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Nahual
                  </button>
                  <a class="nav-link" href="#" style="font-size: 13px;">Nahuales </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div div style="width: 200px; height: 400px; overflow-y: scroll;">
                      <?php if (is_array($nahualesNav) || is_object($nahualesNav)) {
                        foreach ($nahualesNav as $nahual) {
                          $seccion3 = ($idioma == 'espaniol') ? 'nahual#' : 'nawal#';

                          echo "<li class='nav-item'><a class='nav-link' href='models/paginaModeloElemento.php?elemento=" . $seccion3 . $nahual['nombre'] . "'>" . $nahual['nombre'] . "</a></li>";
                        }
                      } ?>
                    </div>
                  </ul>
                </li>
                <li>
                  <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Energia
                  </button>
                  <a class="nav-link" href="#" style="font-size: 13px;">Energias </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div div style="width: 200px; height:400px; overflow-y: scroll;">
                      <?php if (is_array($energiasNav) || is_object($energiasNav)) {
                        foreach ($energiasNav as $energia) {
                          $seccion4 = ($idioma == 'espaniol') ? 'energia#' : 'energiakiche#';

                          echo "<li class='nav-item'><a class='nav-link' href='models/paginaModeloElemento.php?elemento=" . $seccion4 . $energia['nombre'] . "'>" . $energia['nombre'] . "</a></li>";
                        }
                      } ?>
                    </div>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="models/paginaModelo.php?pagina=Rueda Calendarica">
                <?php echo $idioma === 'espaniol' ? 'Rueda Calendarica' : "Rujil q'ij"; ?>

              </a>
            </li>

            <li class="nav-item"><a class="nav-link" href="models/paginaModelo.php?pagina=Calculadora">
                <?php echo $idioma === 'espaniol' ? 'Calculadora' : "Ch'aqib'äl"; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;</a>
              <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $idioma === 'espaniol' ? 'Calculadora' : "Ch'aqib'äl"; ?>

              </button>
              <ul>

                <li>
                  <button type="button" style="opacity: 0; height: 0;" class="nav-link" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $idioma === 'espaniol' ? 'Usar Calculadora' : "Ch'aqib'äl"; ?>

                  </button>
                  <a class="nav-link" href="calculadora.php"
                    style="font-size: 13px;"><?php echo $idioma === 'espaniol' ? 'Usar Calculadora' : "Ch'aqib'äl"; ?>
                  </a>

                </li>

              </ul>

            </li>



            <!--para la region-->
            <li class="nav-item"><a class="nav-link" href="models/paginaModelo.php?pagina=Mesoamerica">
                <?php echo $idioma === 'espaniol' ? 'Relación mesoamericana' : "K'amal b'i'aj Mesoamerikano"; ?>

              </a></li>


            <!--para la galeria-->
            <li class="nav-item"><a class="nav-link" href="galeria.php">
                <?php echo $idioma === 'espaniol' ? 'Galería' : "Jolom Tz'ib'äl"; ?>
              </a></li>

            <!--para el idioma-->
            <li class="nav-item"><a class="nav-link" href="#">
                <?php echo $idioma === 'espaniol' ? 'Idiomas' : "Tz'ib'anelab"; ?> &nbsp;&nbsp;&nbsp;&nbsp;</a>
              <ul>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="language-button" onclick="changeLanguage('espaniol')">Espaniol</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="language-button" onclick="changeLanguage('kiche')">Kiche</a>
                </li>
              </ul>
            </li>


          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>

<script type="text/javascript">
  function changeLanguage(idioma) {
    const currentLanguage = getCookie('language');
    const newLanguage = idioma;
    if (currentLanguage !== newLanguage) {
      document.cookie = "language=" + newLanguage + ";path=/";
      location.reload();
    }
  }

  function getCookie(name) {
    const value = "; " + document.cookie;
    const parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
  }


</script>


<script type="text/javascript">
  var relleno = false;

  function rellenar() {
    if (!relleno) {
      $('#header').addClass('header-fixed1');
      $('#inicioContainer').addClass('iniciofixed');
      relleno = true
    } else {
      relleno = false
      $('#header').removeClass('header-fixed1');
      $('#inicioContainer').removeClass('iniciofixed');
    }
  }
</script>