

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="x-icon" href="/img/finchLogo.png" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Golden Finch</title>
    <link rel="stylesheet" href="/styles.css"/>

  </head>
  <body>
  <nav class="nav-bar">
      <div class="nav-bar_left"> 
        <a href="home.php" class="logo"
          ><img
            src="/img/thegoldenfinch-transformed.png"
            alt="logo"
            height="110"
            width="220"
        /></a>
      </div>
      <div class="nav-bar_mid" id="navList">
        <a href="/products/men.php" class="nav-bar_mid_link">Men</a>
        <a href="/products/woman.php" class="nav-bar_mid_link">Women</a>
        <a href="/products/kids.php" class="nav-bar_mid_link">Kids</a>
        <a href="/aboutUs/aboutUs.html" class="nav-bar_mid_link">About Us</a>
        <a href="/contactUs/contactUs.php" class="nav-bar_mid_link"
          >Contact Us</a
        >
      </div>
      <div class="nav-bar_right">
        <form action="#" method="POST" class="nav-bar_right_search-form">
          <input
            type="text"
            name="search-input"
            placeholder="Search..."
            id="search-input"
            class="nav-bar_right_search-input"
          />
          <button class="nav-bar_right_search-btn" type="submit" name="search">
            <a href='#'>
            <img class="navIcon" src="/img/search-icon.png" alt="search"/>
      </a>
          </button>
        </form>
        <div
          class="right_icons"
          style="display: flex; justify-content: space-evenly"
        >
          <a
            href="/cart/cart.php"
            style="padding: 0 0.5rem"
            class="nav-bar_right_search-btn"
            ><img class="navIcon" src="/img/shopcart_icon.png" alt="Cart"
          /></a>
          <a
            href="/wishlist/wishlist.php"
            style="padding: 0 0.5rem"
            class="nav-bar_right_search-btn"
            ><img class="navIcon" src="/img/wishlist_icon.png" alt="Cart"
          /></a>
          <a
            href="/settings/setting.html"
            style="padding: 0 0.5rem"
            class="nav-bar_right_search-btn"
            ><img class="navIcon" src="/img/profile_icon.png" alt="Cart"
          /></a>
          <div class="collapseIcon">
            <img
              src="/img/hamburgerIcon.png"
              alt="Menu"
              class="hamburger"
              id="menu"
              onclick="showList()"
            />
            <img
              src="/img/closeIconWhite.png"
              alt="Close"
              class="closeNav"
              id="closeMenu"
              onclick="hideList()"
            />
          </div>
        </div>
      </div>
    </nav>
    <script src="/Abstracts/responsiveNav.js"></script>

    <div class="color">
      <center>
        <div class="color">
          <img class="img" src="../img/profile_icon.png" />
          <br />
        </div>
      </center>

      <p id="a"></p>
      
     
      <form method="POST" action="#">
        <label style="font-size: 22px">Username</label>
        <br />
        <input
          type="text"
          id="username"
          name="username"
          readonly
          placeholder="Enter Username"
          class="input-primary input-primary-white"
          <?php
       session_start();
       $use=$_SESSION["username"];
       $conn = mysqli_connect("localhost", "root", "", "ecommarce");
       $result = mysqli_query($conn, "SELECT `username` FROM account WHERE username = '$use'");
          while ($row = $result->fetch_row()) {
            foreach ($row as $v)
              echo "value='$v'";
          }
      ?>
        />

        <br />
        <label style="font-size: 22px">Password</label>
        <br />
        <input
          class="input-primary input-primary-white"
          type="password"
          readonly
          id="pass"
          placeholder="Enter Password"
          name="pass"
          <?php
       $use=$_SESSION["username"];
       $conn = mysqli_connect("localhost", "root", "", "ecommarce");
       $result = mysqli_query($conn, "SELECT `password` FROM account WHERE username = '$use'");
          while ($row = $result->fetch_row()) {
            foreach ($row as $v)
              echo "value='$v'";
          }
      ?>
        />

        <br />
        <label style="font-size: 22px">Email</label>
        <br />
        <input
          class="input-primary input-primary-white"
          type="email"
          readonly
          id="email"
          placeholder="Enter Email"
          name="email"
          <?php
       $use=$_SESSION["username"];
       $conn = mysqli_connect("localhost", "root", "", "ecommarce");
       $result = mysqli_query($conn, "SELECT `email` FROM account WHERE username = '$use'");
          while ($row = $result->fetch_row()) {
            foreach ($row as $v)
              echo "value='$v'";
          }
      ?>
        />

        <br />
        <label style="font-size: 22px">Phone Number</label>
        <br />
        <input
          class="input-primary input-primary-white"
          type="tel"
          id="phone"
          placeholder="Enter Phone Number"
          name="number"
          readonly
          <?php
       $use=$_SESSION["username"];
       $conn = mysqli_connect("localhost", "root", "", "ecommarce");
       $result = mysqli_query($conn, "SELECT `phone` FROM address WHERE username = '$use'");
          if ($result) {
            while ($row = $result->fetch_row()) {
              foreach ($row as $v)
                echo "value='$v'";
            }
          }
        
      ?>
        />

        <br />
        <br />
        <p id="add">Addresses</p>
        <p>
        <?php
        $s="";
       $use=$_SESSION["username"];
       $conn = mysqli_connect("localhost", "root", "", "ecommarce");
       $result = mysqli_query($conn, "SELECT `nameA`,`country`, `city`, `description` FROM address WHERE username = '$use'");
      
   while ($row = $result->fetch_row()) {
          $_POST['add'] = $row[0];
            $s .= ($row[1].", ".$row[2].", ".$row[3]." ");
          }echo "$s";
      ?>

          <button class="svg" type="submit" name="addremove">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-x-circle-fill"
              viewBox="0 0 16 16"
            >
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 
                    0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 
                    0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 
                    0 0-.708-.708L8 7.293 5.354 4.646z"
              />
            </svg>
          </button>
        </p>

        <br />
        <textarea
        style="width: 50%;"
          class="input-primary input-primary-white input-primary-big"
          class="iadd"
          type="text"
          id="newadd"
          name="newadd"
          placeholder="Enter Address"
        ></textarea>
        <br />
        <button class="btn-primary" type="submit" name="addaddress">
        Add New Address
        </button>

        <br>
      

      <br />
      <button
        class="btn-primary"
        name="save"
        type="submit">
        Save
      </button>
    
      <button class="btn-primary" onclick="window.location.reload()">
        Clear
      </button>
      <br />
      <br />
      <br />
    </form>
    </div>
  </body>
</html>


<?php
//add address
if (isset($_POST["addaddress"])) {
  $use = $_SESSION["username"];
  $add = $_POST["newadd"];
  
  $array = explode(',', $add);
  
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "INSERT INTO `address`(`nameA`, `username`, `country`, `city`, `description`) 
  VALUES ('$array[0]','$use','$array[2]','$array[1]','$add')";
  if ($conn->query($query) == TRUE){
    echo '<script> window.location.href="edit.php"   </script>';
  } else {
    echo 'Error:' . $query . "<br>" . $conn->error;
  }
}
?>


<?php
//remove address
if (isset($_POST["addremove"])) {
  $use = $_SESSION["username"];
  $add = $_POST['add'];
  
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "DELETE FROM `address` WHERE `nameA`='$add' AND `username`='$use'";
  if ($conn->query($query) == TRUE) {

    echo '<script> window.location.href="edit.php"   </script>';
  } else {
    echo 'Error:' . $query . "<br>" . $conn->error;
  }
}
?>

