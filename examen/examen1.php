<?
$contador=1;
$dom= new DOMDocument("1.0", "utf-8");
$dom->formatOutput= true; //dar formato
$raiz = $dom->childNodes[0];

/*if(file_exists('examen1.xml')){ 
    $ips= $dom->getElementsByTagName('Ip');

    foreach($ips as $nombre){
        if($nombre->nodeValue==$_SERVER['REMOTE_ADDR'] ){
            $contador++;
            $nombre->nextElementSibling=$contador;
        }else{
            $nombre->nodeValue=$_SERVER['REMOTE_ADDR'];
            $nombre->nextElementSibling->nodeValue=$contador;
            $nombre->nextElementSibling->nextElementSibling->nodeValue=date("D d m Y h:i:s O");
        }
    }
}else{*/
    //crear fichero (Escribir)
    $raiz=$dom->createElement('Direcciones');
    $dom->appendChild($raiz);
    $persona=$raiz->appendChild($dom->createElement('Persona'));
    $persona->appendChild($dom->createElement('Ip', $_SERVER['REMOTE_ADDR'] ));
    $persona->appendChild($dom->createElement('veces', $contador));
    $persona->appendChild($dom->createElement('Fecha',date("D d m Y h:i:s O") ));
//}





//Leer Fichero
foreach($raiz->childNodes as $elementos){
    if($elementos->nodeType==1){
        foreach($persona->childNodes as $ip){
            if($ip->nodeType==1){
                echo "<strong>". $ip->nodeName. "</strong>" ." " . $ip->nodeValue. " ";
            }
        }
    }
}





//guardamos la informacion en el documento
if($dom->save('examen1.xml')){
    //echo 'Todo correcto';
}




?>