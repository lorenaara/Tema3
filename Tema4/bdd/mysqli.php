<?
require '../seguro/conexion.php';
//conexion con funciones
try{

    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');

    //Consultas a la base de datos
    $sql= 'select * from equipo;';
    $resultado= mysqli_query($conexion, $sql);
   // $res= mysqli_fetch_all($resultado); //coge todos los resultados que han llegado pero no coge el nombre de la coumna
   // print_r($res);
   while($row = $resultado->fetch_array()){
   // print_r($row);
   }
    //print_r($resultado->fetch_object());
    mysqli_close($conexion);
}catch(Exception $ex){
    if($ex->getCode()==2002){
        echo 'Se ha producido un error en el host<br>';
    }
    if($ex->getCode()==1045){
        echo 'Se ha producido un error en el usuario<br>';
    }
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

//conexin con objetos
/*
try{

    $conexionO= new mysqli();
    $conexionO->connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');
    $conexionO->close();
}catch(Exception $ex){
    if($ex->getCode()==2002){
        echo 'Se ha producido un error en el host<br>';
    }
    if($ex->getCode()==1045){
        echo 'Se ha producido un error en el usuario<br>';
    }
    echo $conexionO->connect_errno; //numero de error
    echo $conexionO->connect_error; //mensaje de error
}*/



//consultas preparadas
try{

    $conexion= mysqli_connect($_SERVER['SERVER_ADDR'],USER,PASS, 'mundial');

    //Consultas a la base de datos
    $sql= 'select * from equipo where id=? and nombre=?;';
    $consulta_preparada=mysqli_stmt_init($conexion);
    mysqli_stmt_prepare($consulta_preparada, $sql);
    $id=1;
    $nombre='España';
    mysqli_stmt_bind_param($consulta_preparada, 'i',$id);
    mysqli_stmt_bind_param($consulta_preparada, 's',$nombre);
    mysqli_stmt_execute($consulta_preparada);
    mysqli_close($conexion);
}catch(Exception $ex){
    if($ex->getCode()==2002){
        echo 'Se ha producido un error en el host<br>';
    }
    if($ex->getCode()==1045){
        echo 'Se ha producido un error en el usuario<br>';
    }
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

?>