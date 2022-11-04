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

function validarForm($nombre, $apellido, $fecha, $elegir, $telefono, $email, $pass){
    if(enviado()){

        if(vacio($nombre) || vacio($apellido) || vacio($fecha) || existe('radio') || existe($elegir) || existe('check') || vacio($telefono)|| vacio($email)|| vacio($pass)|| existeDoc('fichero')){
            //print_r($_REQUEST);
            //pintar los campos opcionales que no esten vacios
            //foreach
            echo '<span><strong>El nombre es: </strong></span>'.$nombre. '<br><span><strong>El apellido es: </strong></span>'. $apellido . '<br><span><strong>La fecha selecionada es: </strong></span>'. $fecha . '<br><span><strong>El radio seleccionado es: </strong></span>' .$_REQUEST['radio'] . '<br><span><strong>La opción elegida es: </strong></span>'. $elegir . '<br><span><strong>El check elegido es: </strong></span>'. $_REQUEST['check']. '<br><span><strong>El teléfono es: </strong></span>'. $telefono. '<br><span><strong>El correo es';
            return true;
        }
    }
}