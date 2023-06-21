
<?php
         require('../config.php');   
        if(!empty($_SESSION["id"])){
          header("Location: ../index.php");
        }

if (isset($_POST["submit"])) {

           
          $name = $_POST["name"];
          $message = $_POST["message"];
                  $email = $_POST["contactUs_email"];
                  
               $query = "INSERT INTO `contactus`( `name`, `email`, `meassge`) VALUES ('$name','$email','$message')";
                  
               if (mysqli_query($conn,$query)) {
                        echo '<script> window.location="../home/home.php"; </script>';
                    }
                    else{
                echo '<script> alert("TRY AGAIN!"); </script>';
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





    <div class="body">
      <form action="#" method="POST" class="contactUs">
        <div class="contactUs_header">
          <h2 class="contactUs_heading">Contact Us</h2>
          <img src="/img/contact-icon.png" alt="" />
        </div>
        <!-- <form action="#" method="POST"> -->

        <div class="contactUs_up">
          <input
            type="text"
            name="name"
            id="name"
            placeholder="Enter your name"
            class="input-primary input-primary-small"
          />
          <input
            type="email"
            name="contactUs_email"
            id="contactUs_email"
            placeholder="Enter your email"
            class="input-primary input-primary-small"
          />
        </div>
        <textarea
          name="message"
          id="message"
          cols="60"
          rows="10"
          placeholder="What can we help you with?"
          class="input-primary input-primary-big"
        ></textarea>
        <button type="submit" name="submit" class="btn-primary">Send your message</button><br>
      <!-- </form> -->

        </form>
    </div>
    <!-- <script>
      function successForm() {
          var s = true;	

          if(!$("#name").val()) {
            $("#name").css('box-shadow','0 0 5px red');
            s = false;
          }
          if(!$("#contactUs_email").val()) {
            $("#contactUs_email").css('box-shadow','0 0 5px red');
            s = false;
          }
          
          if(!$("#message").val()) {
            $("#message").css('box-shadow','0 0 5px red');
            s = false;
          }
          
          return s;
    }

    function successfulContactForm() {
      var s=successForm();
      if(s) {
        jQuery.ajax({
          url: "contactUsdb.php",
          data:'name='+$("#name").val()+'&contactUs_email='+$("#contactUs_email").val()+'&message='+$("#message").val(),
          type: "POST",
              success:function(data){
                $("#mail-status").html(data);
              },
              error:function (){
                print( '<script> alert("TRY AGAIN!"); </script>';);
              }
		});
	}
}
    </script> -->
  </body>
</html>