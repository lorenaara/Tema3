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
function existe($nombre){
    if(isset($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function existeDoc($nombre){
    if(isset($_FILES[$nombre])){
        return true;
    }
    return false;
}
function fichero($fichero){
    $ubicacion= "/var/www/html/Tema3/ejercicio08/";
    $nombreTemporal= basename($_FILES[$fichero]['name']);
    $ubicacion = $ubicacion .$nombreTemporal;
    if(move_uploaded_file($_FILES[$fichero]['tmp_name'], $ubicacion)){
        echo "<span style='color:green'>el fichero se ha subido</span>";
    }else{
        echo "<span style='color:red'>Se ha producido un error</span>";
    }
}

function validarForm($nombre, $apellido, $fecha, $radio, $elegir, $check, $telefono, $email, $pass, $fichero){
    if(enviado()){
        if(vacio($nombre) || vacio($apellido) || vacio($fecha) || existe($radio) || existe($elegir) || existe($check) || vacio($telefono)|| vacio($email)|| vacio($pass)|| existeDoc($fichero)){
            print_r($_REQUEST);
        }
    }
}