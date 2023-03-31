<?php
include '../config.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/toastr.min.css">
<script src="../javascript/jquery-3.3.1.min.js"></script>
<script src="../javascript/toastr.min.js"></script>
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="../css/register.css">

	<meta charset="utf-8">
	<title>2nd Hand | Register</title>
	<link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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

	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="" method="post">
				<div class="form-left">
					<h2>General Infomation</h2>
					<div class="form-row">
							<input type="text" name="username" id="username" class="input-text" value="<?php echo $_POST['username']; ?>" placeholder="Username" required>
					</div>
					<div class="form-row">
							<input type="email" name="email" id="email" class="input-text" value="<?php echo $_POST['email']; ?>" placeholder="Email" required>
					</div>
					<div class="form-row">
						<input type="password" name="password" class="company" id="password" value="<?php echo $_POST['password']; ?>" placeholder="Password" required>
					</div>
                    <div class="form-row">
						<input type="password" name="cpassword" class="company" id="cpassword" value="<?php echo $_POST['cpassword']; ?>" placeholder="Confirm Password" required>
					</div>
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" value="<?php echo $_POST['address']; ?>" name="address" class="address" id="address" placeholder="Delivery Address" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" pattern="[0-9]{5}" name="zip" value="<?php echo $_POST['zip']; ?>" class="zip" id="zip" placeholder="Zip Code" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="state" value="<?php echo $_POST['state']; ?>" class="state" id="state" placeholder="State" required>
						</div>
					</div>
					<div class="form-row">
                    <input type="text" name="area" value="<?php echo $_POST['area']; ?>" class="area" id="area" placeholder="Area" required>
					</div>
					<div class="form-row">
                    <input type="tel" pattern="[0-9]*" name="phone_number" value="<?php echo $_POST['phone_number']; ?>" class="phone_number" id="phone_number" placeholder="Phone Number" required>
					</div>
					<div class="form-row-last">
						<input type="submit" name="submit" class="register" value="Register">
					</div>
				</div>
			</form>
		</div>
	</div>
    
<footer>
  <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, 2nd Hand Shopping Platfrom</p>
</footer>
</body>
<?php
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $address = $_POST['address'];
	$zip = $_POST['zip'];
    $state = $_POST['state'];
	$area = $_POST['area'];
    $phone_number = $_POST['phone_number'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, address, zip, state, area, phone_number)
					VALUES ('$username', '$email', '$password','$address', '$zip', '$state', '$area', '$phone_number')";
			$sqladdress = "INSERT INTO address ( email, home_address, zip, state, area, phone_number)
					VALUES ('$email', '$address', '$zip', '$state', '$area', '$phone_number')";
			$resultaddress = mysqli_query($conn, $sqladdress);
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo '<script type="text/javascript">toastr.success("User Registration Completed.")</script>';
				echo "<script>setTimeout(\"location.href = '../visitor/login.php';\",1500);</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
        header("Location: ../visitor/login.php");
			} else {
				echo '<script type="text/javascript">toastr.error("Something Wrong Went.")</script>';
			}
		} else {
			echo '<script type="text/javascript">toastr.error("Email Already Exists!")</script>';
		}
		
	} else {
		echo '<script type="text/javascript">toastr.error("Password Not Matched.")</script>';
	}
}

?>
</html>