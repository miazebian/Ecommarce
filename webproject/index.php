<?php
require './config.php';
$_SESSION["id"] = $row["id"];
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];

  $result = mysqli_query($conn, "SELECT * FROM account WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: ../login/login.html");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <h1>Welcome</h1>
    <a href="/settings/logout.php">Logout</a>
  </body>
</html>