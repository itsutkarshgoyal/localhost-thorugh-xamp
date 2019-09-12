<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);

$id = $_POST['id'];
$value = $_POST['value'];

$query = "UPDATE website_bucket SET value='$value' where serial_no='$id'";

        $result = mysqli_query($conn, $query)or die ( mysqli_error($conn));
        if($result){
        echo"succesfully stored in databse<br>";
        header("location: \star\index.php");
}
   ?>