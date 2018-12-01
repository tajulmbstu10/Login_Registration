<?php

$conn = mysqli_connect("localhost","root","","tajul");

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
     <!-- main css     -->
     <link rel="stylesheet" href="./css/style.css">    
   
    <!-- botstrap js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    

    <title>Login </title>
</head>

<body>

<?php


if(isset($_POST['login'])){

extract($_POST);

$query ="select * from register where email = '$email' AND password = '$password'";

$run_query = mysqli_query($conn,$query);
if($run_query){
if(mysqli_num_rows($run_query)>0){

    $_SESSION['email'] = '$email';
    $_SESSION['passsword']='$password';
    header("location:welcome.php");
}
   else{
     echo "<div class='alert alert-warning'><strong>warning!</strong>Login not Successfull...</div>";
   }
}
}

?>
    <section id="login">
        
        <div class="Login">
        <div class="container">

            <form action = "" method="POST">
                <!-- <label for="Login" class = "Login-Bar">Login</label> -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name = "email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email" required="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name= "password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
                </div>
                
                <button type="submit" name = "login" class="btn btn-primary">Login</button>
                
                <div class="login">Not Registered? <a href ="index.php">Register</a></div>
            </form>
        </div>
    </div>
    </section>
</body>

</html>