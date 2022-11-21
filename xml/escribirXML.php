<?
$dom = new DOMDocument("1.0","utf-8");
//formatear el documento para que quede bonito
$dom->formatOutput= true;
$raiz= $dom->createElement('Mundial');
$dom->appendChild($raiz);
//elementos equipos
$equipo=$raiz->appendChild( $dom->createElement('Equipo'));
$equipo->appendChild($dom->createElement('Nombre', 'España'));
$equipo->appendChild($dom->createElement('Entrenador', 'Luis Enrique'));

$equipo=$raiz->appendChild( $dom->createElement('Equipo'));
$equipo->appendChild($dom->createElement('Nombre', 'Francia'));
$equipo->appendChild($dom->createElement('Entrenador', 'Pepe'));

//guardamos el dom en un documento
if($dom->save('mundial.xml')){
    echo 'Todo correcto';
}else{
    echo 'error';
}

?>