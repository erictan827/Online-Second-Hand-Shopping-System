<?php 
include '../config.php';
session_start();
error_reporting(0);
?>

<html>
    <head>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/toastr.min.css">
        <script src="../javascript/jquery-3.3.1.min.js"></script>
        <script src="../javascript/toastr.min.js"></script>
        <title>2nd Hand | Login</title>
        <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    </head>

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
    

            <div class="center">
                <div class="curry">
                  <h1>Login</h1>
                  </div>
                  <form method="POST">
                    <div class="txt_field">
                    <h4 style="font-weight:normal; color:#435c70;">Email</h4>
                      <input type="email" name="email" required>
                    </div>
                    <div class="txt_field">
                    <h4 style="font-weight:normal; color:#435c70;">Password</h4>
                      <input type="password" name="password" required>
                    </div>
                    <input type="submit" name="submit" value="Login">
                    <div class="signup_link">
                      Don't have an account? <a href="register.php">Register</a>
                    </div>
                  </form>
            </div>

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
<?php

if (isset($_POST['submit'])) {

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);   
		$_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['Type'] = $row['Type'];
        if (($_SESSION['Type'] == 'Admin')){
            header("Location: ../admin/aUserList.php");
        }
        else if(($_SESSION['Type'] == 'Owner')){
            header("Location: ../owner/ownerHome.php");
        }
        else {
            echo '<script type="text/javascript">toastr.success("Login Successful!")</script>';
            echo "<script>setTimeout(\"location.href = '../buyer/buyerMain.php';\",1500);</script>";}
	}    
        else {
            echo '<script type="text/javascript">toastr.error("Wrong Password or Email!")</script>';
	}
}

?>
</html>