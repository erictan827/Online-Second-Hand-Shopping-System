<?php
include '../config.php';
	session_start();
	$email = $_SESSION['email'];

$sqli = "SELECT COUNT(*) AS countquantity FROM cart WHERE email='$email'";
$duration = $conn->query($sqli);
$record = $duration->fetch_array();
$totalquantity = $record['countquantity'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>2nd Hand | Address</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTable.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<style>

    a{
      color:white;
      font-size: 15px;
    }
		
    a:hover{
      color:white;
    }

    /*button*/
    .center {
    margin: auto;
    width: 47%;
    }

    .btn-group button {
    background-color: #f5a623; /* Green background */
    border: 1px solid #c4851c; /* Green border */
    color: white; /* White text */
    margin:10px 0px 10px -5px;
    cursor: pointer; /* Pointer/hand icon */
    width:150px;
    height:50px;
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

    input[type="submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  background: #435c70;
  border-radius: 25px;
  font-size: 18px;
  color: #e9f4fb;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}
input[type="submit"]:hover{
  border-color: #f5a623;
  transition: .5s;
}
a:hover{color:#f5a623;}
	</style>
</head>
<body>
<body style="background:#edf0f2;">
<header class="header">
            <a href="#" class="logo" style="margin-top:-10px;"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="../seller/sellerMain.php" style="color:#f5a623;font-weight:bold;">Seller Centre</a></li>
            <li><a href="buyerMain.php">Home</a></li>
            <li><a href="buyerProduct.php">Product</a></li>
    		<li><a href="order.php">Order</a></li>
    		<li><a href="buyerProfile.php">Profile</a></li>
			<li><a href="about_us.php">About</a></li>
            <li style="list-style-type: none;"><a href="chat.php"><i class="fa fa-comment" style="font-size:15px;color:white;"></i></a></li>
            <li style="list-style-type: none;"><a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:15px;color:white;"></i> <span class='badge badge-warning' id='lblCartCount'><?php echo $totalquantity ?></span></a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>

		<div style="margin:40px 80px 80px 80px;">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
      <div class="row">
				<a href="buyerProfile.php"  class="btn btn-primary" style="margin-bottom:20px;"> < Back To Profile</a>
        <a href="#addnew" data-toggle="modal" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a>
      </div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Home Address</th>
						<th>Zip</th>
						<th>State</th>
						<th>Area</th>
						<th>Phone Number</th>
						<th width="14%">Action</th>
					</thead>
					<tbody>
						<?php
							include_once('../config.php');
							$sql = "SELECT * FROM address WHERE email='$email'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr> 
									<td>".$row['home_address']."</td>
									<td>".$row['zip']."</td>
									<td>".$row['state']."</td>
									<td>".$row['area']."</td>
									<td>".$row['phone_number']."</td>
									<td>
										<a href='#edit_".$row['id']."' class='btn btn-warning btn-sm' data-toggle='modal'> Edit</a>
										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'> Delete</a>
									</td>
								</tr>";
								include('editaddress_deleteaddress_modal.php');
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('add_address_modal.php') ?>

<script src="../javascript/jquery.min.js"></script>
<script src="../javascript/bootstrap.min.js"></script>
<script src="../javascript/jquery.dataTables.min.js"></script>
<script src="../javascript/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>
</html>