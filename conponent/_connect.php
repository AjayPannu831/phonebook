<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "phonebook";

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("Could not connect to the databse");
}
?>