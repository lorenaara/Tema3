<?php
echo "el nombre es ". $_REQUEST['nombre'];
echo "la contraseña es ". $_REQUEST['pass'];
if(isset($_REQUEST['genero'])){ //esta definido
    echo "<br> El genero es: ". $_REQUEST['genero'];
}
echo "<br>";
echo "Las asignaturas que has elegido son: ";
if(isset($_REQUEST['asignaturas'])){
foreach ($_REQUEST['asignaturas'] as $key => $value) {
    echo "<br>". $value;
}
}
echo "<br>";
print_r($_REQUEST);
echo "<br>";
print_r($_FILES);
$ubicacion = "/var/www/html/";
$nombreTemporal= basename($_FILES['fichero']['name']);
$ubicacion= $ubicacion.$nombreTemporal;
if(move_uploaded_file($_FILES['fichero']['tmp_name'], $ubicacion)){
    echo "<br> El fichero se ha movido";
}else{
    echo "Se ha producido un error";
}
?>