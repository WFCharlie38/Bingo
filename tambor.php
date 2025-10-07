<?php

$bolas = array();

$bola = tambor($bolas);

function tambor(&$bolas) {
    
    //Genera una bola que no se encuentre en el array de bolas.
    do {
        $bola = rand(1,60);
    } while (in_array($bola,$bolas));
    
    //Asigna la bola al array bolas al final de este.
    $bolas[] = $bola;

    //Devuelve el valor de la bola para ser utilizado en los cartones.
    return $bola;
}

function mostrarBola() {

    
}


?>