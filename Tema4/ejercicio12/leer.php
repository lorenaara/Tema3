<?
require './seguro/conexion.php';
//Leer base de datos

try{
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS, 'hospital');
    $sql = 'select * from paciente';
    $resultado = mysqli_query($conexion, $sql);
    echo '<table style="border:1px solid black; border-collapse:collapse"><thead><tr><th >Hospital</th><tr><th style="border:1px solid black;padding:10px" >id</th><th style="border:1px solid black;padding:10px">nombre</th><th style="border:1px solid black;padding:10px">nacimiento</th><th style="border:1px solid black;padding:10px">peso</th></thead>';
    while($row= $resultado->fetch_assoc()){ 
        //Al ser un array de numeros y asociactivo la manera de coger solo uno de los dos valores o comparando a ver si es un numero o cogiendo solo el array asociativo
        echo '<tr>';
        foreach ($row as $key => $value) {
            echo "<td  style='border:1px solid black; padding:10px'>". $value . '</td>';
        }
        
        echo '<td style="border:1px solid black; padding:10px"><a href="./modificar.php">Modificar</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<a href="./insertar.php">Insertar</a>';
}catch(Exception $ex){
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

?>