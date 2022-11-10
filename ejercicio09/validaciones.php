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
    $patron='/[0-9]{4}\/[0-9]{2}\/[0-9]{2}/';
    if(preg_match($patron, $_REQUEST[$fecha])==1){
        //calcular edad
      return true;
        
        
    }
    return false;
}
function mayorEdad($fecha){
    $fechaHoy= date("Y-m-d");
    $edad= date_diff(date_create($_REQUEST['fecha']), date_create($fechaHoy));
    if($edad->y>=18){
        return true;
    }else{
       return false;
    }
}
function dni($dni){
    $patron = '/[0-9]{8}[a-zA-Z]{1}/';
    if(preg_match($patron, $_REQUEST[$dni])==1){
        return true;
    }
    return false;
}
function letraDni($dni){
    $letra=strtoupper(substr($_REQUEST['dni'], -1));
    $numero= (int) substr($_REQUEST['dni'], 0, -1);
    $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
    if(substr($palabro, $numero%23, 1)==$letra){
        return true;
    }else{
        return false;
    }
}
function correo($correo){
    $patron='/^[a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3}/';
    if(preg_match($patron, $_REQUEST[$correo])==1){
        return true;
    }
    return false;
}
?>