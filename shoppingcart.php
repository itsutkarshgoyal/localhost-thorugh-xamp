<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);
$q=$_SESSION['username'];
$sql = "SELECT website_product.id,website_product.name,website_product.price,website_product.location,website_product.desciption,website_bucket.serial_no,website_bucket.value FROM website_bucket 
LEFT JOIN website_product on  website_bucket.product_id = website_product.id where website_product.id in (SELECT product_id FROM website_bucket HAVING user_name='$q')";   
    $rs_result = mysqli_query ($conn,$sql);  
    $result = $conn->query($sql);
    $rs_result11 = mysqli_query ($conn,$sql);  
    $result11 = $conn->query($sql);

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
      $sql9="SELECT SUM(website_product.price*website_bucket.value),SUM(website_bucket.wish) FROM website_bucket
      LEFT JOIN website_product on  website_bucket.product_id = website_product.id where website_product.id in (SELECT product_id FROM website_bucket HAVING user_name='$q')";
      $result9 = $conn->query($sql9);
      if ($conn->query($sql9))
   {
    while($row = $result9->fetch_assoc()){
      //echo "<pre>";print_r($row); exit;
       $totalprice= $row["SUM(website_product.price*website_bucket.value)"]; 

      } 

    }else echo("Error description: " . mysqli_error($conn));

    $sql91="SELECT COUNT(*) FROM website_bucket
      LEFT JOIN website_product on  website_bucket.product_id = website_product.id where website_product.id in (SELECT product_id FROM website_bucket HAVING user_name='$q' and wish='1')";
      $result91 = $conn->query($sql91);
      if ($conn->query($sql91))
   {
    while($row = $result91->fetch_assoc()){
      //echo "<pre>";print_r($row); exit;
       $wish= $row["COUNT(*)"]; 
                
      } 

    }else echo("Error description: " . mysqli_error($conn));
    $sq299 = "SELECT * FROM addnewpage";
$result212 = $conn->query($sq299);

?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=2">

    <style>
* {
  box-sizing: border-box;
}



/* Center website */


h1 {
  font-size: 50px;
  word-break: break-all;
}


/* Style the buttons */
.go{
   border: none;
  outline: none;
  padding: 10px 29px;
  background-color: #666;
  cursor: pointer;
}
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #666;
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
    <div class="main">

<h1>MYLOGO.COM</h1>
<div class="container">
 
  <nav class="navbar navbar-inverse">
 
   <div class="container-fluid">
 
    <div class="navbar-header">
 
     <a class="navbar-brand" href="http://localhost:81/star/userpage.php">Latest Gadgets</a></div>
     <a href="http://localhost:81/star/userpage.php">
          <button class="btn "> Home</button></a>
     <a  href="http://localhost:81/star/pages/samples/login.php">
          <button class="btn ss"> Login</button></a>
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
<a style="float:right">wishlist<span class ="badge" style="border-radius:20px; float:right">
  <?php echo $wish;?>
</span></a>
      <div>   

    <ul class="nav navbar-nav navbar-right">
     <li class="dropdown">
 
      <!-- <a href="http://localhost:81/star/shoppingcart.php" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:20px;">
        <?php //echo $bucket_count;?>


      </span> <span class="glyphicon glyphicon-shopping-cart" style="font-size:18px;"></span></a> -->
      <p></p>
      <a href=""class="dropdown-toggle" data-toggle="dropdown">
  <?php echo "Hello ".$_SESSION['username']." !";?>
      </a>
 
      <ul class="dropdown-menu">
            <div> <button class="btn" type="submit" data-toggle="modal" 
             data-target="#myModal3">Profile
                          </button></div>
            <a href="http://localhost:81/star/pages/samples/login.php">
                  <button class="btn " style="float: center"> Signout</button></a>
                <div>  

      </ul>
 <!-- <a href=""class="dropdown-toggle" data-toggle="dropdown">
  <?php echo "Hello ".$_SESSION['username']." !";?>
      </a> -->
     </li>
 
    </ul>
 
   </div></div>
 
  </nav>
