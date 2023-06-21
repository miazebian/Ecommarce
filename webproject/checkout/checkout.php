<?php
session_start();
if (isset($_POST["coupon"])) {
  $use=$_SESSION["username"];
  $c=$_POST['coupon'];
   
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $result = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `name`='$c'");
  while ($row = $result->fetch_row()) {

    if (date("Y-m-d")<=$row[2]){
      $_POST['c'] = $row[3];
    }
  } 
   }
?>




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


    <div class="checkout">
      <h1 class="checkout_title">Checkout</h1>
      <div class="checkout-left">
        
      <div>
          <p class="checkout-left_text">
            Returning customer? <a href="#">Click here to login</a>
          </p>
          <div class="checkout-hidden-input">
            <div class="checkout-hidden-field">
              <img
                src="/img/exclamation_icon.png"
                alt=""
                height="20"
                width="20"
              />
              <p class="checkout-coupon">
                Have a coupon ? Add it for a discount
              </p>
              <img
                src="/img/plus_icon.png"
                onclick="toggleCouponField()"
                height="20 "
                width="20"
              />
            </div>
            <form method="POST" action="#">

            <input type="text" name="coupon" id="hidden-input" placeholder="Coupon Name" />
            </form>
          </div>
        </div>

      
          
        <a href="/payment/payment.php"  class="btn-primary pay_btn">Proceed to Payment</a>
      </div>
      <div class="checkout-right">
        <h2 class="checkout-order-details text-white">Order Details</h2>
        <div class="checkout-right-list">
        <?php
//add product from database

$use=$_SESSION["username"];
   $conn = mysqli_connect("localhost", "root", "", "ecommarce");
 $query = "SELECT `productD` FROM `productssaved` WHERE `username`='$use' AND `forwhich`='cart' ;";
 $result = mysqli_query($conn, $query);

 $r=0;
 $_POST['e'] = $r;

 while ($row = $result->fetch_row()) {
        foreach ($row as $v) {
          $query1 = "SELECT `productID`, `name`, `category`, `description`, `price`, `img` FROM `product` WHERE `productID`=$v";
          $result2 = mysqli_query($conn, $query1);
          while ($row = $result2->fetch_row()) {
            $_POST['ids'] = $row[0];
              echo '
              <div class="checkout-product-even checkout-product">
              ';
              echo"
            <img src='$row[5]' height='100' width='66.25' />
            ";
            echo'
            <p class="checkout-product-name text-large">
            ';
            echo
            "$row[1]</p>
            <p class='checkout-product-price text-medium-1'>
            $$row[4]</p>
          </div>
              ";
              $r += $row[4];


              
                $_POST['e'] = $r;
              
          }
        }
     }

      ?>
        </div>

        <div class="checkout-right_total">
          
            <?php
            $p = 0;
            if($_POST["e"]=="0"){
              print("0$");
            } else {
              if(isset($_POST['c'])){
                echo '<p class="text-medium-1 text-white">Total Original:</p>
                <p class="text-medium text-white">';
                $c = $_POST['c'];
                print(($_POST["e"] + $_POST["e"] * 0.05 + 15) . "$");

                echo '<p class="text-medium-1 text-white">Total with coupon:</p>
                <p class="text-medium text-white">';
                $p=($_POST["e"] + $_POST["e"] * 0.05 + 15-$c);
                print($p . "$");
                

              } else {
                echo '<p class="text-medium-1 text-white">Total:</p>
                <p class="text-medium text-white">';
                $p = ($_POST["e"] + $_POST["e"] * 0.05 + 15);
                print($p . "$");

              }
              
            }
            global $price;
            $price=$p;
            ?>
          </p>
        </div>
      </div>
    </div>
  </body>
  <script src="/checkout/checkout.js"></script>
</html>