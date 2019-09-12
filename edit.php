<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);
$id=$_REQUEST['id'];
$query4 = "SELECT * from website_creation where id='".$id."'"; 
$result4 = mysqli_query($conn, $query4) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result4);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$usernamae =$_REQUEST['username'];
$phone =$_REQUEST['phone'];
$status= $_REQUEST["status"];
$update="UPDATE website_creation SET username='$username',
phone='$phone', status='$status'
where id='$id'";
$result5=mysqli_query($conn, $update);
if (mysqli_query($conn, $update)) {
    //echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
$status = "Record Updated Successfully. </br></br>
<a href='index.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="username" placeholder="Enter Name" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" name="phone" placeholder="Enter Email" 
required value="<?php echo $row['phone'];?>" /></p>
<p><input type="text" name="status" placeholder="Enter Hobby" 
required value="<?php echo $row['status'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php }$conn->close(); ?>
</div>
</div>
</body>
</html>