<?php 
error_reporting(0);
$servername 	="localhost";
$username 		="root";
$password 		="";
$dbname 		="employee";

$conn = mysqli_connect($servername,$username,$password,$dbname);
/*if ($conn) 
{
	echo "Connected";
}
else {
	echo "Not Connected".mysqli_connect_error();
}*/

?>