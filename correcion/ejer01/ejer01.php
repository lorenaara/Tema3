<?
require('./leerFichero.php');
//obtener direccion IP
$ip= $_SERVER['REMOTE_ADDR'];
//fecha
$fecha= date(DATE_RFC2822);
//fichero
if(file_exists('fichero.xml')){
    //si existe busco si se ha conectado la ip
    if(!ComprobarIP($ip,$fecha)){
        anadir($ip, $fecha);
    }
}else{
    //sino existe lo creo y escribo
    $dom= new DOMDocument("1.0", "utf-8");
    $dom->formatOutput= true; //dar formato
    $raiz = $dom->createElement('Conexion');
    $dom->appendChild($raiz);
    if($dom->save('fichero.xml')){
        //echo 'Todo correcto';
    }
    anadir($ip, $fecha);
}
Leer();
//Leer fichero

