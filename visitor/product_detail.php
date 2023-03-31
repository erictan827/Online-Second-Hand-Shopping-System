<?php
include('../config.php');
session_start();

if(isset($_GET['pid'])){//if received pid from other page
    $pid=$_GET['pid'];
    $sql="select product.*, category.name from product left join category on product.category=category.ID where product.id='$pid'";
    $result=$conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">


<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<style>
   #lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px;
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


html {
  width: 100%;
  height:100%;
  scroll-behavior: smooth;
  box-sizing: border-box;
  font-size:62.5%;
}

body {
  font-family: "Poppins", sans-serif;
  font-size: 1.6rem;
  font-weight: 400;
  color: #243a6f;
  position: relative;
  z-index: 1;
}

h1,
h2,
h3,
h4 {
  font-weight: 500;
}

img {
  max-width: 100%;
}

li {
  list-style: none;
}

.container {
  max-width: 120rem;
  margin: 0 auto;
}

.container-md {
  max-width: 100rem;
  margin: 0 auto;
}

@media only screen and (max-width: 1200px) {
  .container {
    padding: 0 3rem;
  }

  .container-md {
    padding: 0 3rem;
  }
}

/* Adverts */
.section {
  padding: 5rem 0 5rem 0;
}

.advert-center {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
  gap: 3rem;
}

.advert-box {
  position: relative;
  color: #fff;
  height: 27rem;
  border-radius: 1rem;
  padding: 1.6rem;
  overflow: hidden;
  z-index: 1;
}

.advert-box img {
  position: absolute;
  bottom: 0%;
  left: -20%;
  height: 100%;
  width: 35rem;
  z-index: -1;
}

.advert-box:nth-child(1) {
  background-color: #f5c5d1;
}

.advert-box:nth-child(2) {
  background-color: #a1d1df;
}

.advert-box:nth-child(3) {
  background-color: #e5bc00;
}

.advert-box .dotted {
  position: relative;
  height: 100%;
  border: 2px dashed #f1f1f1;
  border-radius: 1rem;
}

.advert-box .content {
  position: absolute;
  top: 50%;
  right: 5%;
  transform: translate(0, -50%);
}

.advert-box .content h2,
.advert-box .content h4 {
  text-shadow: 5px 6px 0px rgba(37, 59, 112, 0.1);
}

.advert-box .content h2 {
  line-height: 1.2;
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.advert-box .content h4 {
  font-size: 1.5rem;
  text-transform: capitalize;
}

/* Featured Products */

.title {
  margin: 4rem 0 7rem 0;
  text-align: center;
}

.title h1 {
  font-size: 3rem;
  display: inline-block;
  position: relative;
  z-index: 0;
}

.title h1::after {
  content: "";
  position: absolute;
  left: 50%;
  bottom: -20%;
  transform: translate(-50%, -50%);
  background-color: var(--pink);
  width: 50%;
  height: 0.4rem;
  z-index: 1;
}

/* Product */
.product-center {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
  gap: 7rem 3rem;
}

.product {
  height: 48rem;
  background-color: #fff;
  box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
  border-radius: 1rem;
  text-align: center;
  transition: all 300ms ease-in-out;
}

.product:hover {
  box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.25);
}

.product-header {
  position: relative;
  height: 35rem;
  background-color: #f6f2f1;
  transition: all 300ms ease-in-out;
  z-index: 0;
}

.product-header img {
  height: 100%;
}

.product-footer {
  padding: 2rem 1.6rem 1.6rem 1.6rem;
}

.product-footer h3 {
  font-size: 2.2rem;
}

.rating {
  color: #43b3d9;
}

.product-footer .price {
  color: #ff7c9c;
  font-size: 2rem;
}

.product:hover .product-header::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  border-radius: 1rem 1rem 0 0;
  background-color: rgba(0, 0, 0, 0.5);
  transition: all 500ms ease-in-out;
  z-index: 1;
}

.product-header .icons {
  position: absolute;
  right: 5%;
  top: 50%;
  transform: translate(0, -50%) scale(0);
  z-index: 2;
  opacity: 0;
  transition: all 500ms ease-in-out;
}

