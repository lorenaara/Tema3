<?
require './seguro/conexion.php';
function vacio($nombre)
{
    if (empty($_REQUEST[$nombre])) {
        return true;
    }
    return false;
}
function enviado()
{
    if (isset($_REQUEST['enviar']))
        return true;
    return false;
}
function nombre($nombre)
{
    if (strlen($nombre) <= 45) {
        return true;
    }
    return false;
}
//la fecha no tiene que estar validada ya que con date lo que se recibe es año/mes/dia

function insertar($nombre, $nacimiento, $peso){
    try{

        $conexion= new PDO('mysql:host='. HOST . ';dbname=' . BBDD, USER, PASS);
        $sql = 'insert into paciente values (id,?,?,?)';
        $preparada=$conexion->prepare($sql);
        $preparada->bindParam(1, $nombre);
        $preparada->bindParam(2, $nacimiento);
        $preparada->bindParam(3, $peso);
        $preparada->execute();
        header('Location: ./leer.php');
        exit;    
    }catch (Exception $ex) {
        echo 'error';
        print_r($ex);
    }finally{
        unset($conexion); 
    }
}
function validarForm(){
    if(enviado()){
        if(!vacio('nombre') && !vacio('nacimiento') && !vacio('peso')){
            insertar($_REQUEST['nombre'], $_REQUEST['nacimiento'], $_REQUEST['peso']);

        }
    }
}
