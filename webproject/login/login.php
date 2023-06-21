<?php

require '../config.php';
 if(!empty($_SESSION['id'])){
   header("Location: ../index.php");
 }

// if(isset($_POST['submit'])){
  $username= $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM account WHERE username = '$username'");



  $row = mysqli_fetch_assoc($result);

  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
    
      if ($username == "admin") {
        //go to admin page
        echo 2;
      }
      else{
        //go to home page
        $_SESSION["username"] = $username;
        
        echo 1;
      }
    }

  }
      else {
      echo 0;
    }
  
// }



?>
