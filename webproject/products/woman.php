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
    <nav class="filter">
    <form action="" method="post">
      <select class="filter_option_list" name="filtering" id="filter_option">
        <option class="filter_option" value="none" selected hidden disabled>
          Select Filter
        </option>
        <option class="filter_option" value="lowToHigh">
          Price: Low to High
        </option>
        <option class="filter_option" value="hightToLow">
          Price: High to Low
        </option>
        <option class="filter_option" value="AZ">Alphabetical: A to Z</option>
        <option class="filter_option" value="ZA">Alphabetical: Z to A</option>
      </select>
      <button type="submit" name="submit" style="background-color: transparent; border: none;">
      <a href="#">
        <img
          class="filter_icon"
          src="/img/filter_icon.png"
          height="25"
          width="25"
        />
      </a>
    </button>
    </form>
    </nav>


    <style>
      #grid {
        display: grid;
        width: 100%;
        overflow-x: hidden;
        grid-template-columns: auto auto auto auto;
        grid-gap: 10px;
      }
      @media screen and (max-width: 768px) {
        #grid {
          grid-template-columns: auto;
        }
      }
    </style>

    <center>
      <div style="margin: 2%" id="1"></div>
      <div id="grid">
      <?php
 $conn = mysqli_connect("localhost", "root", "", "ecommarce");

 if (isset($_POST['submit'])) {
  if (!empty($_POST['filtering'])) {
    $selected = $_POST['filtering'];
    if ($selected == "lowToHigh") {
      $query = "SELECT * FROM product WHERE category='women' ORDER BY `price` ASC;";
    }
    if ($selected == "hightToLow") {
      $query = "SELECT * FROM product WHERE category='women' ORDER BY `price` DESC;";
    }
    if($selected == "AZ"){
      $query = "SELECT * FROM product WHERE category='women' ORDER BY `name` ASC;";
    }
    if($selected == "ZA"){
      $query = "SELECT * FROM product WHERE category='women' ORDER BY `name` DESC;";
    }
  }
}
else{
$query = "SELECT * FROM product WHERE category='women';";
}

 $result = mysqli_query($conn, $query);
   while ($row = $result->fetch_row()) {
    echo ' 

    <form action="#" method="post">
    
    <div class="product">
  <div class="productCard_icons">
  ';
  echo
   "<button class='batan' name='cart' type='submit' value='$row[0]'>
   <a href='#'
      ><img  src='/img/addToCart_icon.png' height='30' width='30'
    /></a>
    </button>";
    echo " <button class='batan' name='wish' type='submit' value='$row[0]'>
    <a
      ><img src='/img/addToWishList_icon.png' height='30' width='30'
    /></a>
    </button>
  </div>
  <img
    class='product_img'
    src='$row[5]'
    height='400'
    width='275'
    id='product00'
  />";
      echo "<h2 class='product-text'>$row[1]</h2>
      <h3 class='product-text'>$row[4]$</h3>
      <button class='btn-primary' name='buy' value='$row[0]'>Buy Now</button>
    </div>         </form>

";
   }

      if ($result==""||$result==null) {
          print("<h1>No current products to display, products are on there way</h1>");
      }

    ?>


      </div>
    </center>
  </body>
</html>




<?php
//add to cart

//session_start();
if (isset($_POST["cart"])) {
  $use=$_SESSION["username"];
  $ids=$_POST['cart'];
    $f = "cart";
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "INSERT INTO `productssaved`(`username`, `productD`, `forwhich`)  VALUES ('$use','$ids','$f')";
  if ($conn->query($query) == TRUE) {
  }
else{
  echo 'Error:'.$query. "<br>".$conn->error;
}
   
   }
?>

<?php
//add to wish

//session_start();
if (isset($_POST["wish"])) {
  $use=$_SESSION["username"];
  $ids=$_POST['wish'];
    $f = "wish";
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "INSERT INTO `productssaved`(`username`, `productD`, `forwhich`)  VALUES ('$use','$ids','$f')";
  if ($conn->query($query) == TRUE) {
  }
else{
  echo 'Error:'.$query. "<br>".$conn->error;
}
   
   }
?>


<?php
//buy now

//session_start();
if (isset($_POST["buy"])) {
  $use=$_SESSION["username"];
  $ids=$_POST['buy'];
    $f = "cart";
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "INSERT INTO `productssaved`(`username`, `productD`, `forwhich`)  VALUES ('$use','$ids','$f')";
  if ($conn->query($query) == TRUE) {
    echo '<script> window.location.href="/cart/cart.php" </script>';
  }
else{
  echo 'Error:'.$query. "<br>".$conn->error;
}
   
   }
?>