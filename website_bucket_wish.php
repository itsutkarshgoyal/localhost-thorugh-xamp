<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);

$id1 = $_POST['id1'];
$value1 = $_POST['value1'];

$query = "UPDATE website_bucket SET wish='$value1' where serial_no='$id1'";

        $result = mysqli_query($conn, $query)or die ( mysqli_error($conn));
        if($result){
        echo"succesfully stored in databse<br>";
        header("location: \star\index.php");
}
   ?>