<?php 
 

  
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
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
    <title>Welcome  <?php $_SESSION['username']?> </title>
  </head>
  <body>
    
    <?php include'partials/navbar.php'; ?>
<div class="container">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">WELCOME -<?php echo $_SESSION['username'];?> </h4>
        <p>  </p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to logout<a  class="nav-link" href="/portal/logout.php"> using this link </a></p>
  </div>


</div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    
   
  </body>
</html>