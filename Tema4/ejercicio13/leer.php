<?
    require './seguro/conexion.php';
    try{
        $conexion = new PDO('mysql:host=' . HOST . ';dbname=' . BBDD, USER, PASS);
        $sql = 'select * from paciente';
        $resultado=$conexion->query($sql);
        echo '<table style="border:1px solid black; border-collapse:collapse"><thead><tr><th >Hospital</th><tr><th style="border:1px solid black;padding:10px" >id</th><th style="border:1px solid black;padding:10px">nombre</th><th style="border:1px solid black;padding:10px">nacimiento</th><th style="border:1px solid black;padding:10px">peso</th></thead>';
        while($row= $resultado->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';       
            foreach ($row as $key => $value) {
                echo "<td  style='border:1px solid black; padding:10px'>". $value . '</td>';
            }
            
            echo '<td style="border:1px solid black; padding:10px"><a href="./modificar.php?name='.$row['id'].'">Modificar</a></td>';
            echo '<td style="border:1px solid black; padding:10px"><a href="./borrar.php?name='.$row['id'].'">Borrar</a></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<a href="./insertar.php">Insertar</a>';
    }catch(Exception $ex) {
        echo 'error';
    print_r($ex);
    }finally{
    unset($conexion); //Se cierra la conexion
    }
?>