.product:hover .icons {
  opacity: 1;
  transform: translate(0, -50%) scale(1);
}

.product-header .icons a {
  display: block;
  margin-bottom: 1rem;
}

/* Exclusive Product */
.product-banner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  height: 50rem;
  background-color: #243a6f;
}

.product-banner .left img {
  object-fit: cover;
  height: 100%;
}

.product-banner .right {
  align-self: center;
  text-align: center;
  padding: 1.6rem;
}

.product-banner .content h2 {
  color: #fbb419;
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.product-banner .content .discount {
  color: #b888ff;
}

@media only screen and (max-width: 768px) {
  .product-banner {
    grid-template-columns: 1fr;
  }

  .product-banner .left {
    display: none;
  }

  .product-banner .content h2 {
    font-size: 2rem;
  }

  .product-banner .content a {
    padding: 1rem 3rem;
  }
}

/* Testimonials */
.testimonial-center {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
  gap: 6rem;
}

.testimonial {
  position: relative;
  padding: 5rem;
  background-color: #fff;
  box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
  transition: all 300ms ease-in-out;
  text-align: center;
  border-radius: 0.5rem;
}

.testimonial:hover {
  box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.2);
  transform: translateY(-1rem);
}

.testimonial span {
  position: absolute;
  top: 2%;
  left: 50%;
  font-size: 12rem;
  font-family: sans-serif;
  color: #ff7c9c;
  line-height: 1;
  transform: translate(-50%, 0);
}

.testimonial p {
  margin: 2rem 0 1rem 0;
}

.testimonial .rating {
  margin-bottom: 1rem;
}

.testimonial .img-cover {
  border-radius: 50%;
  width: 8rem;
  height: 8rem;
  overflow: hidden;
  margin: 0 auto;
}

.testimonial .img-cover img {
  height: 100%;
  object-fit: cover;
}

.testimonial h4 {
  margin-top: 1rem;
}

/* Brands */
.brands-center {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 3rem;
}

.brand {
  height: 8rem;
  width: 8rem;
  margin: 0 auto;
}

.brand img {
  object-fit: contain;
}

@media only screen and (max-width: 768px) {
  .brands-center {
    grid-template-columns: repeat(3, 1fr);
  }
}

/* All Products */
.section .top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 4rem;
}

.all-products .top select {
  font-family: "Poppins", sans-serif;
  width: 20rem;
  padding: 1rem;
  border: 1px solid #ccc;
  appearance: none;
  outline: none;
}

form {
  position: relative;
  z-index: 1;
}


@media only screen and (max-width: 768px) {
  .all-products .top select {
    width: 15rem;
  }
}

/* Pagination */
.pagination {
  padding: 3rem 0 5rem 0;
}

/* Detail */
.product-detail .details {
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 7rem;
}

.product-detail .left {
  display: flex;
  flex-direction: column;
}

.product-detail .left .main {
  text-align: center;
  background-color: #f6f2f1;
  height: 45rem;
}

.product-detail .left .main img {
  object-fit: contain;
  height: 100%;
}

.product-detail .thumbnails {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
}

.product-detail .thumbnail {
  width: 10rem;
  height: 10rem;
  background-color: #f6f2f1;
  text-align: center;
}

.product-detail .thumbnail img {
  height: 100%;
  object-fit: contain;
}

.product-detail .right h1 {
  font-size: 4rem;
  line-height: 1.2;
  margin-bottom: 2rem;
}

.product-detail .right .price {
  font-size: 600;
  font-size: 2rem;
  color:#ee4d2d;
  margin-bottom: 2rem;
}

.product-detail .right div {
  display: inline-block;
  position: relative;
  z-index: 1;
}

.product-detail .right select {
  font-family: "Poppins", sans-serif;
  width: 20rem;
  padding: 0.7rem;
  border: 1px solid #ccc;
  appearance: none;
  outline: none;
}

.product-detail form {
  
}

.product-detail .form {
  margin-bottom: 3rem;
}

