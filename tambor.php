<?php

$bolas = array_fill(0, 60,false);

$bola = tambor($bolas);

function tambor(&$bolas) {

    //Selecciona una posicion aleatoria del array bolas para sacar la bola a continuación.
    do {
        $posicionBola = rand(0,60);
    } while ($bolas[$posicionBola] == true);
    //True = bola ha salido.
    //False = bola no ha salido.

    //Adquirimos la bola.
    $bola = $posicionBola+1;
    
    //Establecemos la posicion en true.
    $bolas[$posicionBola] = true;

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