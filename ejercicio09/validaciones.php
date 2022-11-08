<?php
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function enviado(){
    if(isset($_REQUEST['enviar'])){
        return true;
    }
    return false;
}
function nombre($nombre){
    $patron= '/\D{3,}/';
    if(preg_match($patron, $_REQUEST[$nombre])==1){
        return true;
    }
    return false;
}
function apellido($apellido){
    $patron= '/\D{3,}\s\D{3,}/';
    if(preg_match($patron, $_REQUEST[$apellido])==1){
        return true;
    }
    return false;
}
function fecha($fecha){
    $patron= '/[0-9]{2}\/[0-9]{2}\/[0,9]{4}/';
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        return true;
        //calcular edad
        $fechaHoy= date("Y-m-d");
        $edad= date_diff(date_create($fecha), date_create($fechaHoy));
        if($edad>=18){
            echo "Eres mayor de edad";
        }else{
            echo "Eres menor de edad";
        }
        
    }
    return false;
}
?>