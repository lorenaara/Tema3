<?

if ($fp = fopen('notas.csv', 'r')) {
    echo '<table style="border: #000 1px solid; border-collapse: collapse; ">';
    echo '<tr><th style="border: #000 1px solid; padding:10px;">Alumno</th>';
    echo '<th style="border: #000 1px solid; padding:10px;">nota1</th>';
    echo '<th style="border: #000 1px solid; padding:10px;">nota2</th>';
    echo '<th style="border: #000 1px solid; padding:10px;">nota3</th></tr>';
    //leer hasta que se acabe el fichero 
    while( $leido = fgetcsv($fp, filesize('notas.csv'), ';')){
       
        echo '<tr>';
             for($i=0; $i< count($leido); $i++){
                echo '<td style="border: #000 1px solid; text-align:center;">';
                echo $leido[$i] ;
                echo '</td>';
            }
            echo '<td style="border: #000 1px solid; padding:10px;"><a href="editar.php?name='.$leido[0].'">Editar</a></td>';
             echo '</tr>';      
        }
        echo '</table>';
        fclose($fp);
   
}
?>