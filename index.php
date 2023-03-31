<?php
include('config.php');
$sql="select * from product where shelf='on' and quantity>0 ORDER BY price;";
$result=$conn->query($sql);
?>
<html>
    <head>
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/slideshow.css">
        <link rel="stylesheet" href="css/product_slider.css">
        <script src="https://kit.fontawesome.com/1935d064dd.js" crossorigin="anonymous"></script>
        <title>2nd Hand | Main Page</title>
        <link rel="icon" href="images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    </head>
<style>
	a:hover{color:#f5a623;}
</style>

    <body>    
        <header class="header">
            <a href="#" class="logo"><img src="images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="visitor/register.php" style="color:#f5a623;font-weight:bold;">Register Now!</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="visitor/vProduct.php">Product</a></li>
	    <li><a href="visitor/about_us.php">About</a></li>
    	    <li><a href="visitor/login.php">Login</a></li>
        </ul>
        </header>
    

<div class="slideshow-container">

        <div class="mySlides fade">
          <img src="images/logo/second1.jpg" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="images/logo/second2.jpg" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="images/logo/second3.jpg" style="width:100%">
        </div>
        
        </div>
        
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
    </div>

    <main>
        <div class="slide-container">
        <img id="slide-left" class="arrow" src="images/logo/arrow-left.png">
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
          <img src="images/<?php echo $image;?>" alt="" width="180px" height="180px">
          <div class="product-details">
              <h2 style="color: #7c795d; font-family: 'Trocchi', serif; font-weight: normal; white-space: nowrap; 
  width: 170px; 
  overflow: hidden;
  text-overflow: ellipsis;text-align:center; "><?php echo $title;?></h2>
              <p style="color:#dd9520;font-weight:bold;"> <span></span> RM <?php echo $price;?></p>
              <a href='visitor/product_detail.php?pid=<?php echo $id;?>'>Check Details</a>
          </div>
      </div>

      <?php
        }
            }
      ?>
      
  </section>
    <img id="slide-right" class="arrow" src="images/logo/arrow-right.png">
</div>
</main>

        <script rel="script" src="javascript/product_slider.js"></script>

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