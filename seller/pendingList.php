<?php
include '../config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Pending | Seller</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <link rel="stylesheet" href="../css/menu.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	 /* Dropdown Button */
.dropbtn {
  background-color: #4e657a;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #4e657a;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #4e657a;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #4e657a;color: #f5a623;}

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

   .center {
    margin: auto;
    width: 90%;
    padding: 10px;
    text-align: center;
  }
  
  #users {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #users td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #users tr:nth-child(even){background-color: #f2f2f2;}
  
  #users tr:hover {background-color: #ddd;}
  
  #users th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #435c70;
    color: white;
    text-align: center;
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

    /*button*/
    .center1 {
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
	</style>
</head>
<body>

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

<div class="center1">
  <div class="btn-group">
    <button onclick="location.href='sellerProduct.php'">All Product</button>
    <button onclick="location.href='addProduct.php'">Add New Product</button>
    <button onclick="location.href='pendingList.php'">Pending List</button>
    <button onclick="location.href='declineList.php'">Decline List</button>
  </div>
</div>

<div class="center">
    <table id = "users">
	  <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Quantity</th>
			<th>Price</th>
			<th>Image</th>
			<th>Description</th>
			<th>Status</th>
			<th>Action</th>
        </tr>
	</thead>
	<tbody>
        <?php
			$seller_id = $_SESSION['email'];
            $query = "SELECT * FROM product WHERE status = 'Pending'  ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
		    $id=$row['id'];
			$title=$row['title'];
			$category=$row['category'];
			$quantity=$row['quantity'];
			$price=$row['price'];
			$image=$row['image'];
			$description=$row['description'];
			$status=$row['status'];
        ?>
        <tr>
            <td width="8%"><?php echo $row['id'];?></td>
            <td width="20px"><?php echo $row['title'];?></td>
            <td><?php echo $row['category'];?></td>
			<td width="5%"><?php echo $row['quantity'];?></td>
			<td width="15%"><?php echo 'RM '.$row['price'];?></td>
			<td width="10%"><img src="../images/<?php echo $image ?>" width="50%"></td>
			<td><?php echo $row['description'];?></td>
			<td width="5%"><?php echo $row['status'];?></td>
            <td width="15%">
                <form action ="pendingList.php" method ="POST">
                    <input type = "hidden" name  ="id" value = "<?php echo $row['id'];?>"/>
                    <a style="
  background-color: orange;
  border-radius: 25px;
  border: none;
  width:10px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
" href="editProduct.php?pid=<?php echo $id; ?>" class="fa" name  ="edit" value = "Edit">&#xf044;</a>
                    <input style="background-color: red;
  border-radius: 25px;
  width:75px;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;" type="submit"  name="delete" id="delete" value="X"/>
                </form>
            </td>
        </tr>

    <?php
            }
            ?>
			</table>
</div>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<script>
    function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("fileToUpload-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
 
</html>

<?php

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $select = "DELETE FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Product Deleted!");';
    echo 'window.location.href = "pendingList.php"';
    echo '</script>';
}
?>



</body>
</html>