<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);

$id = $_POST['product_id'];
$username = $_POST['user_name'];
$value = "1";

$query = "INSERT into website_bucket(product_id,user_name,value) 
          VALUES('$id','$username','$value')";

        $result = mysqli_query($conn, $query)or die ( mysqli_error($conn));
        if($result){
        echo"succesfully stored in databse<br>";
        header("location: \star\index.php");
}
   ?>