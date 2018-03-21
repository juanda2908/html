<?php
// Conectando, seleccionando la base de datos

$host = "designdatabase.cg6tv9ndrugo.us-west-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123456";
$database = "designdatabase";

$datetime_start = $_POST['date_time_start'];
$datetime_end = $_POST['date_time_end'];

// conecta al servidor con user, contraseña
$conn = new mysqli($host,$username,$password,$database); 

// Realizar una consulta MySQL
// ultimo valor de la tabla llamada datos
$query = "SELECT * FROM designdatabase.position_data WHERE datetime BETWEEN '$datetime_start' AND '$date_time_end' ORDER BY id"; 
//$query = "SELECT * FROM designdatabase.position_data ORDER BY id DESC LIMIT 1"; 

// guardo en resultado lo que saqué de query
//$resultado = mysqli_query($conn, $query) or die("Consulta fallida: " . mysqli_error()); 

//if($resultado){

  //  while ($fila = mysqli_fetch_row($resultado)) {
    //    printf ("%s (%s)\n", $fila[0], $fila[1]);
    //}
    
    //mysqli_free_result($resultado);
//}

// guardo en un array lo que está en resultado, como string
//$fila = mysqli_fetch_row($resultado); 
//$var = $fila[0];//$fila[1]."\n".$fila[2]."\n".$fila[3]."\n".$fila[4]."\n".$fila[5]."\n";

// devuelve var
//echo $var;
//echo $resultado; 
//echo "\'".$fila."\'";
echo "'$datetime_start'"
//echo $_POST['date_time_end'];
mysqli_close($conn);
?>

