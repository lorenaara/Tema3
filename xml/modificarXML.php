<?
//cambiar el entrenador de Francia por Joau
$dom = new DOMDocument();
$dom->load('mundial.xml');
/*$raiz= $dom->childNodes[0];
$nuevo=$dom->createElement('Entrenador', 'Joao');
$cambiar=false;
foreach ($raiz->childNodes as $elemento) {
    if($elemento->nodeType==1){
        foreach ($elemento->childNodes as $datos) {
            if($datos->nodeType==1 && $datos->nodeValue=='Francia'){
                $cambiar=true;
            }
            if($cambiar && $datos->nodeName=='Entrenador'){
                $elemento->replaceChild($nuevo, $datos);
            }
        }
    }
}
if($dom->save('mundial.xml')){
    echo 'Todo bien';
}*/
//leer el documeto cargar el dom
//buscar la etiqueta nombre que tenga el valor Francia
//cambiar el value por Joau
//salvar el documento



//******************OTRA MANERA ********************/
$nombres = $dom->getElementsByTagName('Nombre');
foreach ($nombres as $nombre) {
   if($nombre->nodeValue == 'Francia'){
    $nombre->nextElementSibling->nodeValue= 'Lore';
    
   }
}
if($dom->save('mundial.xml')){
    echo 'Todo bien';
}
?>