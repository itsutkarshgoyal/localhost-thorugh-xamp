<?php
//srequire('sql_connect.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$conn = new mysqli($servername, $username, $password,$dbname);
$id=$_REQUEST['we1'];
echo $id;die;
/*$query3 = "DELETE FROM website_product WHERE id=$id"; 
$result2 = mysqli_query($conn,$query3) ;
header("Location: \star\website_showproduct.php"); */
?>