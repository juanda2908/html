<?php
// Conectando, seleccionando la base de datos
$host = "designdatabase.cg6tv9ndrugo.us-west-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123456";
$database = "designdatabase";

if (isset($_POST['date_time_start']))
{
    $datetime_start = $_POST['date_time_start'];
  	//echo $datetime_start;
  	//echo "\n";
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
  	//echo $datetime_end;
  	//echo "\n";
}
else
{
  	//$datetime_end= null;
    //$datetime_end = "2000/1/1";
 	echo "no fecha fin\n";
}

// conecta al servidor con user, contraseña
$conn = new mysqli($host,$username,$password,$database); 

// Realizar una consulta MySQL
// ultimo valor de la tabla llamada datos
$query = "SELECT * FROM designdatabase.position_data WHERE datetime BETWEEN '$datetime_start' AND '$datetime_end' ORDER BY id"; 
//$query = "SELECT * FROM designdatabase.position_data ORDER BY id DESC LIMIT 1"; 

// guardo en resultado lo que saqué de query
//$resultado = mysqli_query($conn, $query) or die("Consulta fallida: " . mysqli_error()); 

var $output = ""; 

if($resultado = mysqli_query($conn, $query)){

    $fila = mysqli_num_rows($resultado);
    echo $fila; 
    //echo $resultado; 
    //while ($fila = mysqli_fetch_row($resultado)) {
        //printf ("%s (%s)\n", $fila[0], $fila[1]);

        //echo $fila; 
        //$output .= $fila[0]." ".$fila[1]." ".$fila[2]." ".$fila[3]." ".$fila[4]." ".$fila[5]."\n";
    //}
    //mysqli_free_result($resultado);
}

// guardo en un array lo que está en resultado, como string
//$fila = mysqli_fetch_row($resultado); 

//echo $output; 

// devuelve var
//echo $var;
//echo $query;
mysqli_close($conn);
?>

