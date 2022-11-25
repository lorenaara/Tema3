<?
function vacio($nombre){
    if(empty($_REQUEST[$nombre])){
        return true;
    }
    return false;
}
function enviado(){
    if(isset($_REQUEST['Enviado'])){
        return true;
    }
    return false;
}

function existe($nombre){
    if(isset($_REQUEST[$nombre]))
    return true;
return false;
}

function nombre($nombre){
    $patron= '/\D{3,}\s\D{3,}\s\D{3,}/';
    if(preg_match($patron, $_REQUEST[$nombre])==1){
        return true;
    }
    return false;
}

function expediente($expediente){
    $patron= '/[0-9]{2}[A-Z]{3}\/[0-9]{2}/';
    if(preg_match($patron, $_REQUEST[$expediente])==1){
        return true;
    }
    return false;
}


function validarForm($nombre, $expediente){
    if(enviado()){
        if(!vacio('nombre') && !vacio('exp') && existe('curso')){

          header('Location: ./mostrar.php?nombre='.$nombre .'&expediente='.$expediente.'&curso=' .$_REQUEST['curso']);
            exit;
}

        }
    }


?>