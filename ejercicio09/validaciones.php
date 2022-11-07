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
?>