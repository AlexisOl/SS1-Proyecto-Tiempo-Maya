<?php
// peticion]
$query = $conn->query("SELECT cm.* FROM cruzMaya cm 
join nahual n on n.idweb = cm.nahual WHERE n.nombre=\"" . $nombreNahual . "\"  AND idioma='" . $idioma . "';");
$row = mysqli_fetch_assoc($query);
return $row;
?>