.product-detail .form input[type="number"] {
  padding: 0.8rem;
  text-align: center;
  width: 7.5rem;
  margin-right: 2rem;
}

.product-detail .form input[type="submit"] {
  text-align: center;

}

.product-detail .form .addCart{
  background: #ee4d2d;
  box-shadow:none;
  padding: 0.8rem 4rem;
  color: white;
  border-radius: 3rem;
  text-decoration:none;
}

.product-detail .form .addCart:hover {

        background-color: red;

}

.product-detail h3 {
  text-transform: uppercase;
  margin-bottom: 2rem;
}

@media only screen and (max-width: 996px) {
  .product-detail .left {
    width: 30rem;
    height: 45rem;
  }

  .product-detail .details {
    gap: 3rem;
  }

  .product-detail .thumbnails {
    width: 30rem;
    gap: 0.5rem;
  }

  .product-detail .thumbnail {
    width: auto;
    height: 10rem;
    background-color: #f6f2f1;
    text-align: center;
    padding: 0.5rem;
  }
}

@media only screen and (max-width: 650px) {
  .product-detail .details {
    grid-template-columns: 1fr;
  }

  .product-detail .right {
    margin-top: 10rem;
  }

  .product-detail .left {
    width: 100%;
    height: 45rem;
  }

  .product-detail .details {
    gap: 3rem;
  }

  .product-detail .thumbnails {
    width: 100%;
    gap: 0.5rem;
  }
}

/* Cart Items */
.cart {
  margin: 10rem auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

.cart-info {
  display: flex;
  flex-wrap: wrap;
}

th {
  text-align: left;
  padding: 0.5rem;
  color: #fff;
  background-color: #fc7c7c;
  font-weight: normal;
}

td {
  padding: 1rem 0.5rem;
}

td input {
  width: 5rem;
  height: 3rem;
  padding: 0.5rem;
}

td a {
  color: orangered;
  font-size: 1.4rem;
}

td img {
  width: 8rem;
  height: 8rem;
  margin-right: 1rem;
}

.total-price {
  display: flex;
  justify-content: flex-end;
  align-items: end;
  flex-direction: column;
  margin-top: 2rem;
}

.total-price table {
  border-top: 3px solid #fc7c7c;
  width: 100%;
  max-width: 35rem;
}

td:last-child {
  text-align: right;
}

th:last-child {
  text-align: right;
}

@media only screen and (max-width: 567px) {
  .cart-info p {
    display: none;
  }
}

.good{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;
}
.good li{
    margin: 0 10px;
}
.good a{
    text-decoration: none;
    color: #fff;
}

.good a:hover {
    color: #f5a623;
}

 /* Style the buttons */
 .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        color:white;
        background-color: #435c70;
        cursor: pointer;
        font-size: 18px;
        }

        /* Style the active class, and buttons on mouse-over */
        .active, .btn:hover {
        background-color: #666;
        color: #f5a623;
        }

</style>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->

  <!-- Custom StyleSheet -->
  <title>2nd Hand | Product Details</title>
  <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
</head>

<body onload="fScrollMove('div_scroll');" onunload="document.forms(0).submit()";>
<header class="header">
            <a href="#" class="logo" ><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
      <ul class="menu">
            <li><a href="../visitor/register.php" style="color:#f5a623;font-weight:bold;margin-top:-2px;">Register Now!</a></li>
            <li><a href="../index.php" style="color:white;margin-top:-2px;">Home</a></li>
            <li><a href="../visitor/vProduct.php" style="color:white;margin-top:-2px;">Product</a></li>
            <li><a href="../visitor/about_us.php" style="color:white;margin-top:-2px;">About</a></li>
            <li><a href="../visitor/login.php" style="color:white;margin-top:-2px;">Login</a></li>
        </ul>
        </header>

