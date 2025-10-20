<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num_jugadores = limpiar_campos($_POST["num_jugadores"]);
        $num_cartones = limpiar_campos($_POST["num_cartones"]);
    }
    $aJugadores=[];

    crear($num_jugadores, $num_cartones, $aJugadores);

    $carton1=[]; $carton2=[]; $carton3=[];
    $carton4=[]; $carton5=[]; $carton6=[];
    $carton7=[]; $carton8=[]; $carton9=[];
    $carton10=[]; $carton11=[]; $carton12=[];

    $bolas = array_fill(0, 60,false);

    $mientrasganador = false;

    $jugadorGanador = 0; 
    $cartonGanador = 0;

    rellenar($carton1);
    rellenar($carton2);
    rellenar($carton3);
    rellenar($carton4);
    rellenar($carton5);
    rellenar($carton6);
    rellenar($carton7);
    rellenar($carton8);
    rellenar($carton9);
    rellenar($carton10);
    rellenar($carton11);
    rellenar($carton12);

    $jugador1 = [&$carton1, &$carton2, &$carton3];
    $jugador2 = [&$carton4, &$carton5, &$carton6];
    $jugador3 = [&$carton7, &$carton8, &$carton9];
    $jugador4 = [&$carton10, &$carton11, &$carton12];

    do {
        $bola = tambor($bolas);

        // Buscar la bola en todos los cartones
        encontarNumero($carton1,$bola);
        encontarNumero($carton2,$bola);
        encontarNumero($carton3,$bola);
        encontarNumero($carton4,$bola);
        encontarNumero($carton5,$bola);
        encontarNumero($carton6,$bola);
        encontarNumero($carton7,$bola);
        encontarNumero($carton8,$bola);
        encontarNumero($carton9,$bola);
        encontarNumero($carton10,$bola);
        encontarNumero($carton11,$bola);
        encontarNumero($carton12,$bola);

        // Comprobar ganador
        comprobarGanador($jugador1,"1",$mientrasganador,$jugadorGanador,$cartonGanador);
        comprobarGanador($jugador2,"2",$mientrasganador,$jugadorGanador,$cartonGanador);
        comprobarGanador($jugador3,"3",$mientrasganador,$jugadorGanador,$cartonGanador);
        comprobarGanador($jugador4,"4",$mientrasganador,$jugadorGanador,$cartonGanador);

    } while (!$mientrasganador);
    ?>
    <h1 id="titulo" >BINGO<h1>
        <div class="contenedor-jugadores">
            <div id="j1" class="carton">
                <h2>Jugador 1</h2>
                <?php
                mostrarCartonHTML($carton1);
                echo "<br>";
                mostrarCartonHTML($carton2);
                echo "<br>";
                mostrarCartonHTML($carton3);
                ?>
            </div>
            <div id="j2" class="carton">
                <h2>Jugador 2</h2>
                <?php
                mostrarCartonHTML($carton4);
                echo "<br>";
                mostrarCartonHTML($carton5);
                echo "<br>";
                mostrarCartonHTML($carton6);
                ?>
            </div>
            <div id="j3" class="carton">
                <h2>Jugador 3</h2>
                <?php
                mostrarCartonHTML($carton7);
                echo "<br>";
                mostrarCartonHTML($carton8);
                echo "<br>";
                mostrarCartonHTML($carton9);
                ?>
            </div>
            <div id="j4" class="carton">
                <h2>Jugador 4</h2>
                <?php
                mostrarCartonHTML($carton10);
                echo "<br>";
                mostrarCartonHTML($carton11);
                echo "<br>";
                mostrarCartonHTML($carton12);
                ?>
            </div>
        </div>
    <div class="ganador">
        <h2>GANADOR</h2>
        <?php
        echo "JUGADOR: $jugadorGanador</br>";
        echo "CARTON: $cartonGanador</br>";
        ?>
    </div>
</body>
</html>
<?php
    function limpiar_campos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function crear($numJugadores, $numCartones, &$aJugadores){

        for ($i = 1; $i <= $numJugadores; $i++) {
        ${"jugador$i"} = []; 
        $aJugadores[] = &${"jugador$i"}; 
         }


    for ($i = 1; $i <= $numJugadores; $i++) {
        for ($j = 1; $j <= $numCartones; $j++){	
        ${"carton$j"} = []; 
        ${"jugdor$i"}[] = &${"carton$j"};} 
             }
     }


    function rellenar(&$carton){
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 7; $j++) { 
                //Creo un número aleatorio del 1 al 60 y luego llamo a la función comprobar, que se asegura que no hayan números repetidos en el array 
                $num = rand(1, 60);
                if($i>0 || $j>0){
                    comprobar($num, $carton, $i, $j);
                }
                $carton[$i][$j] = ['num' => $num, 'salido' => false];
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
    function encontarNumero(&$carton, $bola) {
        for ($i = 0; $i < count($carton); $i++) {
            for ($j = 0; $j < count($carton[$i]); $j++) {
                if ($carton[$i][$j] !== null && $carton[$i][$j]['num'] == $bola) {
                    $carton[$i][$j]['salido'] = true;
                }
            }
        }
    }

  function mostrarCartonHTML(&$carton) {
    echo "<table>";

    for ($i = 0; $i < 3; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if ($carton[$i][$j] === null) {
                $contenido = "&nbsp;";
                $color = "";
            } else {
                $valor = $carton[$i][$j]['num'];
                $salido = $carton[$i][$j]['salido'];
                $color = $salido ? "background-color: #8BC34A;" : "";
                $contenido = $valor;
            }

            echo "<td style='width:40px; height:40px; text-align:center; $color'>$contenido</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    }

    function comprobarGanador($cartones, $jugador, &$mientrasganador, &$jugadorGanador, &$cartonGanador) {
        $cartonesPorJugador = 3; // 3 cartones por jugador
        $numCartones = count($cartones);

        for ($i = 0; $i < $numCartones; $i++) {
            $gana = true;

            // Recorre todas las posiciones del cartón
            for ($fila = 0; $fila < count($cartones[$i]); $fila++) {
                for ($col = 0; $col < count($cartones[$i][$fila]); $col++) {
                    $celda = $cartones[$i][$fila][$col];
                    if ($celda !== null && !$celda['salido']) {
                        $gana = false;
                    }
                }
            }

            // Si ha ganado, modificamos las variables $jugadorGanador y $cartonNumGanador
            if ($gana) {
                $jugadorGanador = $jugador;  // jugador 1–4
                $cartonGanador = ($i % $cartonesPorJugador) + 1;     // cartón 1–3 dentro del jugador
                $mientrasganador = true;
            }
        }

        return null;
    }

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
?>