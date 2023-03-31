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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Completed | Seller</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/menu.css">
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

/*button*/
.center {
    margin: auto;
    width: 60%;
    }

    .btn-group button {
    background-color: #f5a623; /* Green background */
    border: 1px solid #c4851c; /* Green border */
    color: white; /* White text */
    margin:0px 0px 5px -5px;
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

        <div class="center" style="margin-top:30px;margin-bottom:30px;">
  <div class="btn-group">
    <button onclick="location.href='sellerOrder.php'">All</button>
    <button onclick="location.href='sellerOrder_pending.php'">Pending</button>
    <button onclick="location.href='sellerOrder_to_received.php'">To Received</button>
    <button onclick="location.href='sellerOrder.completed.php'">Completed</button>
    <button onclick="location.href='sellerOrder_cancelled.php'">Cancelled</button>
  </div>
</div>
        <div class="chris" style="margin: 0px 50px 50px 50px;">
        
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date & Time</th>
                <th>Transaction ID</th>
                <th>Address</th>
                <th>Image</th>
                <th>Name</th>
                <th>Total Price</th>
                <th>Pending Status</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $email = $_SESSION['email'];
            $query = "SELECT * FROM order_list WHERE seller_id = '$email' AND order_status='Completed' ORDER BY time DESC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
            $time=$row['time'];
            $transaction_id=$row['transaction_id'];
            $image=$row['image'];
			      $title=$row['title'];
            $price=$row['price'];
		        $quantity=$row['quantity'];
            $totalPrice=$row['totalPrice'];
            $delivery_address=$row['delivery_address'];
            $zip=$row['zip'];
            $state=$row['state'];
            $area=$row['area'];
            $order_status=$row['order_status'];
            $payment_status=$row['payment_status'];
            $custemail=$row['custemail'];
        ?>
            <tr style="text-align:center;">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input name="transaction_id" id="transaction_id" type="hidden" class="transaction_id" value ="<?php echo $row['transaction_id'];?>">
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['transaction_id'];?><br><br><div style="font-weight: bold;"><?php echo $row['custemail'];?></div></td>
                <td><?php echo $row['delivery_address'].', <br> '.$row['zip'].', '.$row['state'].', '.$row['area'];?></td>
                <td style="width:120px;height=100px;"><img src="../images/<?php echo $image ?>" width="100%"></td>
                <td><?php echo $row['title'];?><br><div style="font-weight: bold;">x<?php echo $row['quantity'];?></div></td>
                <td><?php echo $row['totalPrice'];?></td>
                <td><?php echo $row['payment_status'];?></td>
                <td>
                  <select name="colorList">
                    <option <?php if($row['order_status']=='Pending') echo"selected='selected'"; ?>>Pending</option>
                    <option <?php if($row['order_status']=='To Received') echo"selected='selected'"; ?>>To Received</option>
                    <option <?php if($row['order_status']=='Completed') echo"selected='selected'"; ?>>Completed</option>
                    <option <?php if($row['order_status']=='Cancelled') echo"selected='selected'"; ?>>Cancelled</option>
            </select>
            <br><br><input type="submit" name="btnSubmit" value="Submit" />
            </form>
                </td>
            </tr>
           <?php
            }
           ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Date & Time</th>
                <th>Transaction ID</th>
                <th>Address</th>
                <th>Image</th>
                <th>Name</th>
                <th>Total Price</th>
                <th>Pending Status</th>
                <th>Order Status</th>
            </tr>
        </tfoot>
    </table>
  </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

</body>
<script>
const doc = document;
const menuOpen = doc.querySelector(".menu");
const menuClose = doc.querySelector(".close");
const overlay = doc.querySelector(".overlay");

menuOpen.addEventListener("click", () => {
  overlay.classList.add("overlay--active");
});

menuClose.addEventListener("click", () => {
  overlay.classList.remove("overlay--active");
});

</script>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myFLOW");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active", "");
  }
  this.className += " active";
  });
}
</script>
<?php
  if(isset($_POST['btnSubmit'])){
    if(isset($_POST['colorList'])){
      $value=$_POST['colorList'];
      $value1=$_POST['transaction_id'];
      $sql = "UPDATE order_list SET order_status='$value' WHERE transaction_id='$value1';";
            if (mysqli_query($conn, $sql)) {
              echo '<script type = "text/javascript">';
              echo 'window.location.href = "sellerOrder.php"';
              echo '</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }
  }
?>
</html>