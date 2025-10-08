<?php

$bolas = range(1, 60);

$bola = tambor($bolas);

function tambor(&$bolas) {
    //Prueba commit
    //Genera una bola que no se encuentre en el array de bolas.
    //Selecciona una posicion aleatoria del array bolas para sacar la bola a continuación.
    $posicionBola = rand(0,count($bolas)-1);

    //Coge una bola del tambor.
    $bola = $bolas[$posicionBola];
    
    //Elimina la bola del array bolas.
    unset($bolas[$posicionBola]);

    //Reindexa el array.
    $bolas = array_values($bolas);

    //Devuelve el valor de la bola para ser utilizado en los cartones.
    return $bola;
}

function mostrarBola($bola) {

    //Establezco la ruta donde se encuentra  la imagen de la bola.
    $rutaImagen = './images/' . $bola . '.png';

    //Codigo html para indexar la imagen de la bola en el html.
    $html = '<div class="bola">';
    $html .= '<img src="' . $rutaImagen . '" alt="Bola" />';
    $html .= '</div>';

    return $html;

}

?>