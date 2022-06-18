<?php 

//$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
$con = new mysqli('localhost','root','','testing')or die("Could not connect to mysql".mysqli_error($con));
?>