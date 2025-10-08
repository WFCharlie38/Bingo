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