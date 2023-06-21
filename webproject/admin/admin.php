<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="x-icon" href="/img/finchLogo.png" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Golden Finch</title>
    <link rel="stylesheet" href="/styles.css" />
  </head>
  <body>

  <nav class="adminNav">
    <img src="/img/thegoldenfinch-transformed.png" alt="LOGO" height="110" width="220" />

    <div class="adminOptions">
      <a class="adminPageOption" onclick="openProduct()">Products</a>
      <a class="adminPageOption" onclick="openOrder()">Orders</a>
    </div>

    <!--filter -->

    <div class="adminFilter">
      <form method="POST" action="#">
        <select class="adminFilterList" name="filtering" id="filter_option">
          <option class="adminFilterOption" value="none" selected hidden disabled>
            Select Filter
          </option>
          <option class="adminFilterOption" value="lowToHigh">
            Price: Low to High
          </option>
          <option class="adminFilterOption" value="hightToLow">
            Price: High to Low
          </option>
          <option class="adminFilterOption" value="AZ">
            Alphabetical: A to Z
          </option>
          <option class="adminFilterOption" value="ZA">
            Alphabetical: Z to A
          </option>
        </select>
        <button type="submit" name="filter">
          <div class="adminFilterIcon"><img src="/img/filter_icon.png" height="30" /></div>
        </button>
      </form>
    </div>
  </nav>

  <div class="adminView">
    <div class="adminPlist" id="ProductList">
      <a class="btn-primary" style="position: absolute; top: 2%; right: -45%;;" onclick="openPopupAdd()">Add Product</a>


      <!--  ALL PRODUCTS + filtering -->

      <form method="post" action="#">

        <?php
        session_start();
        $conn = mysqli_connect("localhost", "root", "", "ecommarce");

        if (isset($_POST['filter'])) {
          if (!empty($_POST['filtering'])) {
            $selected = $_POST['filtering'];
            if ($selected == "lowToHigh") {
              $query = "SELECT * FROM product WHERE 1 ORDER BY `price` ASC;";
            }
            if ($selected == "hightToLow") {
              $query = "SELECT * FROM product WHERE 1 ORDER BY `price` DESC;";
            }
            if ($selected == "AZ") {
              $query = "SELECT * FROM product WHERE 1 ORDER BY `name` ASC;";
            }
            if ($selected == "ZA") {
              $query = "SELECT * FROM product WHERE 1 ORDER BY `name` DESC;";
            }
          }
        } else {
          $query = "SELECT * FROM product WHERE 1;";
        }
        if (empty($query)) {
          $query = "SELECT * FROM product WHERE 1;";
        }
        $result = mysqli_query($conn, $query);

        while ($row = $result->fetch_row()) {

          echo
            '
          <div class="adminProduct">
          ';
          echo"
          <img src='$row[5]' height='250' width='150' class='pimg' />
          ";
          echo'
          <div class="adminProductDetails">
            <div class="details_col">
              <p class="details_text t1">name:</p>
              ';
          echo "$row[1]";
          echo '
              <p id="pName" class="details_text">
             
            </div>
            <div class="details_col">
              <p class="details_text t1">category:</p>
              <p id="pName" class="details_text">
              ';
          echo "$row[2]</p>";
          echo '
            </div>
            <div class="details_col">
              <p class="details_text t1">price:</p>
              <p id="pName" class="details_text">
              ';
          echo "$row[4]$</p>";
          echo '
            </div>
          </div>
          <div class="productIcons">
          ';


          echo "
            <button style = ' background-color: transparent; border: none' type='submit' value='$row[0]' name='remove'>
            ";
          echo '
            <img
              style="cursor: pointer"
              src="/img/closeIconWhite.png"
              height="40"
              class="adminProductRemove"
              id="remove"
            />
            </button>
          </div>
        </div>

          ';

        }

        ?>
      </form>
    </div>
    <div class="adminOlist" id="OrderList">

    <form method="POST" action="#">
      <!--  orders -->

      <?php
      $conn = mysqli_connect("localhost", "root", "", "ecommarce");
      $query = "SELECT `username`,COUNT(`productD`) FROM `orders` GROUP BY `username`";
      $result = mysqli_query($conn, $query);
      $row = $result->fetch_all();
      foreach ($row as $v) {
        echo '
        <div class="adminOrder">
        <div class="adminOrderDetails">
          <div class="details_col">
            <p class="details_text t1">Username:</p>
            <p id="userOrder" class="details_text">';

        echo "$v[0]</p>";
        echo '
        </div>
        <div class="details_col">
          <p class="details_text t1">Number of Items:</p>
          <p id="nItems" class="details_text">
        ';

        echo "$v[1]</p>";

        echo '</div>
        <div class="details_col">
          <p class="details_text t1">Total:</p>
          <p id="total" class="details_text">';

        $query1 = "SELECT `price` FROM `payment` WHERE `username`='$v[0]'";
        $result1 = mysqli_query($conn, $query1);
        $row1 = $result1->fetch_row();
        foreach ($row1 as $s) {
          echo "$s$</p> </div>
          </div>";
          echo "<button  style='background-color: transparent; border:none' type='submit' value='$v[0]' name='details'> 
          <div class='orderIcons'>
          <a href='#' id='viewOrder' onclick='openPopup()'
           value='$v[0]' name='details' class='btn-primary'
            >View Details</a
          >
        </div>
        </button>
      </div>";
        }

      }
      ?>
      </form>
    </div>
  </div>
  </div>

  <script src="admin.js"></script>



  <!-- ADD PRODUCT -->
  <form action="#" method="post" class="addPop" id="addPop">
    <img src="/img/close_icon.png" alt="close" class="addClose" onclick="closePopupAdd()" />
    <p>Please Note that you can not enter `'` (single quotations)</p>
    <label class="addLabel" for="name">Image:</label>
    <input class="addInput" type="text" name="image" id="name" />
    <label class="addLabel" for="name">Name:</label>
    <input class="addInput" type="text" name="name" id="name" />
    <label class="addLabel" for="category">Category:</label>
    <input class="addInput" type="text" name="category" id="category" />
    <label class="addLabel" for="price">Price:</label>
    <input class="addInput" type="text" name="price" id="price" />
    <label class="addLabel" for="description">Description:</label>
    <textarea class="addtextarea" type="text" name="description" id="description"></textarea>
    <button class="btn-primary addButton" type="submit" name="add">Add Product</button>
  </form>


  <?php
