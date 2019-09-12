<?php
//srequire('sql_connect.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = new mysqli($servername, $username, $password,$dbname);
$id=$_REQUEST['we1'];
$query3 = "DELETE FROM website_creation WHERE id=$id"; 
$result2 = mysqli_query($conn,$query3) or die ( mysqli_error());
header("Location: \star\website_showuser.php"); 
?>