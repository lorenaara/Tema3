<?
$mundial = simplexml_load_file('mundial.xml');
//print_r($mundial);
//LEER
foreach ($mundial as $equipo) {
    echo '<br>Equipo: '. $equipo->children()[0];
    echo ' y Entrenador: '. $equipo->children()[1];
}

//AÑADIR
$equipo=$mundial->addChild('Equipo');
$equipo->addChild('Nombre', 'Italia');
$equipo->addChild('Entrenador', 'Alexandro');
$mundial->asXML('mundial2.xml');
?>