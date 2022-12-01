<?
function Leer(){

    $dom= new DOMDocument();
    $dom->load('fichero.xml');
    $raiz = $dom->childNodes[0];
    foreach($raiz->childNodes as $elementos){
        if($elementos->nodeType==1){
            foreach($elementos->childNodes as $ip){
                if($ip->nodeType==1){
                    echo "<strong>". $ip->nodeName. "</strong>" ." " . $ip->nodeValue. " ";
                }
            }
        }
    }   
}

function ComprobarIP($ip, $fecha){

    $dom= new DOMDocument();
    $dom->load('fichero.xml');
   $ips=$dom->getElementsByTagName('Ip');
   foreach ($ips as $nombre) {
    if($nombre->nodeValue == $ip){
        $veces=(int)$nombre->nextElementSibling->nodeValue;
     $nombre->nextElementSibling->nodeValue= $veces+1;
     $nombre->nextElementSibling->nextElementSibling->nodeValue= $fecha;
     if($dom->save('fichero.xml')){
          return true;
         //echo 'Todo correcto';
     }
    }
}
return false;
}

function anadir($ip,$fecha){
    $dom= new DOMDocument();
    $dom->load('fichero.xml');
    $raiz = $dom->childNodes[0];
$conexion=$raiz->appendChild($dom->createElement('Conexion'));
$conexion->appendChild($dom->createElement('Ip', $ip ));
$conexion->appendChild($dom->createElement('veces', '1' ));
$conexion->appendChild($dom->createElement('fecha', $fecha));
if($dom->save('fichero.xml')){
    //echo 'Todo correcto';
}
}
?>