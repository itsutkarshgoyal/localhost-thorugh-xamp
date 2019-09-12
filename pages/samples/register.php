
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Signup-Page</title>
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
  <style type="text/css">
    .submitbtn{
  border: none;
  outline: none;
  padding: 10px 29px;
  background-color: #666;
  cursor: pointer;
}
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Sign-up</h2>
            <div class="auto-form-wrapper">
              <form method="post" name="myForm" onsubmit="return validateForm()" >
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" id ="username1" name="username"class="form-control" placeholder="Username" onblur="validateForm()"onfocus="dataClear()">
                    <p id="username"></p>
                    <div class="input-group-append">
                      <span class="input-group-text">
                       
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" id= "pwd" name="pwd"class="form-control" placeholder="Password"onblur="validateForm()"onfocus="dataClear()">
                    <p id="pwwd"></p>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" id="cpwd" name="cpwd" class="form-control" placeholder="Confirm Password" onblur="validateForm()"onfocus="dataClear()">
                    <p id="cpwwd"></p>
                    <div class="input-group-append">
                      <span class="input-group-text">
                       
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" onblur="validateForm()"onfocus="dataClear()">
                    <p id="emaill"></p>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" onblur="validateForm()"onfocus="dataClear()">
                    <p id="no"></p>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="field" id="adr"  name="adr"class="form-control" placeholder="Enter Address" onblur="validateForm()"onfocus="dataClear()">
                    <p id="add"></p>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <!-- <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> I agree to the terms
                    </label>
                  </div> -->
                </div>
                <div >
                  <input type="button" class ="submitbtn" value="Submit">
                  
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="login.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <div id="myModal" style="display: none" align = "center">
   You have scuccessfully regestered.
   <a href="http://localhost:81/star/pages/samples/login.php"><button>Login Now!</button></a>
</div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

  <!-- endinject -->
</body>

<script>
var flag=-1;
              function validateForm()
           {
                var name = document.forms["myForm"]["username"].value;
                var pass = document.forms["myForm"]["pwd"].value;
                var cpass = document.forms["myForm"]["cpwd"].value;
                var email = document.forms["myForm"]["email"].value;
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var phone = document.forms["myForm"]["phone"].value;
                var addr = document.forms["myForm"]["adr"].value;
              if (!(name.length >0)||!isNaN(name)) {
                 document.getElementById("username").innerHTML = "invalid name";
                 document.getElementById("username").style.color="Red";
                 flag=1;
                 return false;
              }
              else flag=2;
                  if (!(pass.length > 0)||pass.length<4) {
                    document.getElementById("pwwd").innerHTML = "Password must be atleast 5 character";
                       document.getElementById("pwwd").style.color="Red";
                       flag=1;
                    return false;
                  }
                    else flag=2;
                          if ((cpass!=pass)||!(cpass.length > 0)) {
                            document.getElementById("cpwwd").innerHTML = "password does not match";
                               document.getElementById("cpwwd").style.color="Red";
                               flag=1;
                            return false;
                          }
                            else  flag=2;
                                if (!(document.forms["myForm"]["email"].value.match(mailformat))||!(email.length > 0)) {
                                  document.getElementById("emaill").innerHTML = "invalid email";
                                     document.getElementById("emaill").style.color="Red";
                                     flag=1;
                                  return false;
                                }
                                  else flag=2;
                                      if ((phone.length > 10)|| isNaN(phone)) {
                                        document.getElementById("no").innerHTML = "number must be less than  5 digit";
                                           document.getElementById("no").style.color="Red";
                                           flag=1;
                                        return false;
                                      }
                                        else flag=2;
                                            if (!(addr.length > 0)) {
                                              document.getElementById("add").innerHTML = "address caant be empty";
                                                 document.getElementById("add").style.color="Red";
                                                 flag=1;
                                              return false;
                                            } else flag=2;
                                            
                                          
                                 } 
          function dataClear()
          {  
            document.getElementById("username").innerHTML = "";
            document.getElementById("pwwd").innerHTML = "";
            document.getElementById("cpwwd").innerHTML = "";
            document.getElementById("emaill").innerHTML = "";
            document.getElementById("no").innerHTML = "";
            document.getElementById("add").innerHTML = "";     
        }
        //alert(345);
         jQuery('.submitbtn').click(function () {
                  console.log('here'+flag);
                
               
                  var username1=document.forms["myForm"]["username"].value;
                  var password1=document.forms["myForm"]["pwd"].value;
                  var email1=document.forms["myForm"]["email"].value;
                  var phone1=document.forms["myForm"]["phone"].value;
                  var addr1=document.forms["myForm"]["adr"].value;
                  if(flag == 2)
        {
          $.ajax({
        type: 'POST',
        url: 'http://localhost:81/star/pages/samples/website_database.php',
        data: { username1,password1,email1,phone1,addr1},
        success: function(response) {
            $('#result').html(response);
            $('#myModal').dialog('open');
             //location.href = "http://localhost:81/star/pages/samples/login.php"
        }
    });
         //window.location = "http://localhost:81/star/pages/samples/website_database.php"
        //location.href = "http://localhost:81/star/pages/samples/website_database.php?"
       
          
       } else {
        
       // window.location = "http://google.com"
      
        location.href = "http://localhost:81/star/pages/samples/register.php"
       //window.location.href = "http://localhost:81/star/pages/samples/login.php";
        }
                });
         $("#myModal").dialog({
            modal: true,
            autoOpen: false,
            title: "Success",
            width: 400,
            height: 150
            
        });
       /* $(".submitbtn").click(function () { alert(123);
            $('#myModal').dialog('open');
        });*/
         
          
  </script>

</html>
