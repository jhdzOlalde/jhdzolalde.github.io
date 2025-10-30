<?php
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');


//Ordenar por letras o por numero
   sort($meses); 
   rsort($meses);
?>
<!DOCTYPE HTML>
<HTml>
<head>
    <meta charset="UTF-8">
    <title>
        Meses del año
    </title> 

</head>
<body>
    <h1>MESES DEL AÑO </h1>
    <ul>
            <?php
            foreach($meses as $mes){
                echo '<li>' . $mes. '</li>';
            }
            ?>
    </ul>
</body>

</HTml>