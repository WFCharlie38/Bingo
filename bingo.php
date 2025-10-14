<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <div name="j1" id="j1" class="carton">
        <h2>Jugador 1</h2>
        <?php
        rellenar($carton1);
        mostrarCartonHTML($carton1);
        echo "<br>";
        rellenar($carton2);
        mostrarCartonHTML($carton2);
        echo "<br>";
        rellenar($carton3);
        mostrarCartonHTML($carton3);
        ?>
    </div>
        <div name="j2" id="j2" class="carton">
            <h2>Jugador 2</h2>
        <?php
        rellenar($carton4);
        mostrarCartonHTML($carton4);
        echo "<br>";
        rellenar($carton5);
        mostrarCartonHTML($carton5);
        echo "<br>";
        rellenar($carton6);
        mostrarCartonHTML($carton6);
        ?>
    </div>
        <div name="j3" id="j3" class="carton">
            <h2>Jugador 3</h2>
        <?php
        rellenar($carton7);
        mostrarCartonHTML($carton7);
        echo "<br>";
        rellenar($carton8);
        mostrarCartonHTML($carton8);
        echo "<br>";
        rellenar($carton9);
        mostrarCartonHTML($carton9);
        ?>
    </div>
        <div name="j4" id="j4" class="carton">
            <h2>Jugador 4</h2>
        <?php
        rellenar($carton10);
        mostrarCartonHTML($carton10);
        echo "<br>";
        rellenar($carton11);
        mostrarCartonHTML($carton11);
        echo "<br>";
        rellenar($carton12);
        mostrarCartonHTML($carton12);
        ?>
    </div>

</body>
</html>


<?php
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Parte de Martin

    $carton1=[];
    $carton2=[];
    $carton3=[];
    $carton4=[];
    $carton5=[];
    $carton6=[];
    $carton7=[];
    $carton8=[];
    $carton9=[];
    $carton10=[];
    $carton11=[];
    $carton12=[];
    
    function rellenar(&$carton){
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 7; $j++) { 
                //Creo un número aleatorio del 1 al 60 y luego llamo a la función comprobar, que se asegura que no hayan números repetidos en el array 
                $carton[$i][$j]=rand(1,60);
                if($i>0 || $j>0){
                    comprobar($carton[$i][$j],$carton,$i,$j);
                }
            }
        }
        borrarAleatorio($carton);
    }

    function comprobar($num,&$carton,$a,$b){
    //Variable que se encarga de que se siga comprobando hasta que no se encuentre número repetido
    $cuidado=false;
    while(!$cuidado){
        //Contador que sube si encuentra un número repetido
        $cont=0;
        for ($i=0; $i <= $a; $i++) { 
            for ($j=0; $j < $b; $j++) {
                if($num==$carton[$i][$j]){
                    //En caso de que se encuentre número repetido, se crea un número nuevo y se hará la comprobación nuevamente
                    $carton[$a][$b]=rand(1,60);
                    $num = $carton[$a][$b];
                    $cont++;
                    }
                }
            }
            //Solo se parará el bucle cuando el contador se mantenga en 0
            if($cont==0){
                $cuidado=true;
            }       
        }
    }
    
    //Función para borrar dos elementos de cada fila de la matriz
    function borrarAleatorio(&$carton){
        //For para recorrer todas las filas del array
        for($i=0; $i < 3; $i++){
        //Creo dos números aleatorios y con el while me aseguro de que no sean repetidos
        $num1=rand(0,6);
        $num2=rand(0,6);
        while($num1==$num2){
            $num2=rand(0,6);
        }
        //Pongo en null los elementos, así el array sigue manteniendo su longitud pero ya no tienen sus valores
        $carton[$i][$num1]=null;
        $carton[$i][$num2]=null;
     }
    }

    //Funcion para marcar encontrar numero en los cartones
    function encontarNumero(&$carton, &$bolas, $bola){
        if ($bolas[$bola-1]==false) {
            $bolas[$bola-1] = true;
        }
        for ($i=0; $i < 3; $i++) { 
            for ($j=0; $j < 7 ; $j++) { 
                if ($carton[$i][$j]==$bola) {
                    $carton[$i][$j] = 0;
                }
            }
        }
    }
   function mostrarCartonHTML(&$carton)
{
    echo "<table>";

    for ($i = 0; $i < 3; $i++) {
        echo "<tr>"; // fila
        for ($j = 0; $j < 7; $j++) {
            $valor = $carton[$i][$j];
            // Si quieres, puedes mostrar vacío si es 0 o null
            $contenido = ($valor === 0 || $valor === null) ? "&nbsp;" : $valor;
            if ($valor===0) {
                $contenido = 0;
                $color= "background-color: #8BC34A;";
            }else{
                $contenido = $valor;
                $color = "";
            }
            echo "<td style='width:40px; height:40px; text-align:center; $color'>$contenido</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
}




    //  PARTE DE EMILIO

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$bolas = array_fill(0, 60,false);

$bola = tambor($bolas);

function tambor(&$bolas) {

    //Selecciona una posicion aleatoria del array bolas para sacar la bola a continuación.
    do {
        $posicionBola = rand(0,59);
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
    echo '<img src="' . $rutaImagen . '" alt="Bola" />';

}

function mostrarBolas() {
    $contador=1;

    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    for ($i = 0; $i < 4; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 15; $j++) {
            echo "<td style='text-align:center;'>";
            echo "<img src='./images/$contador.png' width='50' height='50'>";
            echo "</td>";
            $contador++;
        }
        echo "</tr>";
    }


    echo "</table>";

}

?>

