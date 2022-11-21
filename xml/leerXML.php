<?
$dom= new DOMDocument();
//cargar lo que tenemos ene el fichero
$dom->load('departamento.xml');

echo 'Fichero<br>';

//saca los hijos 
//leer lo que hay en el raiz
$raiz = $dom->childNodes[0];
echo "Raiz: ". $raiz->nodeName;
//numero de hijos de la raiz
echo "<br>Tiene ". $raiz->childNodes->length . " hijos";
//recorrer los hijos
foreach ($raiz->childNodes as $elemento) {
    if($elemento->nodeType==1){
        echo "<br> Un hijo que es: ". $elemento->nodeName;
        //sacar el codigo y la descripcion del elemento
        foreach ($elemento->childNodes as $datos) {
            if($datos->nodeType==1){
                echo "<br> Un hijo que es: ". $datos->nodeName . "y valor: ". $datos->nodeValue;
            }
        }
    }
}

//$raiz= $dom->childNodes[0]->childNodes[1]->childNodes[1]->nodeValue;
?>