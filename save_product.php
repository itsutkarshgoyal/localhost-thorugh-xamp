<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);
//$ra=RandomStringGenerator(6).".jpg";
$target_dir ="uploads/";
$_SESSION['view']=$target_dir;
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
//$target_file = $target_dir;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
$name=$_POST["name2"];
$price=$_POST["price2"];
$description=$_POST["des2"];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
        $namme=basename( $_FILES["fileToUpload"]["name"]);
   
         $query = "INSERT into website_product(name,price,location,desciption)
          VALUES('$name','$price','$target_file','$description')";

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
<?php
//$string = "'\myfile\uploads\'".$ra;

//$replace = (str_replace("'",'',$string));
//print_r($replace);
//?>

