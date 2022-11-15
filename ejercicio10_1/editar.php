<?
if(isset($_REQUEST['guardar'])){
    $escribir="";
    if($fp=fopen('notas.csv', 'r')){
       //lee por linea si la linea contiene nombre 
       while($lea = fgets($fp, filesize('notas.csv'))){
        // echo "<br>";
        // echo $lea;
        $pos= strpos($lea, $_REQUEST['name']);
        if($pos==false){
            $escribir = $lea;
        }else{
            $escribir = $_REQUEST['name'] + $_REQUEST['notas'];
            if($fp=fopen('notas.csv', 'a')){
                fwrite($fp, $escribir, strlen($escribir));
                fclose($fp);
                header('Location:./tabla.php');
                exit;
            }
        }
       }
       

       //si la linea no contiene nombre esribir+=

       //si coincide la cambio 
        $leido = fread($fp, filesize('notas.csv')); 
        fclose($fp);
        
    }


//abrir fichero en modo escritura 'a'
//escribir el string 
   // header('Location:./tabla.php');
        //exit;

}
if ($fp = fopen('notas.csv', 'r')) {
    echo '<table style="border: #000 1px solid; border-collapse: collapse; ">';
    echo '<tr><th style="border: #000 1px solid; padding:10px;">Alumno</th>';
    echo '<th style="border: #000 1px solid; padding:10px;">nota1</th>';
    echo '<th style="border: #000 1px solid; padding:10px;">nota2</th>';
    echo '<th style="border: #000 1px solid; padding:10px;">nota3</th></tr>';
    //leer hasta que se acabe el fichero 
    while($leido = fgetcsv($fp, filesize('notas.csv'), ';')){
        
        echo '<tr>';
             echo ' <form action="./editar.php" method="post" enctype="multipart/form-data">';
             if($leido[0]==$_REQUEST['name']){
             for($i=0; $i< count($leido); $i++){
                 if($i==0){
                     echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="notas" readonly value='. $leido[0]. '>';
                     
                     echo '</td>';
                    }else{
                        echo '<td style="border: #000 1px solid; text-align:center;">';
                    echo '<input type="text" name="notas" value='. $leido[$i]. '>';
                    //echo $leido[$i] ;
                    echo '</td>';
                }
            }
        
            echo '<td style="border: #000 1px solid; padding:10px;"><input type="submit" name="guardar" value="Guardar"></td>';
            echo '</tr>';
        }
    }
        echo '</form></table>';
    }
///djashdkjahsfl

?>