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



    <section class="wishlist">
    <h2 class="wishlist_title text-larger">Wishlist</h2>

     
     <div class="list">
<form style="width: 100%;" method="POST" action="#"> 
      <?php
      //add product from database
      session_start();
     $use=$_SESSION["username"];
        $conn = mysqli_connect("localhost", "root", "", "ecommarce");
      $query = "SELECT `productD` FROM `productssaved` WHERE `username`='$use' AND `forwhich`='wish' ;";
      $result = mysqli_query($conn, $query);

      while ($row = $result->fetch_row()) {
       
        foreach ($row as $v) {
          $query1 = "SELECT `productID`, `name`, `category`, `description`, `price`, `img` FROM `product` WHERE `productID`=$v";
          $result2 = mysqli_query($conn, $query1);

          while ($row = $result2->fetch_row()) {

              echo
                '     
       
                <div class="list-item list-item-even">
                ';
                echo"
          
                <img src='$row[5]' height='100' width='100' />
          ";


              echo

                "

                <div lass='list-item-name text-large'>$row[1]</div>


          <div class='list-item-price text-large'>$row[4]$</div>
";


              echo "
          <div class='list-item-buttons'>
            <button class='btn-primary' type='submit' value='$row[0]' name='cart'>Add to Cart</button>
            
            
            <button type=submit' style='border:none' name='remove' value='$row[0]'>
            <a href='#' class='remove'
              ><img src='/img/close_icon.png' height='35' width='35'
            /></a>
            </button>

           
          </div>
      </div>
      ";
            }
          }
          
        
      }
        if ($result==""||$result==null) {
         print("<h1>No current products to display, Add some products</h1>");
        }
     
         ?>
         
        
      </form>
       </div>
      
     


    </section>
    
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
    echo '<script> window.location.href="wishlist.php" </script>';
  }
else{
  echo 'Error:'.$query. "<br>".$conn->error;
}
   
   }
?>

<?php
//remove 
if (isset($_POST["remove"])) {
  $use=$_SESSION["username"];
  $ids=$_POST['remove'];
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "DELETE FROM `productssaved` WHERE `forwhich`='wish' AND `username`='$use' AND `productD`='$ids'";
  if ($conn->query($query) == TRUE) {
    echo '<script> window.location.href="wishlist.php"</script>';
}
else{
  echo 'Error:'.$query. "<br>".$conn->error;
}
   
   }
?>
