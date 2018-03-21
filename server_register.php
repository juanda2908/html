<?php
// Conectando, seleccionando la base de datos
$host = "designdatabase.cg6tv9ndrugo.us-west-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123456";
$database = "designdatabase";

// conecta al servidor con user, contraseña
$conn = new mysqli($host,$username,$password,$database); 

if (isset($_POST['date_time_start']))
{
    $datetime_start = $_POST['date_time_start'];
  	echo $datetime_start;
  	echo "\n";
}
else
{
  	//$datetime_start = null;
    //$datetime_start = "2000/1/1";
    echo "no fecha inicio\n";
}

if (isset($_POST['date_time_end']))
{
    $datetime_end = $_POST['date_time_end'];
  	echo $datetime_end;
  	echo "\n";
}
else
{
  	//$datetime_end= null;
    //$datetime_end = "2000/1/1";
 	echo "no fecha fin\n";
}

// Realizar una consulta MySQL
// ultimo valor de la tabla llamada datos
//$query = "SELECT * FROM designdatabase.position_data WHERE datetime BETWEEN '$datetime_start' AND '$datetime_end' ORDER BY id LIMIT 10"; 

// guardo en resultado lo que saqué de query
//$resultado = mysqli_query($conn, $query) or die("Consulta fallida: " . mysqli_error()); 

//echo $resultado;
//var $output = ""; 

/*
if($resultado = mysqli_query($conn, $query)){
    
    for ($i=0;$i<$fila;$i++){
        mysqli_data_seek($resultado,$i);
        $row = mysqli_fetch_row($resultado);
        echo $row[2]," ",$row[3]," ",$row[1]," ",$row[4];
        echo "\n";
    }
    
}
else {
    echo "Error\n"; 
}

*/

mysqli_close($conn);
?>

