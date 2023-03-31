<?php
include('../config.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/slideshow.css">
        <link rel="stylesheet" href="../css/product_slider.css">
        <script src="https://kit.fontawesome.com/1935d064dd.js" crossorigin="anonymous"></script>
        <title>2nd Hand | Main Page</title>
        <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    </head>
<style>
	a:hover{color:#f5a623;}

  html {
  box-sizing: border-box;
}

  *, *:before, *:after {
  box-sizing: inherit;
}

  .column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 2px 50px 2px 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.wrapper{
    background: #fff;
    max-width: 950px;
    width: 100%;
    margin: 0 auto;
    border-radius: 15px;
    padding: 0px 25px25px;
}

h1{
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 20px;
}

.about-section{
    display: flex;
}

</style>

    <body>    
        <header class="header">
            <a href="#" class="logo"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="../visitor/register.php" style="color:#f5a623;font-weight:bold;">Register Now!</a></li>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../visitor/vProduct.php">Product</a></li>
	    <li><a href="../visitor/about_us.php">About</a></li>
    	    <li><a href="../visitor/login.php">Login</a></li>
        </ul>
        </header>
        <div class="about-section">
  <h3 style="color:white;">ABOUT US</h3>
</div>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="../images/about/buy.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Buy Desired 2nd-Hand Item</h2>
        <p>Find anything second hand through our website.</p>
        <p>Product can be searched by keywords, category and price.</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="../images/about/sell.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Sell Your Own 2nd-Hand Item</h2>
        <p>Submit your product information for selling.</p>
        <p>Any Completed Order will be charged 5% commissions.</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="../images/about/review.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>All Product Are Reviewed</h2>
        <p>Admin will review the product information first.</p>
        <p>Once the products are approved, they can start selling.</p>
      </div>
    </div>
  </div>
</div>
<div class="column">
    <div class="card">
      <img src="../images/about/call.jpeg" alt="John" style="width:100%">
      <div class="container">
        <h2>Feel Free To Contact Us</h2>
        <p>We hope you enjoy shopping with us!</p>
        <p>Email Address: B190195C@sc.edu.my</p>
        <p>Phone Number: 0125729873</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>