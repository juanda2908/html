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
//$query = "SELECT * FROM designdatabase.position_data WHERE datetime BETWEEN ".$_GET['date_time_start']." AND ".$_GET['date_time_end']." ORDER BY id"; 

// guardo en resultado lo que saqué de query
//$resultado = mysqli_query($conn, $query) or die("Consulta fallida: " . mysqli_error()); 

// guardo en un array lo que está en resultado, como string
//$fila = mysqli_fetch_row($resultado); 
//$var = $fila[0];//$fila[1]."\n".$fila[2]."\n".$fila[3]."\n".$fila[4]."\n".$fila[5]."\n";

// devuelve var
//echo $var;
//echo $resultado; 
echo $_POST['date_time_end'];
mysqli_close($conn);

?>

