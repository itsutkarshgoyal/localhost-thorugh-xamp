<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);
//$ra=RandomStringGenerator(6).".jpg";
$tr="\star\index.php";
$target_dir ="uploads/";
$_SESSION['view']=$target_dir;
$name=$_POST["username"];
$type=$_POST["type"];
$target_file = $target_dir .$name.$type;
$dataa=$_POST["comment"];
//$target_file = $target_dir;
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
 
if(isset($_POST["submit"])) {
$name=$_POST["username"];
$type=$_POST["type"];
$description=$_POST["des2"];
   // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    /*if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/echo $name.$type;
}
echo $name.$type;
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (file_put_contents($target_file,$dataa)) {
        echo "The file ".$name.$type. " has been uploaded.<br>";
        $namme=$name;
        $location="/star/pages/samples/uploads/".$namme.$type;
         $query = "INSERT into addnewpage(name,location)
          VALUES('$namme','$location')";

        $result = mysqli_query($conn, $query)or die ( mysqli_error($conn));
        if($result){
        echo"succesfully stored in databse<br>";
        header("location: \star\index.php");
    }
        else echo"store failed".mysqli_error($conn);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>


