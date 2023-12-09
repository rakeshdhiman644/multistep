<?php 
$servername = 'localhost';
$username = 'techi_testingdb';
$password = 'developer@123@';
$dbname = "techi_tesingdb";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
	die('Could not Connect My Sql:' . mysqli_error());
}
?>