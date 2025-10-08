<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

<?php
    function numero($num){
        print($num);
    }

    function carton(){
        for ($i = 1; $i <= 4; $i++) {
            echo '<div name="j'.$i.'" id="j'.$i.'" class="carton">';
            // aquí incluyes tu HTML o una función que genere las tablas
            include 'carton_template.php';
            echo '</div>';
        }
    }




?>

<br><br>
    
<!-- 
    <div name="j1" id="j1" class="carton">
        <table>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
            <tr>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
                <td><?php numero(1) ?></td>
            </tr>
        </table>

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


    rellenar(&$carton1);
    mostrarCartonHTML($carton1);
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

   function mostrarCartonHTML(&$carton)
{
    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    for ($i = 0; $i < 3; $i++) {
        echo "<tr>"; // fila
        for ($j = 0; $j < 7; $j++) {
            $valor = $carton[$i][$j];
            // Si quieres, puedes mostrar vacío si es 0 o null
            $contenido = ($valor === 0 || $valor === null) ? "&nbsp;" : $valor;
            echo "<td style='text-align:center;'>$contenido</td>";
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

