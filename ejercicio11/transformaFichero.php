<?
//Realizar una pagina que transforme el csv notas a un xml
$dom = new DOMDocument('1.0','utf-8' );
$dom->formatOutput= true;
$raiz =$dom->createElement('notas');
$dom->appendChild($raiz);
if($fp= fopen('notas.csv', 'r')){
    while($leido= fgetcsv($fp, filesize('notas.csv'), ';')){
        //for($i=0; $i < count($leido); $i++){
           // print_r($leido);
            $alumno= $raiz->appendChild($dom->createElement('alumno'));
            $alumno->appendChild($dom->createElement('nombre', $leido[0]));
            $alumno->appendChild($dom->createElement('nota1', $leido[1]));
            $alumno->appendChild($dom->createElement('nota2', $leido[2]));
            $alumno->appendChild($dom->createElement('nota3', $leido[3]));

        //}
    }
    if($dom->save('notasAlumnos.xml')){
        echo 'Todo correcto';
    }else{
        echo 'Error';
    }
    fclose($fp);
    //mandar a la pagina leer
    header('Location:./leerArchivoXml.php');
    exit;

}


?>