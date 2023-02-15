<?php 
    include'partials/navbar.php';
    //dashborad for login 
    $login=false;
    $showerror=false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'partials/database.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
       
        $sql="Select * from kfc_user where username='$username' AND password = '$password'";
        $result= mysqli_query($conn, $sql);
        $num=mysqli_num_rows($result);
        if($num == 1){
            $login=true;
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['username']= $username;
            header("location: welcome.php");

        }
        else{
            $showerror= "Invalid credentials";
        }
       
        if($login){
           
                 echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Success</strong> You are logged in
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            
                
        }
       
      if($showerror){
        echo' 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong>You have entered wrong username or password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';

        
        }
            
          
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
    <title>KFC_login</title>

</head>
<body>
<div class="head">
        <h2 class="text-center my-4 fs-1 ">Login us</h2>
        <img src="images/user.png" class= "user_logo" alt="user_logo" >
    </div>

<div class="container"> 
    
   
    <form action="/portal/login.php" class ="login_form" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"  required >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required></input>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
