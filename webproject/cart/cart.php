
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
  <body onload="Initialize();">
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




    <section class="cart" style="height: fit-content; padding-bottom: 2vh;">
      <h2 class="cart_title">Shopping Cart</h2>
      <div class="cart_list">

      <?php
//add product from database
session_start();
$use=$_SESSION["username"];
   $conn = mysqli_connect("localhost", "root", "", "ecommarce");
 $query = "SELECT `productD` FROM `productssaved` WHERE `username`='$use' AND `forwhich`='cart' ;";
 $result = mysqli_query($conn, $query);

 $r=0;
      $_POST['r'] = $r;
 while ($row = $result->fetch_row()) {
        foreach ($row as $v) {
          $query1 = "SELECT `productID`, `name`, `category`, `description`, `price`, `img` FROM `product` WHERE `productID`=$v";
          $result2 = mysqli_query($conn, $query1);
          while ($row = $result2->fetch_row()) {
            $_POST['ids'] = $row[0];
            echo '
        <div class="cart_list_item">
        ';
        echo"
        <img src='$row[5]' height='100' width='100' />
        ";echo'
          <div class="cart_list_item_description">
          ';
          echo "
            <p>$row[1]</p>
            <p>$row[3]</p>
          </div>
";
echo'
          <div class="pricing">
            <div class="row-price">
            ';
            echo'
              <p>Price</p>
              <div class="pricing-item" id="PPI">
              ';
              echo "$row[4]$</div>";
            $r += $row[4];

            $_POST['r'] = $r;

            echo '
            </div>
            <form action="#" method="POST">
           
          </div>
';
echo"
          <button class='btn-primary' id='Rem' value='$row[0]' name='remove'>
            Remove
          </button>
        </div>
        </form>
        ";

          }
        }
     }
   if ($result==""||$result==null) {
    print("<h1>No current products to display, Add some products</h1>");
   }

      ?>

      <div class="total text-medium">
        <p id="TotalPay">
          Total Pay: 
          <?php
          //echo $r;
          print($_POST["r"]."$");

          ?>
        </p>
        <p id="taxPay">
        Tax Pay: 
        <?php 
        //5% tax
$t = ($_POST["r"] + $_POST["r"] * 0.05);
            print($t."$");

        echo"
        </p>
        <p id='shippingPay'>
          Shipping Pay: 15$
        </p>
        <p id='finalPay'>
          Final Pay:
          ";
        print(($t + 15) . "$");
        ?>

        </p>
        
      </div>
      <button class='btn-primary' onclick="window.location.href='/checkout/checkout.php'" name='checkout'>
            Continue to Checkout
          </button>
    </section>
  </body>
</html>


<?php
//remove 

if (isset($_POST["remove"])) {
  $use=$_SESSION["username"];
  $ids=$_POST["remove"];
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "DELETE FROM `productssaved` WHERE `forwhich`='cart' AND `username`='$use' AND `productD`='$ids'";
  if ($conn->query($query) == TRUE) {

    echo '<script> window.location.href="cart.php"   </script>';
}
else{
  echo 'Error:'.$query. "<br>".$conn->error;
}
   
   }
?>

<?php
//change quantity
if (isset($_POST["quantity"])) {
  $use = $_SESSION["username"];
  $ids = $_POST['ids'];
  $f = "cart";
  $q = 1;
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "DELETE FROM `productssaved` WHERE `forwhich`='cart' AND `username`='$use' AND `productD`='$ids'";
  if ($conn->query($query) == TRUE) {

    echo '<script> window.location.href="cart.php"   </script>';
  } else {
    echo 'Error:' . $query . "<br>" . $conn->error;
  }
}
?>