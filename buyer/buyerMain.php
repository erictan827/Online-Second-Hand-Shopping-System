<?php
include('../config.php');

session_start();
$email = $_SESSION['email'];

$sql="select * from product where shelf='on' ORDER BY price;";
$result=$conn->query($sql);

$sqli = "SELECT COUNT(*) AS countquantity FROM cart WHERE email='$email'";
$duration = $conn->query($sqli);
$record = $duration->fetch_array();
$totalquantity = $record['countquantity'];
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/slideshow.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/product_slider.css">
        <script src="https://kit.fontawesome.com/1935d064dd.js" crossorigin="anonymous"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <title>2nd Hand | Welcome!</title>
        <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    </head>
    <style>

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
            <li><a href="../seller/sellerMain.php" style="color:#f5a623;font-weight:bold;">Seller Centre</a></li>
            <li><a href="buyerMain.php">Home</a></li>
            <li><a href="buyerProduct.php">Product</a></li>
    		    <li><a href="order.php">Order</a></li>
    		    <li><a href="buyerProfile.php">Profile</a></li>
            <li><a href="about_us.php">About</a></li>
            <li style="list-style-type: none;"><a href="chat.php"><i class="fa fa-comment"></i></a></li>
            <li style="list-style-type: none;"><a href="cart.php"><i class="fa fa-shopping-cart"></i> <span class='badge badge-warning' id='lblCartCount'><?php echo $totalquantity; ?></span></a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>
    </div>

    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="../images/logo/second1.jpg" style="width:100%">
      </div>
      
      <div class="mySlides fade">
        <img src="../images/logo/second2.jpg" style="width:100%">
      </div>
      
      <div class="mySlides fade">
        <img src="../images/logo/second3.jpg" style="width:100%">
      </div>
      
      </div>
      
      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
  </div>

  <main>
      <div class="slide-container">
      <img id="slide-left" class="arrow" src="../images/logo/arrow-left.png">
  <section class="container" id="slider">
  <?php
                        if ($result->num_rows > 0) {    
                            while($row = $result->fetch_assoc()) {
                                //display result
                                $id=$row['id'];
                                $title=$row['title'];
                                $description=$row['description'];
                                $quantity=$row['quantity'];
                                $price=$row['price'];
                                $image=$row['image'];
                    ?>
      <div class="thumbnail">
          <img src="../images/<?php echo $image;?>" alt="" width="180px" height="180px">
          <div class="product-details">
          <h2 style="color: #7c795d; font-family: 'Trocchi', serif; font-weight: normal; white-space: nowrap; 
  width: 170px; 
  overflow: hidden;
  text-overflow: ellipsis;text-align:center; "><?php echo $title;?></h2>
              <p style="color:#dd9520;font-weight:bold;"> <span></span> RM <?php echo $price;?></p>
              <a href='product_detail.php?pid=<?php echo $id;?>'>Check Details</a>
          </div>
      </div>

      <?php
        }
            }
      ?>
      
  </section>
  <img id="slide-right" class="arrow" src="../images/logo/arrow-right.png">
</div>
</main>

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