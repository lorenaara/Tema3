<?php
    require '../seguro/conexion.php';
    $contador=0;
    if(isset($_REQUEST['guardar'])){
        try{
            $conexion = new PDO('mysql:host=' . HOST . ';dbname=' . BBDD, USER, PASS);
            $sql='update paciente set nombre= ?, nacimiento=?, peso=?  where id=?'; 
            $preparada= $conexion->prepare($sql);
            $peso = floatval($_REQUEST['paciente3']);
            $id = (int)$_REQUEST['name'];
            $nombre= $_REQUEST['paciente1'];
            $nacimiento=$_REQUEST['paciente2'];
            $preparada->bindParam(1, $nombre);
            $preparada->bindParam(2, $nacimiento);
            $preparada->bindParam(3, $peso);
            $preparada->bindParam(4, $id);
            $preparada->execute();
            header('Location: ../leer.php');
            exit;
        }catch (Exception $ex) {
            echo 'error';
            print_r($ex);
        }finally{
        unset($conexion); 
    }
}

    try{
        $conexion = new PDO('mysql:host=' . HOST . ';dbname=' . BBDD, USER, PASS);
        $sql = 'select * from paciente where id = :id';
        $preparada=$conexion->prepare($sql);
        $array= array(':id'=>$_REQUEST['name']);
        $preparada->execute($array);
        echo '<table style="border:1px solid black; border-collapse:collapse"><thead><tr><th >Hospital</th><tr><th style="border:1px solid black;padding:10px" >id</th><th style="border:1px solid black;padding:10px">nombre</th><th style="border:1px solid black;padding:10px">nacimiento</th><th style="border:1px solid black;padding:10px">peso</th></thead><form action="./modificar.php" method="post"> ';
        while($row= $preparada->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';       
            foreach ($row as $key => $value) {
                if($key== 'id'){
                    echo '<td style="border: #000 1px solid; text-align:center;"><input type="text" name="name" readonly value='. $row['id']. '>';
                     
                    echo '</td>'; 
                }else{
                    $contador++;
                    echo '<td style="border: #000 1px solid; text-align:center;">';
                    echo '<input type="text" name="paciente'.$contador.'" value="'. $value. '">';
                    echo '</td>';
                }
            }
            echo '<td style="border: #000 1px solid; padding:10px;"><input type="submit" name="guardar" value="Guardar"></td>';
            echo '</tr>';
        }
        echo '</form></table>';
    }catch(Exception $ex) {
        echo 'error';
    print_r($ex);
    }finally{
    unset($conexion); //Se cierra la conexion
    }
 
