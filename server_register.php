<?php
// Conectando, seleccionando la base de datos

$host = "designdatabase.cg6tv9ndrugo.us-west-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123456";
$database = "designdatabase";

// conecta al servidor con user, contraseña
$conn = new mysqli($host,$username,$password,$database); 

// Realizar una consulta MySQL
// ultimo valor de la tabla llamada datos
$query = sprintf("SELECT * FROM designdatabase.position_data WHERE datetime BETWEEN %s 
    AND %s ORDER BY id", $_POST['date_time_start'], $_POST['date_time_end']); 

// guardo en resultado lo que saqué de query
$resultado = mysqli_query($conn, $query) or die("Consulta fallida: " . mysqli_error()); 

// guardo en un array lo que está en resultado, como string
$fila = mysqli_fetch_row($resultado); 
//$var = $fila[1]."\n".$fila[2]."\n".$fila[3]."\n".$fila[4]."\n".$fila[5]."\n";

// devuelve var
echo $var;
mysqli_close($conn);

?>

