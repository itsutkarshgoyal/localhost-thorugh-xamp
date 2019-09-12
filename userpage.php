<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);
$bucket_count=5;
$q=$_SESSION['username'];
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }

$sql2 = "SELECT * FROM website_product";
$result = $conn->query($sql2);
$sql3="SELECT COUNT(*) FROM website_bucket where user_name='$q'";
$result1 = $conn->query($sql3);
  if ($conn->query($sql2))
   {
    while($row = $result1->fetch_assoc()){
      //echo "<pre>";print_r($row); exit;
       $bucket_count= $row["COUNT(*)"];            
      } 

    }
      else echo("Error description: " . mysqli_error($conn));
      $limit = 3;  // Number of entries to show in a page. 
    // Look for a GET variable page if not found default is 1.      
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;   
  
    $sql = "SELECT * FROM website_product LIMIT $start_from, $limit";   
    $rs_result = mysqli_query ($conn,$sql); 
    $sq288 = "SELECT * FROM addnewpage";
$result212 = $conn->query($sq288); 
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=2">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 0px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 0px -0px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
  height: 500px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}
.btn_ss {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #666;
  cursor: pointer;
}
.btn_vv {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #666;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>
</head>
<body>

<!-- MAIN (Center website) -->
<div class="main">

<h1>MYLOGO.COM</h1>
<hr>

<div class="container">
 
  <nav class="navbar navbar-inverse">
 
   <div class="container-fluid">
 
    <div class="navbar-header">
 
     <a class="navbar-brand" href="">Latest Gadgets</a></div>
     <a href="">
          <button class="btn "> Home</button></a>
     <a  href="http://localhost:81/star/pages/samples/login.php">
          <button class="btn "> Login</button></a>
    <a href="http://localhost:81/star/pages/samples/register.php">
          <button class="btn ">Register</button></a>
          <!-- add custom page -->
          <?php
           if ($result212->num_rows > 0) 
        {
              while ($row = $result212->fetch_assoc()) 
              {
                
                  ?>
          <a href="<?php echo $row['location'];?>">
          <button class="btn "><?php echo $row['name'];?></button></a>
          <?php
             
                    }
             }
        ?>     
    
 <i class="label label-pill label-danger count" style="border-radius:10px; float: right"> 
      <span class="span" style="border-radius:20px;">
        <?php echo $bucket_count;?>
      </span></i>
    <a href="http://localhost:81/star/shoppingcart.php"> <span class="glyphicon glyphicon-shopping-cart" style="font-size:18px; float:right "></a>
    <div>
    <ul class="nav navbar-nav navbar-right">
     <li class="dropdown">
 
    
      <a href=""class="dropdown-toggle" data-toggle="dropdown">
  <?php echo "Hello ".$_SESSION['username']." !";?>
      </a>
 
      <ul class="dropdown-menu">
            <div> <button class="btn" type="submit" data-toggle="modal" 
             data-target="#myModal3">Profile
                          </button></div>
            <a href="http://localhost:81/star/pages/samples/login.php">
                  <button class="btn "> Signout</button></a>


      </ul>
 
     </li>
 
    </ul>
 
   </div></div>
 
  </nav>
<h2>MOBILE STORE</h2>

<div id="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <a href="http://localhost:81/star/userpage.php?page=1"><button class="btn" onclick="filterSelection('Phone')"> Phone</button> </a>
</div>

<!-- Portfolio Gallery Grid -->

  <?php
        if ($result->num_rows > 0) 
        {
              while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) 
              {   
                  ?>
                    <div class="row">
                      <div class="column Phone">
                        <div class="content">
                          <img src="<?php echo $row['location'];?>"
                           alt="<?php echo $row['name'];?>" style="width:80% ">
                          <h4> Name:<?php echo $row['name'];?></h4>
                          <p>Price: <?php echo "₹".$row['price'];?></p>
                          <p>Description: <?php echo $row['desciption'];?></p>
                          <button class="btn_ss" id="<?php echo $row['id'];?>"> Add to cart</button>
                          <button class="btn_vv" data-toggle="modal" data-target="#myModal">Buy Now</button>
                        </div>
                      </div>
                      <?php
             
                    }
             }
        ?>  
            
          <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Check Out</h4>
      </div>
      <div class="modal-body">
        <p>Congrats you have bought the items.</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">User Details </h4>
        </div>
        <div class="modal-body">
             <?php
            $show="SELECT * FROM website_creation WHERE username='$q'";
            $result0=mysqli_query($conn, $show);
            while ($row = mysqli_fetch_array ($result0)){
              ?>
         <form name="form1" method="post" action="" > 
                <input type="hidden" name="new" value="1" />
                 <input type="hidden" name="we"id="ctext" value="<?php  ;?>">
                <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
                <p>Email:</p><p><input type="text" name="email" placeholder="Enter Email" 
                required value="<?php echo $row['email'];?>" /></p>
                <p>Phone number:</p><p><input type="text" name="phone" placeholder="Enter Phone number" 
                required value="<?php echo $row['phone'];?>" /></p>
                <p>Address:</p><p><input type="text" name="address" placeholder="Enter address" 
                required value="<?php echo $row['Address'];?>" /></p>
                <p><input name="submit" class="btn_ss" type="submit" value="Update" /></p>
        </form>
         <?php
        }
        ?>
            <?php
            $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "test";
                  $conn = new mysqli($servername, $username, $password,$dbname);
                      $status = "";
                  if(isset($_POST['new']) && $_POST['new']==1)
                  {
                    $id= $_POST["we"];
                  //$id=$id_product;
                  $phone =$_REQUEST['phone'];
                  $email =$_REQUEST['email'];
                  $address=$_REQUEST["address"];
                  $update="UPDATE website_creation SET phone='$phone',
                  email='$email',Address='$address'
                  where username='$q'";
                  //print_r($update);
                  $result5=mysqli_query($conn, $update);   }
             ?>
        </div>
        <div class="modal-footer">      
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script type="text/javascript">
           
          $("button.btn_ss").click(function() {
    
    var product_id=(this.id);
    var user_name= "<?php echo $_SESSION['username'] ?>";
    $.ajax({
        type: 'POST',
        url: 'website_bucket.php',
        data: { product_id,user_name},
        success: function(response) {
            $('#result').html(response);
             location.reload();
        }
    });

});
        </script>        
  <!-- <div class="column nature">
    <div class="content">
    <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">
      <h4>Lights</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <img src="/uploads/GGPmU.jpg" alt="Nature" style="width:100%">
      <h4>Forest</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  
  <div class="column cars">
    <div class="content">
      <img src="/w3images/cars1.jpg" alt="Car" style="width:100%">
      <h4>Retro</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
    <img src="/w3images/cars2.jpg" alt="Car" style="width:100%">
      <h4>Fast</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
    <img src="/w3images/cars3.jpg" alt="Car" style="width:100%">
      <h4>Classic</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>

  <div class="column people">
    <div class="content">
      <img src="/w3images/people1.jpg" alt="Car" style="width:100%">
      <h4>Girl</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <img src="/w3images/people2.jpg" alt="Car" style="width:100%">
      <h4>Man</h4>
      <p>Lorem ipsum dolor..</p>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <img src="/w3images/people3.jpg" alt="Car" style="width:100%">
      <h4>Woman</h4>
      <p>Lorem ipsum dolor..</p>
    </div> -->
  </div> 
<!-- END GRID
</div>

<!-- END MAIN -->
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
<footer>
            <div class=" text-center">      
        <ul class="pagination"> 
              <?php   
                $sql = "SELECT COUNT(*) FROM website_product";   
                $rs_result = mysqli_query($conn,$sql);   
                $row = mysqli_fetch_row($rs_result);   
                $total_records = $row[0];   
                  
                // Number of pages required. 
                $total_pages = ceil($total_records / $limit);   
                $pagLink = "";                         
                for ($i=1; $i<=$total_pages; $i++) { 
                  if ($i==$pn) { 
                      $pagLink .= "<li class='active'><a href='userpage.php?page="
                                                        .$i."'>".$i."</a></li>"; 
                  }             
                  else  { 
                      $pagLink .= "<li><a href='userpage.php?page=".$i."'> 
                                                        ".$i."</a></li>";   
                  } 
                } ;  
        echo $pagLink;   
      ?> 

      </ul>  </div>
<p class=" text-center">copyright © 2019</p>
    </footer>
</html>
