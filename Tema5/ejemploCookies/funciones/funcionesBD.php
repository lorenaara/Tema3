<?
    require './seguro/conexion.php';
//findAll Todos los productos
function findAll(){
    try{
        $con = new PDO('mysql:host='. HOST . ';dbname=' . BBDD, USER, PASS);
        $sql= 'select * from producto';
        $devuelve= $con->query($sql);
        $array=$devuelve->fetchAll(PDO::FETCH_ASSOC);
        unset($con);
        return $array;
    }catch (Exception $ex) {
        print_r($ex);
        unset($conexion); 
        return false;
    }
}

//findById Que devuelva uno para el ver
function findById($id){
    try{
        $con = new PDO('mysql:host='. HOST . ';dbname=' . BBDD, USER, PASS);
        $sql= 'select * from producto where codigo=?';
        $preparada= $con->prepare($sql);
        $devuelve= $preparada->execute(array($id));
        if($devuelve){
            unset($con);
            $devuelve->fetchAll();
            
        }
        unset($con);
    }catch (Exception $ex) {
        print_r($ex);
        unset($conexion); 
        return false;
    }
}

