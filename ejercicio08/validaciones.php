<?php
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function self(){
    echo basename(__FILE__);
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

        if(vacio($nombre) || vacio($apellido) || vacio($fecha) || existe('radio') || existe($elegir) || existe('check') || vacio($telefono)|| vacio($email)|| vacio($pass)|| existeDoc('documento')){
            //print_r($_REQUEST);
            //pintar los campos opcionales que no esten vacios
            echo '<span><strong>El nombre es: </strong></span>'.$nombre;
            if(!vacio('alfaOpcional')){
                echo "<br><span><strong>EL nombre opcional es: </strong></span>".$_REQUEST['alfaOpcional'];
            }
            echo '<br><span><strong>El apellido es: </strong></span>'. $apellido;
            if(!vacio('numeOpcional')){
                echo '<br><span><strong>EL apellido opcional es: </strong></span>' . $_REQUEST['numeOpcional'];
            }
            echo '<br><span><strong>La fecha selecionada es: </strong></span>'. $fecha;
            if(!vacio('fechaOpcional')){
                echo '<br><span><strong>La fecha opcional selecciona es: </strong></span>'. $_REQUEST['fechaOpcional'];
            }
            echo '<br><span><strong>El radio seleccionado es: </strong></span>' .$_REQUEST['radio'] ;
            echo '<br><span><strong>La opci??n elegida es: </strong></span>'. $elegir ;
            foreach ($_REQUEST['check'] as $key => $value) {
                echo  '<br><span><strong>El check elegido es: </strong></span>'. $value;
            }
            echo '<br><span><strong>El tel??fono es: </strong></span>'. $telefono;
            echo '<br><span><strong>El correo es: </strong></span>' . $email;
            echo '<br><span><strong>La contrase??a es: </strong></span>'. $pass;
            echo '<br><span><strong>El fichero selecionado es: </strong></span>'. $_FILES['documento']['name'];
      
            return true;
        }
    }
}