<hr>
    <div class="shopping-cart">
      <!-- Title -->
      <div class="title">
        Shopping Bag
      </div>

      <!-- Product #1 -->
      <?php
        if ($result->num_rows > 0) 
        {
              while ($row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC)) 
              {   
                  ?>
                  
      <div class="item">
        <div class="buttons">
         <button class="btn_ss" id=<?php echo $row['serial_no'];?>> <span class="delete-btn"></span></button></div><div class="buttons">
           <span class="like-btn" id=<?php echo $row['serial_no'];?>></span>
        </div>

        <div class="image">
          <img src="<?php echo $row['location'];?>" alt=""  width="50%"/>
        </div>

        <div class="description">
          <span><?php echo $row['name'];?></span>
          <span><?php echo $row['desciption'];?></span>
          <span>White</span>
        </div>

        <div class="quantity">
          <button class="plus-btn" type="button" name="button" id="<?php echo $row['serial_no'];?>">
            <img src="plus.svg" alt="" />
          </button>
          <input type="text" name="name" value="<?php echo $row['value'];?>">
          <button class="minus-btn" type="button" name="button" id="<?php echo $row['serial_no'];?>">
            <img src="minus.svg" alt="" />
          </button>
        </div>

        <div  id="total-price" class="<?php echo $row['serial_no'];?>" data = "side_price"><?php echo $row['price']*$row['value'];?></div>
      </div>
      
      <?php
             
                    }
             }
        ?> 
       <div> 
        <a href="http://localhost:81/star/userpage.php"><button style="float: right;height:50px;width:200px"type="button" class="btn">Continue Shoping</button></a> 
       <a><button type="button" class="btn " 
        style="height:50px;width:200px"
       data-toggle="modal" data-target="#myModal">Checkout</button></a></div>
</div>

    </div>
      </div>
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
        <?php
        if ($result11->num_rows > 0) 
        {
              while ($row = mysqli_fetch_array($rs_result11, MYSQLI_ASSOC)) 
              {   
                  ?>
        <p><?php echo $row['name'];?></p>
 <?php
             
                    }
             }
        ?> 
        <p>Total bill=<?php echo $totalprice;?></p>
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
  
    <script type="text/javascript">
      $("button.btn_ss").click(function() {
    //alert(this.id);
    var serial_no=(this.id);
    $.ajax({
        type: 'POST',
        url: 'bucket_delete.php',
        data: { serial_no},
        success: function(response) {
            $('#result').html(response);
             location.reload();
        }
    });

});
      
      $('.minus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
        var id = (this.id);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());
        var newvalue= $('.'+id).html();
         var i; var final;         /*for (i = 1; i <= value; i++) { 
            final += newvalue;
          }*/
         final=parseInt(newvalue)/value;
        $('.'+id).text(final);

    		if (value > 1) {
    			value = value - 1;
    		} else {
    			value = 1;
    		}
         /*var newvalue= $('.'+id).html();
        var final=parseInt(newvalue)/value;
        $('.'+id).text(final);*/
      // alert(value);
               
        $input.val(value);
        $.ajax({
        type: 'POST',
        url: 'website_bucket_value.php',
        data: { value,id},
        success: function(response) {
            $('#result').html(response);
             location.reload();
        }
    });

    	});

    	$('.plus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
        var id = (this.id);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());
        
    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value =100;
    		}
        var newvalue= $('.'+id).html();
        //var final=parseInt(newvalue)*value;
        //$('.'+id).text(final);
    		$input.val(value);
        //alert(final/value);
        $.ajax({ 
        type: 'POST',
        url: 'website_bucket_value.php',
        data: { value,id},
        success: function(response) {
            $('#result').html(response);
            location.reload();
             
        }
    });
    	});

      $('.like-btn').on('click', function() {
        $(this).toggleClass('is-active');
        var $this = $(this);
        var id1 = (this.id);
        var status=$('.like-btn').hasClass("like-btn is-active");
        if(status==true)
        {
                       // alert(status);
                       var value1=1;} else value1=0;
                     
                      $.ajax({
                      type: 'POST',
                      url: 'website_bucket_wish.php',
                      data: { value1,id1},
                      success: function(response) {
                          $('#result').html(response);
                          // location.reload();
                      }
                  });

      });
    

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
/*var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}*/
    </script>
    
  </body>
  <footer><p class="footer-text text-center">copyright © 2019</p></footer>
</html>
