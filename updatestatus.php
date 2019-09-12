<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);

$status= $_REQUEST["status"];
$id=$_REQUEST['id'];
$update="UPDATE website_creation SET status='$status' 
where id='$id'";
$result5=mysqli_query($conn, $update);
if (mysqli_query($conn, $update)) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>