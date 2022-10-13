<?php
//array numerico
//vacio
$meses = array();
echo var_dump($meses);
//crear array con datos
$meses = array('Enero', 'Febrero', 'Marzo');
echo "<pre>";
echo var_dump($meses);
echo "</pre>";
//crear array con una longitud
$semana=array(7);
echo "<pre>";
echo var_dump($semana);
echo "</pre>";
//sintaxis corta
$nota= [2.3, 5,6];
echo "<pre>";
echo var_dump($nota);
echo "</pre>";

//acceder o modificar un elemento
echo $meses[2];
//contar el numero de elementos de un array
echo "<br>";
echo count($meses);
//recorrer el array
for($i=0; $i< count($meses); $i++){
    echo "<br>";
    echo $meses[$i];
}
//asignar un nuevo valor
$meses[3]='Abril';
for($i=0; $i< count($meses); $i++){
    echo "<br>";
    echo $meses[$i];
}

$meses[5]='Junio';
$meses[6]='Julio';
echo "<br>". count($meses);
for($i=0; $i< count($meses); $i++){
    echo "<br>";
    echo $meses[$i];
}

foreach($meses as $key){
    echo $key;
}
array_push($meses, "Agosto");
foreach($meses as $key){
    echo $key;
}

//quitar un elemento
unset($meses[0]);
echo "<pre>";
echo var_dump($meses);
echo "</pre>";

print_r($meses);
echo "<br><br>";

$notas= array("Cristian"=>7, "lucia"=>10, "Itziar"=>10, "Manuel"=>10, "Javier"=>9.75);
print_r($notas);
echo "<br>Nota ". $notas['lucia'];
foreach ($notas as $key => $value) {
    # code...
    echo "<br>La nota de  ".$key . " es ".$value; 
}

foreach ($notas as  $value) {
    # code...
    echo "<br>" .$value;
}

echo "<h1>Multidimensionales</h1>";
$multi= array(array(), array());
echo var_dump($multi);

$asignaturas = array(
    "DAM"=> array("PRO"=> "Programacion", "LM"=>"Lenguaje de Marcas"),
    "DAW2"=>array("DWES"=>"Servidor", "DWEC"=>"cliente")
);

foreach ($asignaturas as $key => $value) {
    echo "<br> El curso de ". $key . " cursa las siguientes asignaturas ";
    foreach($value as $siglas=>$nombre){
        echo "<br>" . $siglas . ": ".$nombre;
    }
}

echo "<h1>Funciones</h1>";
//current 
echo "Current ". current($notas); //valor al que apunta el puntero
echo "<br>Ultimo " . end($notas); //ultimo valor del array
reset($notas);
echo "<br>Current ". current($notas);
echo "<br>clave: ". key($notas);
end($notas);
reset($notas);

?>