<?

require './seguro/conexion.php';

//Conexion con funciones
try {
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'mundial');
    //Consultar la base de datos
    $sql = 'select * from equipo';
    $resultado = mysqli_query($conexion,$sql);
    echo "<br>All";
    //print_r($resultado->fetch_all());
    echo "<br>Array";
    while($row = $resultado->fetch_array())
       print_r($row);

    echo "<br>Objetivo";
    //while($row = $resultado->fetch_object())
            //print_r($row);

    mysqli_close($conexion);
} catch (Exception $ex) {
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

//Conexion con objetos
/*
try {
    $conexionO = new mysqli();
    $conexionO->connect($_SERVER['SERVER_ADDR'], 'USER', PASS,'mundial');
    $conexionO->close();
} catch (Exception $ex) {
    echo $conexionO->connect_errno;
    echo $conexionO->connect_error;
}*/


// consultas preparadas select
try {
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'mundial');
    //Consultar la base de datos
    $sql = 'select * from equipo where id = ? and nombre = ?';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada,$sql);
    $id = 1;
    $nombre = 'España';
    mysqli_stmt_bind_param($consulta_preparada,'is',$id,$nombre);
    mysqli_stmt_execute($consulta_preparada);

    mysqli_stmt_bind_result($consulta_preparada,$r_id,$r_nombre);
    while(mysqli_stmt_fetch($consulta_preparada)){
        echo "<br>Id: ".$r_id.",nombre: ".$r_nombre;
    }

    

    mysqli_close($conexion);
} catch (Exception $ex) {
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

// consultas preparadas insert
/*
try {
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'mundial');
    //Consultar la base de datos
    $sql = 'insert into equipo values(?,?)';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada,$sql);
    $id = 3;
    $nombre = 'Japon';
    mysqli_stmt_bind_param($consulta_preparada,'is',$id,$nombre);
    mysqli_stmt_execute($consulta_preparada);
    echo mysqli_stmt_num_rows($consulta_preparada);

    mysqli_close($conexion);
} catch (Exception $ex) {
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    echo $ex->getMessage();
}*/

// consultas preparadas insert
try {
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'mundial');
    //Consultar la base de datos
    $sql = 'update equipo set nombre = ? where nombre = \'China\' ';
    $consulta_preparada = mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada,$sql);
    $nombre = 'Japon';
    mysqli_stmt_bind_param($consulta_preparada,'s',$nombre);
    mysqli_stmt_execute($consulta_preparada);
    echo mysqli_stmt_affected_rows($consulta_preparada);

    mysqli_close($conexion);
} catch (Exception $ex) {
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    echo $ex->getMessage();
}


//Transacciones
// consultas preparadas 
try {
    $conexion = mysqli_connect($_SERVER['SERVER_ADDR'], USER, PASS,'mundial');
    //Insertar 3 equipos y el ultimo le ponemos mal el id
    mysqli_autocommit($conexion,false);
    $sql = 'insert into equipo values(4,\'Alemania\');';
    $sql1 = 'insert into equipo values(5,\'Rusia\');';
    $sql2 = 'insert into equipo values(5,\'Brasil\');';
    mysqli_query($conexion,$sql);
    mysqli_query($conexion,$sql1);
    //mysqli_query($conexion,$sql2);
    mysqli_commit($conexion);
} catch (Exception $ex) {
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
    echo $ex->getMessage();
    mysqli_rollback($conexion);
}finally{
    mysqli_close($conexion);
}