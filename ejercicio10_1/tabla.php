<?
if ($fp = fopen('notas.csv', 'r')) {
    echo '<table style="border: #000 1px solid; border-collapse: collapse; ">';
    echo '<th style="border: #000 1px solid;">Alumno</th>';
    echo '<th style="border: #000 1px solid;">nota1</th>';
    echo '<th style="border: #000 1px solid;">nota2</th>';
    echo '<th style="border: #000 1px solid;">nota3</th>';
    $leido = fgetcsv($fp, filesize('notas.csv'), ';');
    //leer hasta que se acabe el fichero 
    while(filesize('notas.csv')){
        foreach ($leido as $key => $value) {
            echo '<td>' + $value + '</td>';
        }
    /*for ($i = 0; $i <= count($leido); $i++) {
        echo '<td>' + $i + '</td>';
    }*/
}
}

?>