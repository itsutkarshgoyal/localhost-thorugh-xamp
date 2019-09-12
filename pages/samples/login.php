<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form action="<?php ?>">
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" name="username1"class="form-control" placeholder="Username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password1"class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <!-- <i class="mdi mdi-check-circle-outline"></i> -->
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
               <!--  <div class="form-group d-flex justify-content-between">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-block g-login">
                    <img class="mr-3" src="../../images/faces-clipart/pic-4.png" alt="">Log in with Google</button>
                </div> -->
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.php" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2019</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);
    if (!$conn)
            {
              die('Could not connect: ' . mysqli_error());
            }
if(isset($_GET["username1"])) {
if($_SERVER["REQUEST_METHOD"] == "GET") {
      // username and password sent from form 
     
      $myusername = $_GET["username1"];
      $mypassword = $_GET["password1"]; 
      if($myusername=="admin" AND $mypassword=="admin")
      {
         echo("<script>location.href = 'http://localhost:81/star/index.php?msg=$msg';</script>");
       
      }
      
      $sql ="SELECT id FROM website_creation WHERE username = '$myusername' and password ='$mypassword'";
     $result=$conn->query($sql);
      if($conn->query($sql))
      $count = mysqli_num_rows($result);
      else echo("Error description: " . mysqli_error($conn));
      // If result matched $myusername and $mypassword, table row must be 1 row
  
      if($count == 1) {
        $now = new DateTime();
        $last_login=$now->format('Y-m-d H:i:s');     
       $update="UPDATE website_creation SET last_login='$last_login'
              where username='$myusername'";
              $result5=mysqli_query($conn, $update);
              if (mysqli_query($conn, $update)) {
                  //echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . mysqli_error($conn);
              }
         $_SESSION['username']= "$myusername";
        // $_SESSION['login_user'] = $myusername;
        echo("<script>location.href = '\dir.php?msg=$msg';</script>");
         //header("location: index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }}
?>