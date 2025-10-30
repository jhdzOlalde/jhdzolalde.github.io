<?php
$canciones = simplexml_load_file("prueba1.xml");
foreach($canciones as $cancion)
{
echo "Titulo: " . $cancion->titulo; echo "<br>";
echo "Artista: " . $cancion->artista; echo "<br>";
echo "Genero: " . $cancion->genero; echo "<br>"; echo "<br>";
}

?>