<div style="background:white;">

  <?php
		     if($result->num_rows>0){
		        while($row = $result->fetch_assoc() ){ //display result
			       $id=$row['id'];
             $title=$row['title'];
			       $description=$row['description'];
			       $quantity=$row['quantity'];     
			       $price=$row['price'];
			       $image=$row['image'];
             $category=$row['category']; 
             $seller_id=$row['seller_id']; 
             $seller_username=$row['seller_username']; 
	      ?>


  <!-- Product Details -->
  <section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="../images/<?php echo $image; ?>" alt="">
        </div>
        
      </div>
      <div class="right">
        <span>Home/<?php echo $category; ?></span>
        <h1><?php echo $title; ?></h1>
        <div class="price">RM <?php echo $price; ?></div>
        <form>
          <div>
          <h5 style="color:red;">Available stock : <?php echo $quantity; ?></h5>
          </div>
        </form>

        <form class="form" method="POST">
          
          <input type="hidden"name="id" value="<?php echo $row['id'];?>"/>
          <input type="hidden" value="<?php echo $title; ?>" name="title">
          <input type="hidden" value="<?php echo $description; ?>" name="description">
          <input type="hidden" value="<?php echo $category; ?>" name="category">
          <input type="hidden" value="<?php echo $price; ?>" name="price">
          <input type="hidden" value="<?php echo $image; ?>" name="image">
          <input type="hidden" value="<?php echo $seller_id; ?>" name="seller_id">
          
          
        <h3>Product Detail</h3>
        <p><?php echo $description; ?></p>
        <br>
        <br>
        <br>
        <p style="color:blue;">Please <a href="login.php" style="color:blue;">Log in</a> to buy this product.</p>
      </div>
    </div>
  </section>

  <?php
							} //end while loop
						}	// end if statement
					?>


<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, 2nd Hand Shopping Platfrom</p>
</footer>
          

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>

<?php

if(isset($_POST['durant'])){
    $id = $_POST['id'];

    $select = "DELETE FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Product Deleted!");';
    echo 'window.location.href = "ApproveList.php"';
    echo '</script>';
}
?>

<?php

if(isset($_POST['addcart'])){
  $email = $_SESSION['email'];
  $id = $_POST['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $image = $_POST['image'];
  $category = $_POST['category'];
  $seller_id = $_POST['seller_id'];
  $ikey = $id.$email;
  $totalprice = $price*$quantity;

  $query="UPDATE cart SET quantity = $quantity, totalPrice = price * quantity WHERE id='$id'AND email='$email'";
  $result = mysqli_query($conn, $query);


  /*$query = "SELECT * FROM product WHERE id='$id'";
  $result=$conn->query($query);
  $rows = $result->num_rows;
  for($j = 0; $j < $rows; $j++){
      $row = $result->fetch_array(MYSQLI_NUM);
      echo "<tr>";
      for($k = 0; $k < 8; $k++){
          echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
          $r0 = htmlspecialchars($row[0]);
          $r1 = htmlspecialchars($row[1]);
          $r2 = htmlspecialchars($row[2]);
          $r3 = htmlspecialchars($row[3]);
          $r4 = htmlspecialchars($row[4]);
          $r5 = htmlspecialchars($row[5]);
          $r6 = htmlspecialchars($row[6]);
          $r7 = htmlspecialchars($row[7]);
      }
  }echo $r7;echo $r7;echo $r7;
  
  $query = "INSERT INTO cart (id, title, description, quantity, price, image, category, available) VALUES ('6665', '$r1', '$r2', '$r3', '$r4', '$r5', '$r6', '$r7')";
$result=$conn->query($query);
*/
/*
echo $id;
  echo $title;
  echo $description;
  echo $quantity;
  echo $price;
  echo $category;
  echo $image;*/

  $query = "INSERT INTO cart (id, title, description, quantity, price, image, category, totalPrice, email, ikey,seller_id) VALUES ('$id', '$title', '$description', '$quantity', '$price', '$image', '$category', '$totalprice', '$email', '$ikey','$seller_id')";
  $result = mysqli_query($conn, $query);
  echo '<script type = "text/javascript">';
  echo 'window.location = window.location';
  echo '</script>';
}



?>

<?php

if(isset($_POST['chat'])){
    $seller_id = $_POST['id'];

    $select = "DELETE FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Product Deleted!");';
    echo 'window.location.href = "ApproveList.php"';
    echo '</script>';
}
?>