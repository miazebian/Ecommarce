<?php
require '../config.php';
if(!empty($_SESSION["id"])){
    header("Location: ../index.php");
  }
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];

  $duplicate = mysqli_query($conn, "SELECT * FROM account WHERE `username` = '$username' OR `email` = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
            if ($dob == NULL) {
                $query = "INSERT INTO `account`(`username`, `email`, `password`, `number`, `dob`) VALUES ('$username','$email','$password',NULL,NULL)";
            } else {
                $query = "INSERT INTO `account`(`username`, `id`, `email`, `password`, `number`, `dob`) VALUES ('$username','','$email','$password',NULL,'$dob')";
            }
            if ($conn->query($query) == TRUE) {

                $_SESSION['username'] = $username;

                echo '<script> window.location="../home/home.php"; </script>';
            }
            else{
        echo '<script> alert("TRY AGAIN!"); </script>';
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignUp Page</title>
    <link rel="stylesheet" href="/login/loginstyle.css" />
    <link rel="stylesheet" href="/styles.css" />
    <script src="sign1.js"></script>
  </head>
  <body class="loginBody">
    <form style="padding: 2%" class="box" action="#" method="POST">
      <h1>Welcome!</h1>
      <h1>Sign Up</h1>
      <p id="a"></p>
      <input
        type="email"
        name="email"
        required
        placeholder="Enter email"
        id="email"
      />

      <input
        type="text"
        name="username"
        required
        placeholder="Enter username"
        id="username"
      />

      <input
        type="date"
        name="dob"
        placeholder="Enter Date of Birth"
        id="dob"
      />

      <input
        type="password"
        name="password"
        placeholder="Enter Password"
        required
        id="password"
        title="Must contain at least one number, one uppercase, one lowercase letter, one special character
                and at least 8 and 10 maxmium"
      />

      <button type="submit"  class="btn-primary" name="submit" onclick="validate()" >SignUp</button>

      <p><a href="/login/login.php">Already have an account? Login</a></p>
    </form>

    <form id="alert" class="alert">
      <h1>Invalid credentials</h1>
      <button
        class="sbtn"
        type="button"
        onclick="document.getElementById('alert').style.visibility='hidden'
            location.href='./login.html';"
      >
        Login
      </button>
      <button
        class="btn"
        type="button"
        onclick="document.getElementById('alert').style.visibility='hidden';
            location.href='./login.html';"
      >
        Try Again!
      </button>
      <br />
      <button
        class="closebtn"
        type="button"
        onclick="document.getElementById('alert').style.visibility='hidden';"
      >
        Cancel
      </button>
    </form>
  </body>
</html>