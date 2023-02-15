<?php 
  // database connection 
  $server="localhost";
  $username="root";
  $password="";
  $database="user_login";
  
  $conn= mysqli_connect($server, $username , $password , $database);

  if(mysqli_connect_errno()) {  
      die("Failed to connect with MySQL: ". mysqli_connect_error());  
  }  

?>