$conn = mysqli_connect("localhost", "root", "", "ecommarce");
if (isset($_POST['add'])) {
  $name = $_POST["name"];
  $cat = $_POST['category'];
  $price = $_POST["price"];
  $des = $_POST['description'];
    $image = $_POST['image'];

  $query = "INSERT INTO `product`(`name`, `category`, `description`, `price`, `img`) VALUES ('$name','$cat','$des','$price','$image')";
  if (mysqli_query($conn, $query)) {
    
    echo '<script> window.location="admin.php"; </script>';
  } else {
    echo '<script> alert("TRY AGAIN!"); </script>';
  }
}
?>


  <!-- VIEW DETAILS -->



  <!-- VIEW DETAILS -->

  <div class="popup" id="popup">
    <img src="/img/close_icon.png" class="popupClose" id="closePop" onclick="closePopup()" />

    <?php
     $conn = mysqli_connect("localhost", "root", "", "ecommarce");
    if (isset($_POST["details"])) {
      $username = $_POST["details"];
      $query = "SELECT `productD` FROM `orders` WHERE `username`='$username'";
      $result = mysqli_query($conn, $query);
      $row = $result->fetch_all();
      foreach ($row as $v) {
        $query1 = "SELECT * FROM `product` WHERE `productID`='$v[0]'";
        $result1 = mysqli_query($conn, $query1);
        $row1 = $result1->fetch_all();
        foreach ($row1 as $s) {
          echo "
          <div class='adminProduct_popup'>
          <img src='$s[5]' width='140' height='170' class='pimg' />
         ";
         echo' <div class="adminProductDetails">
          <div class="details_col">
          <p class="details_text t1">name:</p>
          <p id="pName" class="details_text">
          ';
          echo " $s[1]</p>
          </div>";
          echo '
          <div class="details_col">
          <p class="details_text t1">category:</p>
          <p id="pName" class="details_text">
          ';
          echo "$s[2]</p>
          </div>";
          echo'
          <div class="details_col">
          <p class="details_text t1">price:</p>
          <p id="pName" class="details_text">
          ';
          echo "$s[4]$</p>
          </div>";
          echo'
          <div class="details_col">
          <p class="details_text t1">description:</p>
          <p id="pName" class="details_text">';
          echo"
          $s[3]</p>
          </div>
          </div>
          </div>
          ";
        }
      }
    }
?>
    
  </div>
</body>
<script src="admin.js"></script>

</html>

<?php
//remove 
if (isset($_POST["remove"])) {
  $ids = $_POST['remove'];
  print($ids);
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");
  $query = "DELETE FROM `product` WHERE `productID`='$ids'";
  if ($conn->query($query) == TRUE) {
    echo '<script> window.location.href="admin.php"</script>';
  } else {
    echo 'Error:' . $query . "<br>" . $conn->error;
  }

}
?>