<?php
include('../config.php');
session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/slideshow.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/product_slider.css">
        <script src="https://kit.fontawesome.com/1935d064dd.js" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <title>Main Page | Seller</title>
        <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    </head>
    <style>

.banner {
    padding: 6em 0 8em 0;
    text-align: center;
  width: 100%;
  background-image: url("../images/about/seller_background.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: inset 0 0 0 2000px rgba(0,0,0,0.5);
}

.border {
    width: 60%;
    margin: 0 auto;
    height: 47px;
    border: 2px solid #fff;
  border-bottom: 0;
}
.banner h2 {
    margin: 0;
    font-size: 3em;
    color: #FFFFFF;
    text-align: center;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.5em;
    padding: 0.5em 0 0 0;
}

.banner p {
    color: #FFFFFF;
    font-size: 1em;
    font-weight: bold;
    margin: 1em 0 0 0;
    line-height: 2em;
    letter-spacing: 2px;
  padding: 0 0 2em 0;
}

.border-bottom {
    border-top: 0;
    border-bottom: 2px solid #fff !important;
}

a:hover{
  color:#f0a500;
}

    #lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -8px;
    }
    .badge {
      padding-left: 9px;
      padding-right: 9px;
      -webkit-border-radius: 9px;
      -moz-border-radius: 9px;
      border-radius: 9px;
    }

    .label-warning[href],
    .badge-warning[href] {
      background-color: #c67605;
    }

    </style>
    <body>
        <div>
        <header class="header">
            <a href="#" class="logo"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="../buyer/buyerMain.php" style="color:#f5a623;font-weight:bold;">Buyer Centre</a></li>
            <li><a href="sellerMain.php">Home</a></li>
            <li><a href="sellerProduct.php">My Product</a></li>
    		<li><a href="sellerOrder.php">My Order</a></li>
    		<li><a href="income.php">My Income</a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>
    </div>

    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="../images/logo/sellitem.png" style="width:100%">
      </div>
      
      </div>
      
      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
  </div>

  
  <div class="banner">
    <div class="border"> </div>
    <h2>5% Commission</h2>
    <p>charged by each completed order</span></p>
    <div class="border border-bottom"> </div>
  </div>

      <script rel="script" src="../javascript/product_slider.js"></script>
<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, 2nd Hand Shopping Platfrom</p>
</footer>
</body>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</html>