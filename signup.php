
<?php 
    include'partials/navbar.php'; 
   
    $showalert=false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'partials/database.php';
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        // $exists=false;

        //check whether this username exits  or  not
        $existsql = "SELECT *  FROM `kfc_user` WHERE username= '$username'";
        $result = mysqli_query($conn,$existsql);
        $numExistRows= mysqli_num_rows($result);
        if($numExistRows > 0){
            echo' 
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Username Already Exits
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
        else{
            if(($password == $cpassword)){
                $sql="INSERT INTO `kfc_user` ( `Password`, `Username`) 
                VALUES ( '$password', '$username');";
    
                $result= mysqli_query($conn, $sql);
                if($result){
                    // $showalert=true;
                    // if($showalert){
                        echo'
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Sign Up </strong> successful
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        ';
                    // }
                    
                }
            }
            else{
               
                
                echo' 
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Password donot  match
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
               ';
        
                
                  
            }
           
        }
        
      
      
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="custom.css">
    <title>KFC_signup</title>
  </head>
  <body>

  <div class="head">
        <h2 class="text-center my-4 fs-1">Sign Up</h2>
    </div>
   
<div class="container"> 
    
    <form action="/portal/signup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"  required >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required></input>
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" required></input>
            <small class="form-text text-muted" >Please enter the same password </small>
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
    
</div>

  
      
      
      <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
   
  </body>
</html>

