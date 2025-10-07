<HTML>
<HEAD><TITLE>CARTONES</TITLE></HEAD>
<BODY><?php
    $carton1=[];
    $carton2=[];
    $carton3=[];


    rellenar($carton1);
    print_r($carton1);
    function rellenar(&$carton){
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 7; $j++) { 
                $carton[$i][$j]=rand(1,60);
                if($i>0 || $j>0){
                    comprobar($carton[$i][$j],$carton,$i,$j);
                }
            }
        }
    }

    function comprobar($num,&$carton,$a,$b){
    $cuidado=false;
    while(!$cuidado){
        $cont=0;
        for ($i=0; $i <= $a; $i++) { 
            for ($j=0; $j < $b; $j++) {
                if($num==$carton[$i][$j]){
                    $carton[$a][$b]=rand(1,60);
                    $num = $carton[$a][$b];
                    $cont++;
                    }
                }
            }
            if($cont==0){
                $cuidado=true;
            }       
        }
    }
?>
</BODY>
</HTML>
