<?php
session_start();       

if (isset($_POST["submit"])) {

          $email = $_POST["email"];
           
        
          $duplicate = mysqli_query($conn, "SELECT * FROM newsletter WHERE email = '$email'");
          if(mysqli_num_rows($duplicate) >= 0){
            echo
            "<script> alert(' Email Already Added'); </script>";
          }
          else{
            $query = "INSERT INTO newsletter (email) VALUES('$email')";
                          
                    if ($conn->query($query) == TRUE) {
        
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
    <!--                                                Slideshow                                                -->

    <section class="slideshow">
      <div class="slideshow_left" onclick="prevImage()">
        <a href="#" class="slideshow_left-arrow"
          ><img src="/img/arrow_icon.png"
        /></a>
      </div>
      <div class="slideshow_img">
        <img src="/img/photo-0.jpg" class="slideshow_img" id="slider" />
        <div class="slideshow_img_radio">
          <div class="radio_div">
            <input type="radio" id="radio0" name="radio" onclick="imageOne()" />
            <label for="radio0"><span></span></label>
          </div>

          <div class="radio_div">
            <input type="radio" id="radio1" name="radio" onclick="imageTwo()" />
            <label for="radio1"><span></span></label>
          </div>

          <div class="radio_div">
            <input
              type="radio"
              id="radio2"
              name="radio"
              onclick="imageThree()"
            />
            <label for="radio2"><span></span></label>
          </div>

          <div class="radio_div">
            <input
              type="radio"
              id="radio3"
              name="radio"
              onclick="imageFour()"
            />
            <label for="radio3"><span></span></label>
          </div>

          <div class="radio_div">
            <input
              type="radio"
              id="radio4"
              name="radio"
              onclick="imageFive()"
            />
            <label for="radio4"><span></span></label>
          </div>
        </div>
      </div>
      <div class="slideshow_right" onclick="nextImage()">
        <a href="#" class="slideshow_right-arrow"
          ><img src="/img/arrow_icon.png"
        /></a>
      </div>
    </section>
    <!--                                                New Products                                                -->

    <section class="products products_new" id="new-products">
      <h1 class="product-title">New Products</h1>
      
        <?php
        $conn = mysqli_connect("localhost", "root", "", "ecommarce");
        $query = "SELECT * FROM product ORDER BY productID DESC LIMIT 4;";
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
  <button style='border:none' type='submit' name='img' value='$row[0]'>
  <img
    class='product_img'
    src='$row[5]'
    height='400'
    width='275'
    id='product00'
  />
  </button>";
      echo "<h2 class='product-text'>$row[1]</h2>
      <h3 class='product-text'>$row[4]$</h3>
      <button class='btn-primary' name='buy' value='$row[0]'>Buy Now</button>
    </div>         </form>

";
          }
          ?>
    </section>
    <!--                                                Best Products                                                -->

    <section class="products" id="best-sellers">
      <h1 class="product-title">Best Sellers</h1>

      <?php
        $conn = mysqli_connect("localhost", "root", "", "ecommarce");
        $query = "SELECT * FROM product ORDER BY price DESC LIMIT 4;";
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

           ?>

      
    </section>
    <!--                                                NewsLetter                                                -->
    <section class="newsletter">
      <img src="/img/newsletter-white.png" height="80" width="80" />
      <p class="newsletter-text">
        If you wish to subsribe to our newsletter please enter your email in the
        form below!
      </p>
      <form class="newsletter_form" action="#" method="POST">
        <input
          class="input-secondary-white input-secondary input-secondary-big"
          type="email"
          placeholder="Please enter an email"
          name="email"
          id="email"
          required
        />

        <button class="btn-primary" type="submit" name="submit" id="submit">Submit</button>
        


      </form>
    </section>
    <!--                                                FOOTER                                                -->
    <footer class="footer">
      <div class="footer_section">
        <h2 class="footer_section-title">Address</h2>
        <p class="footer_section-text">
          Hamra Street Above Antoine Library 2nd floor
        </p>
      </div>
      <div class="footer_section">
        <h2 class="footer_section-title">Contact Information</h2>
        <p class="footer_section-text">
          hadi.hassoun.03@gmail.com <br />
          hassounhadi22@gmail.com <br />
          hassounhadi8@gmail.com <br />
          +961 01 85 78 96 <br />
          +961 70 99 65 58
        </p>
      </div>
    </footer>
  </body>

  <script src="main.js"></script>
  <script src="/Abstracts/responsiveNav.js"></script>
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
