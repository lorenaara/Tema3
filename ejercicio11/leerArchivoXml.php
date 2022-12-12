<?
$dom= new DOMDocument();
//cargar fichero
$dom->load('notasAlumnos.xml');
echo '<table style="border: #000 1px solid; border-collapse: collapse; ">';
echo '<tr><th style="border: #000 1px solid; padding:10px;">Alumno</th>';
echo '<th style="border: #000 1px solid; padding:10px;">nota1</th>';
echo '<th style="border: #000 1px solid; padding:10px;">nota2</th>';
echo '<th style="border: #000 1px solid; padding:10px;">nota3</th></tr>';

$raiz=$dom->childNodes[0]; //notas
echo '<tr>';







foreach($raiz->childNodes as $alumnos){
    if($alumnos->nodeType==1){
        foreach($alumnos->childNodes as $notas){

            if($notas->nodeType ==1){
                if($notas->nodeName=='nombre'){
                    $nombre=$notas->nodeValue;
                }
                echo '<td style="border: #000 1px solid; text-align:center;">  '. $notas->nodeValue . '</td>';
            }
        }
      
        
        echo '<td style="border: #000 1px solid; padding:10px;"><a href="editar.php?name='.$notas->nodeValue.'">Editar</a></td>';
        echo '</tr>';  
        
    }
}

echo '</table>';

?>
