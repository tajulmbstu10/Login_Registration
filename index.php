<?php

$conn = mysqli_connect("localhost","root","","tajul");

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- bootstrap link css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- bootstrap link js-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Main css file-->
    <link rel="stylesheet" href="./css/style.css">

    <title>Registration</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $message = "";

  if ($_POST["password"] === $_POST["cpassword"]) {
    $query = "INSERT INTO register (name, email, password) VALUES ('$name','$email', '$password')";
    $run = mysqli_query($conn,$query);
  
    if($run){
  
      $name = "";
      $email="";
      $password = "";
      $message ='<p style="color: green">
      Registration Succefull
      </p>';
      
    }
    else{
      $name = "";
      $email="";
      $password = "";
      $message = '<p style="color: red"> Email Already Registered </p>';
    }
 }
 else {
      $pmessage = '<p style="color: red">
      password not matched...!!
      </p>';
 }

 
}
?>

  <section class="container">
    <div class="register">
<form name = "frm" action="" method="POST" >
<div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" name="name"class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name" required="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
  </div>
  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name= "cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" required="">
                    <?php 
  if(empty($pmessage)){

  }
  else{
    echo $pmessage;
    $pmessage ="";
  }
  ?>
                </div>
                
  <button type="submit" name="submit" value ="submit" class="btn btn-primary">Register</button>
  <div name="message">
  <?php 
  if(empty($message)){

  }
  else{
    echo $message;
    $message ="";
  }
  ?>
  </div>
  <div class="login">Already Registered? <a href ="login.php">Login</a></div>
</form>
</div>
</section>
</body>
</html>