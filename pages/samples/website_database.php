<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password,$dbname);
//$msg=0;
//echo $_POST["pwd"];
//var_dump(isset($_POST["pwd"]));
if(isset($_POST["password1"]))
   {
        $username1=$_POST["username1"];
        $password1=$_POST["password1"];
        $email1=$_POST["email1"];
        $phone1=$_POST["phone1"];
        $addr1=$_POST["addr1"];
          if (!$conn)
            {
              die('Could not connect: ' . mysqli_error());
            }
              $sql="INSERT INTO website_creation (username,password,email,phone,address)
              VALUES
               ('$username1','$password1','$email1','$phone1','$addr1')";
                if ($conn->query($sql) === TRUE)
                 {
                     echo "New record created successfully<br><br><br><br>";
                     
                     header("Location:/star/pages/samples/login.php");
                    
                     //echo("<script>location.href = '\login.php?msg=$msg';</script>");                   
                    } else echo("Error description: " . mysqli_error($conn));
       }
       
     

?>