<?
require('./seguro/conexion.php');

//conexion
    try {
    $conexion = new PDO('mysql:host=' . HOST . ';dbname=' . BBDD, USER, PASS);
    echo 'conexion correcta';
    //echo $conexion->getAttribute(PDO::ATTR_SERVER_INFO); //toda la informacion del servidor al que se esta conectando
    //echo $conexion->getAttribute(PDO::ATTR_SERVER_VERSION); //version de donde tenemos la bdd

    //consulta a la bdd

    $sql = 'select * from equipo';
    $resultado=$conexion->query($sql); //query solo para el select y exc para el resto de consultas
    echo "<br>Numero Equipos:" . $resultado->rowCount();
    while($row= $resultado->fetch(PDO::FETCH_BOTH)){
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }

    //insertar
    /*$sql = 'insert into equipo values (5,"Brasil")';
    $numero = $conexion->exec($sql);
    echo "<br>Se ha insertado ".$numero;*/

    //CONSULTA PREPARADA
    //$sql = 'insert into equipo values (?,?)';
   // $preparada=$conexion->prepare($sql);
    /*$id = 4;
    $nombre = 'Argentina';
    $preparada->bindParam(1, $id);
    $preparada->bindParam(2, $nombre);
    $preparada->execute();*/
    //$array = array(3, 'china');
    //$preparada->execute($array);
    
    /*Insertar mediante un array asociativo
    $sql = 'insert into equipo values (:id,:nombre)';
    $preparada=$conexion->prepare($sql);
    $array = array(":id" => 6, ":nombre" => "Japon");
    $preparada->execute($array);*/


    $sql = 'select * from equipo where id= :id';
    $preparada=$conexion->prepare($sql);
    $array = array(":id" => 1);
    $preparada->execute($array);
    $preparada->bindColumn(1, $id);
    $preparada->bindColumn(2, $nombre);
    while($row=$preparada->fetch(PDO::FETCH_BOUND)){
        echo "<br> " . $id . ":" . $nombre;
    }



    } catch (Exception $ex) {
        echo 'error';
    print_r($ex);
    }finally{
    unset($conexion); //Se cierra la conexion
    }
?>