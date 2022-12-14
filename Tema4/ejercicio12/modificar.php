<?php
    require './seguro/conexion.php';
    $contador=0;
    if(isset($_REQUEST['guardar'])){
        //No se hace el modificar, no entra por aqui 
        try{
            $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS, 'hospital');
            $sql='update paciente set nombre='.$_REQUEST['paciente0']. ' nacimiento='. $_REQUEST['paciente1'] . 'peso='. $_REQUEST['paciente3'] .'where id='. $_REQUEST['name'] ;
            header('Location: ./leer.php');
            exit;
        }catch(Exception $ex){
            echo mysqli_connect_errno();
            echo mysqli_connect_error();
        }
        }



    try{
        $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS, 'hospital');
        $sql = 'select * from paciente where id ='.$_REQUEST['name'];
        $resultado= mysqli_query($conexion, $sql);
        echo '<table style="border:1px solid black; border-collapse:collapse"><thead><tr><th >Hospital</th><tr><th style="border:1px solid black;padding:10px" >id</th><th style="border:1px solid black;padding:10px">nombre</th><th style="border:1px solid black;padding:10px">nacimiento</th><th style="border:1px solid black;padding:10px">peso</th></thead>';
        while($row= $resultado->fetch_assoc()){
            echo '<tr>';       
            foreach ($row as $key => $value) {
                if($key== 'id'){
                    echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="name" readonly value='. $row['id']. '>';
                     
                    echo '</td>'; 
                }else{
                    $contador++;
                    echo '<td style="border: #000 1px solid; text-align:center;">';
                    echo '<input type="text" name="paciente'.$contador.'" value='. $value. '>';
                    echo '</td>';
                }
            }
            echo '<td style="border: #000 1px solid; padding:10px;"><input type="submit" name="guardar" value="Guardar"></td>';
            echo '</tr>';
        }
        echo '</table>';
    }catch(Exception $ex){
        echo mysqli_connect_errno();
        echo mysqli_connect_error();
    }

?>