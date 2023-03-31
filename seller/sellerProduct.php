<?php
	session_start();
	$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product List | Seller</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTable.bootstrap.min.css">
	<style>

    a{
      color:white;
      font-size: 15px;
    }
		
    a:hover{
      color:#f5a623;
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
	</style>
</head>
<body>
<body style="background:#edf0f2;">
        <header class="header">
            <a href="#" class="logo" style="margin-top:-10px;"><img src="../images/logo/logo.png" height="50px" alt=""></a>
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

        <div class="center">
  <div class="btn-group">
    <button onclick="location.href='sellerProduct.php'">All Product</button>
    <button onclick="location.href='addProduct.php'">Add New Product</button>
    <button onclick="location.href='pendingList.php'">Pending List</button>
    <button onclick="location.href='declineList.php'">Decline List</button>
  </div>
</div>

		<div style="margin:0px 80px 80px 80px;">
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
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>Image</th>
						<th>ID</th>
						<th>Title</th>
						<th>Category</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Description</th>
						<th>Shelf</th>
						<th width="14%">Action</th>
					</thead>
					<tbody>
						<?php
							include_once('../config.php');
							$sql = "SELECT * FROM product WHERE seller_id='$email' and status='Approve'";

							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo
								"<tr> 
									<td><img src='../images/".$row['image']."' width='40px'></td>
									<td>".$row['id']."</td>
									<td>".$row['title']."</td>
									<td>".$row['category']."</td>
									<td>".$row['quantity']."</td>
									<td>".$row['price']."</td>
									<td>".$row['description']."</td>
									<td>".$row['shelf']."</td>
									<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'> Edit</a>
										<a href='#delete_".$row['id']."' class='btn btn-warning btn-sm' data-toggle='modal'> On/Off</a>
									</td>
								</tr>";
								include('editquantity_onoffshelf_modal.php');
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


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