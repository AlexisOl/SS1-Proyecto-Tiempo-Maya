<?php
// peticion] aqui da igual si esta en kiche o no, son lo mismo
$query = $conn->query("SELECT n5.nombre as 'nahual', n2.nombre as 'concepcion', 
n.nombre as 'destino', n3.nombre as 'izquierda', n4.nombre as 'derecha' 
FROM cruzMayaEspecifica cme 
join nahual n on n.idweb = cme.id_nahual_destino 
join nahual n2 on n2.idweb = cme.id_nahual_concepcion 
join nahual n3 on n3.idweb = cme.id_nahual_izquierda 
join nahual n4 on n4.idweb = cme.id_nahual_derecha 
join cruzMaya cm on cm.identificador = cme.nahual join nahual n5 on n5.idweb = cm.nahual
where n5.nombre =\"" . $nombreNahual . "\"   ;");
$row = mysqli_fetch_assoc($query);
return $row;
?>