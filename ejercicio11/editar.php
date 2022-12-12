<?php
$dom= new DOMDocument();
$dom->load('notasAlumnos.xml');
$raiz=$dom->childNodes[0]; //notas
$cambiar=false;
if(isset($_REQUEST['guardar'])){
    /*$nota1=$dom->createElement('nota1', $_REQUEST['nota1']);
    $nota2=$dom->createElement('nota2', $_REQUEST['nota2']);
    $nota3=$dom->createElement('nota3', $_REQUEST['nota3']);*/

    /*foreach($raiz->childNodes as $alumnos){
        if($alumnos->nodeType==1){
            foreach($alumnos->childNodes as $notas){  
                if($notas->nodeType ==1 && $notas->nodeValue== $_REQUEST['name']){
                  $cambiar= true;
                }
                if($cambiar && $notas->nodeName=='nota1'){
                    $alumnos->replaceChild($nota1, $notas);
                }
                if($cambiar && $notas->nodeName=='nota2'){
                    $alumnos->replaceChild($nota2, $notas);
                }
                if($cambiar && $notas->nodeName=='nota3'){
                    $alumnos->replaceChild($nota3, $notas);
                }
            }
        }
    }*/

    $nombres = $dom->getElementsByTagName('nombre');
    foreach ($nombres as $nombre) {
       if($nombre->nodeValue == $_REQUEST['name']){
            $nombre->nextElementSibling->nodeValue=$_REQUEST['nota1'] ;
            $nombre->nextElementSibling->nextElementSibling->nodeValue=$_REQUEST['nota2'] ;
            $nombre->nextElementSibling->nextElementSibling->nextElementSibling->nodeValue=$_REQUEST['nota3'] ;
       }
    }


    if($dom->save('notasAlumnos.xml')){
        header('Location:./leerArchivoXml.php');
        exit;
    }
}


echo '<table style="border: #000 1px solid; border-collapse: collapse; ">';
echo '<tr><th style="border: #000 1px solid; padding:10px;">Alumno</th>';
echo '<th style="border: #000 1px solid; padding:10px;">nota1</th>';
echo '<th style="border: #000 1px solid; padding:10px;">nota2</th>';
echo '<th style="border: #000 1px solid; padding:10px;">nota3</th></tr>';



echo '<tr>';
echo ' <form action="./editar.php" method="post" enctype="multipart/form-data">';
foreach($raiz->childNodes as $alumnos){
    if($alumnos->nodeType==1){
        foreach($alumnos->childNodes as $notas){
            if( $_REQUEST['name']== $notas->nodeValue){
            if($notas->nodeType ==1 ){
                echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="name" readonly value='. $notas->nodeValue . '></td>';
                echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="nota1" value='. $notas->nextElementSibling->nodeValue. '></td>';
                echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="nota2" value='. $notas->nextElementSibling->nextElementSibling->nodeValue. '></td>';
                echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="nota3" value=' . $notas->nextElementSibling->nextElementSibling->nextElementSibling->nodeValue. '></td>';

               /* $notas->nextElementSibling->nodeValue=$_REQUEST['nota1'];
                $notas->nextElementSibling->nextElementSibling->nodeValue=$_REQUEST['nota2'];
                $notas->nextElementSibling->nextElementSibling->nextElementSibling->nodeValue=$_REQUEST['nota3'];*/
            }
        
        }
    }
}

}
echo '<td style="border: #000 1px solid; padding:10px;"><input type="submit" value="guardar"  name="guardar"></td>';
echo '</tr>';
echo '</form>';






?>

?>