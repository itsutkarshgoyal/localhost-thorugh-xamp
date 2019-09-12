<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);

$id = $_POST['serial_no'];
$query = "Delete FROM website_bucket 
          WHERE serial_no='$id'";

        $result = mysqli_query($conn, $query)or die ( mysqli_error($conn));
        if($result){
        echo"succesfully stored in databse<br>";die;
       // header("location: \star\index.php");
}
   ?>