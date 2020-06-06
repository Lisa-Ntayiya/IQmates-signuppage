<?php
$host ='localhost';
$user = 'root';
$pass = '';
$db = 'signup';

$con = new mysqli($host, $user, $pass, $db) or die("unable to connect");
if(isset($_POST['signupbtn'])){
  session_start();

  $name = mysqli_real_escape_string($con,$_POST['name']);
  $surname = mysqli_real_escape_string($con,$_POST['surname']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $cellnumber = mysqli_real_escape_string($con,$_POST['cellnumber']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $confirm = mysqli_real_escape_string($con,$_POST['confirm']);

  if($password==$confirm){
    //created successfully
    $password = md5($password);

    $sql = "insert into details(name, surname, email, cellnumber, password, confirm)values('$name', '$surname', '$email', $cellnumber, '$password', '$confirm')";
     $query=mysqli_query($con ,$sql);

     if($query){
      function function_alert($message) { 
      
       // Display the alert box  
        echo "<script>alert('$message');</script>"; 
       } 
      
      // Function call 
      function_alert("You have been Registered Successfully $name"); 
      }
    
     }
      else{
    //failed to create user
    function function_alert($message) { 
      // Display the alert box  
      echo "<script>alert('$message');</script>"; 
    } 
  // Function call 
  function_alert("Password and confirmation dont match, please try again"); 

   }

  }
    

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheet1.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src = "signup.js" defer></script>
    <title>Signup Page</title>
  </head>
  <body>

    <style>
      body {
        background-image: url("background.png");
        background-repeat: no-repeat;
        background-size: 1400px 700px ;
        font-family: "Lato", sans-serif;
         }
       </style>
    <div class="container-fluid">
    <button id="singleBtn" type="button" name="button" data-toggle="modal" data-target="#Signup">Signup/Register</button>
    </div>

    <div id="Signup" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content"style="background-color:#110109;">
          <div class="modal-header">
            <h1>Signup</h1>
          </div>
          <div class="modal-body">
            <form class="" action="signup.php" method="post">
              <label for="">Name: </label>
                <div class="input-group form-group">
                  
                  <input type="text" name ="name" class="form-control" placeholder="Enter Name"required>
                </div>
                <label for="">Surname: </label>
                  <div class="input-group form-group">
                  
                    
                    <input type="text" name ="surname" class="form-control" placeholder="Enter Surname"required>
                  </div>
                  <label for="">Email Address: </label>
                  <div class="input-group form-group">
                    
                    <input type="text" name ="email" class="form-control" placeholder="Enter Email"required>
                  </div>
                  <label for="">Cell no: </label>
                  <div class="input-group form-group">
                    
                    <input type="text" name ="cellnumber" class="form-control" placeholder="Enter cellnumber"required>
                  </div>
                  <label for="">Password: </label>
                  <div class="input-group form-group">
                    
                    <input type="password" name ="password" class="form-control" placeholder="Enter Password"  required >
                  </div>
                  
                  <div class="input-group form-group">
                    <input type="password" name ="confirm" class="form-control" placeholder="confirm password" required>
                    
                  </div>

                  <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                  </label>
                  
                  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
              
                  <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" name="signupbtn" class="signupbtn">Sign Up</button>
                  </div>
      
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
