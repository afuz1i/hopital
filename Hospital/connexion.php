<?php 
// conexion a la base de donnee

$con = mysqli_connect("localhost","root","","hopital" );
if(!$con){
    echo "vous n'etes pas connecté à la base de donnée ";
}

?>

