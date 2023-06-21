<?php

include('../checkout/checkout.php');

//session_start();
if (isset($_POST["submit"])) {
  $addname = $_POST["addname"];
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $country = $_POST["country"];
  $city = $_POST["city"];
  $number = $_POST["number"];
  $zip = $_POST["zip"];
  $ccname = $_POST["ccname"];
  $ccnumber = $_POST["ccnumber"];
  $ccExp = $_POST["ccExp"];
  $exyear = $_POST["exyear"];
  $zipcode = $_POST["zipcode"];
  $p = $price;


  $cinfo = ("card name " . $ccname . " card number " . $ccnumber . " expiry year " . $ccExp . " " . $exyear . " zip code " . $zipcode);
  $conn = mysqli_connect("localhost", "root", "", "ecommarce");

  $use = $_SESSION["username"];
  $duplicate = mysqli_query($conn, "SELECT * FROM `address` WHERE `nameA` = '$addname'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
      "<script> alert('Change address name'); </script>";
  } else {

    $query3 = "SELECT `productD` FROM `productssaved` WHERE `username`='$use' AND `forwhich`='cart';";
    $result= mysqli_query($conn, $query3);
   
   while ($row = $result->fetch_row()) {
    foreach ($row as $v) {

        $q = 1;
        //print($v);
        $query2 = "INSERT INTO `orders`(`productD`, `username`, `quantity`) VALUES ('$v','$use','$q')";
        if ($conn->query($query2) == TRUE) {

        } else {
          echo 'Error:' . $query . "<br>" . $conn->error;
        }
      }
    }


    $query = "INSERT INTO `address`(`nameA`, `username`, `country`, `city`, `description`, `phone`, `email`) 
    VALUES ('$addname','$use','$country','$city','$address','$number','$email')";

    
$query1 = "INSERT INTO `payment`(`username`, `address`, `cardinfo`,  `price`) 
      VALUES ('$use','$addname','$cinfo','$p')";



    if ($conn->query($query1) == TRUE && $conn->query($query) == TRUE) {

     
            echo '<script> window.location.href="/home/home.php"</script>';
          } else {
            echo 'Error:' . $query . "<br>" . $conn->error;
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
    <title>The Golden Finch</title>
    <link rel="stylesheet" href="/styles.css" />
    
    <script>
function scroll(){
window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: "smooth" });
}

      </script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      var cityList=[];
      $(document).on('keyup','#city-payment',function(){
        var cityName=$("#city-payment").val();

        var xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if (this.readyState==4 && this.status==200) {
                cityList=[];
                ArrayToXML(this , cityName);
            }
        };
        xhttp.open("GET","cities.xml",true);
        xhttp.send();
      });

      function ArrayToXML(xml,factor) {
          var factor;
          var cityListDoc=xml.responseXML;
          var each_city=cityListDoc.getElementsByTagName("city");
          var ct=0;
          for (var i=0;i<each_city.length;i++) {
              var indx = each_city[i].childNodes[0].nodeValue.trim();
              var each=indx.substring(0,factor.length);
                if(factor.toUpperCase()==each.toUpperCase() && ct<10){
                  cityList.push(indx);
                  ct++;
                }
          }
          $("#city-payment").autocomplete({
                source:cityList
          });
      }

      $(function(){
        $("#city-payment").autocomplete({
          source:cityList
        });
      });
    </script>
    <script>
      var cityList=[];
      $(document).on('keyup','#country-payment',function(){
        var cityName=$("#country-payment").val();

        var xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if (this.readyState==4 && this.status==200) {
                cityList=[];
                ArrayToXML(this , cityName);
            }
        };
        xhttp.open("GET","countries.xml",true);
        xhttp.send();
      });

      function ArrayToXML(xml,factor) {
          var factor;
          var cityListDoc=xml.responseXML;
          var each_city=cityListDoc.getElementsByTagName("country");
          var ct=0;
          for (var i=0;i<each_city.length;i++) {
              var indx = each_city[i].childNodes[0].nodeValue.trim();
              var each=indx.substring(0,factor.length);
                if(factor.toUpperCase()==each.toUpperCase() && ct<10){
                  cityList.push(indx);
                  ct++;
                }
          }
          $("#country-payment").autocomplete({
                source:cityList
          });
      }

      $(function(){
        $("#country-payment").autocomplete({
          source:cityList
        });
      });
    </script>
  </head>
  <body onload="scroll()">
    
    <form action="#" method="POST">

    <div class="payment">
      <h1 class="payment-title text-white text-larger">Payment</h1>

      <div class="payment_form">
        <div class="payment-right">
          <h2 class="billing-title text-white">Billing Address</h2>
          <input
            class="input-primary input-primary-big"
            type="text"
            id="addname"
            name="addname"
            required
            placeholder="Address Name"
          />
          
          <input
            class="input-primary input-primary-big"
            type="text"
            id="fullname"
            required
            name="fullname"
            placeholder="Full Name"
          />
          <input
            class="input-primary input-primary-big"
            id="email"
            type="email"
            name="email"
            required
            placeholder="Email Address"
          />
          <input
            class="input-primary input-primary-big"
            type="text"
            id="address"
            name="address"
            required
            placeholder="Address"
          />
          <div class="row">
            <input
              type="text"
              class="input-primary input-primary-med"
              id="country-payment"
              name="country"
              required
              placeholder="Country"
            />
            <input
              type="text"
              class="input-primary input-primary-med"
              id="city-payment"
              name="city"
              required
              placeholder="City"
            />
          </div>
          <div class="row">
            <input
              type="text"
              id="phone-number"
              required
              name="number"
              class="input-primary input-primary-med"
              placeholder="Phone Number"
            />
            <input
              type="text"
              id="zip-code"
              required
              name="zip"
              class="input-primary input-primary-med"
              placeholder="Zip Code"
            />
          </div>
        </div>
        <div class="payment-left">
          <h2 class="billing-title text-white">Card Information</h2>
          <img src="../img/card_img.png" class="payment-img" />
          <input
            class="input-primary input-primary-big"
            type="text"
            id="ccName"
            name="ccname"
            required
            placeholder="Name on Card"
          />
          <input
            class="input-primary input-primary-big"
            type="tel"
            inputmode="numeric"
            maxlength="19"
            pattern="[0-9\s]{13,19}"
            id="ccNumber"
            required
            autocomplete="cc-number"
            name="ccnumber"
            placeholder="Credit Card Number"
          />
          <input
            class="input-primary input-primary-big"
            type="number"
            id="ccExp"
            min=1
            required
            max=12
            name="ccExp"
            placeholder="Expiry Month"
          />
          <div class="row">
            <input
              type="text"
              id="expiry-year"
              name="exyear"
              required
              class="input-primary input-primary-med"
              placeholder="Expiry Year"
            />
            <input
              type="text"
              id="zip-code"
              required
              name="zipcode"
              class="input-primary input-primary-med"
              placeholder="Zip Code"
            />
          </div>
        </div>
      </div>
      <button type="submit" name="submit" class="btn-primary payment_btn" id="button-submit">
        Place Your Order
      </button>
    </div>
</form>
  </body>
</html>

