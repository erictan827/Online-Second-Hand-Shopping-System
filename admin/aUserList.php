<?php
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer List | Admin</title>
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

.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 35px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 35px;
  border: 3px solid #f1f1f1;
  z-index: 9;
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
	</style>
</head>
<body>
<header class="header">
            <a href="#" class="logo"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="aUserList.php">Customer List</a></li>
            <li><a href="aHome.php">Review Product List</a></li>
            <li><a href="aCategory.php">Category List</a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>


<div class="center">
    <h1 style="color:#435c70">CUSTOMER LIST</h1>
    <table id = "users">
	  <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
			<!-- <th>Action</th> -->
        </tr>
	</thead>
	<tbody>
        <?php
            $query = "SELECT * FROM users WHERE type='Customer' ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
		    $id=$row['id'];
			$username=$row['username'];
			$email=$row['email'];
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['email'];?></td>
            <!-- <td>
               
  <form method="POST">
  <input type = "hidden" name ="id" value = "<?php echo $row['id'];?>"/>
                    <input  style="background-color: red;
   border-radius: 25px;
  width:75px;
  display:block;
  margin:0 auto;
  border: none;
  color: white;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;" type="submit" name="decline" id="decline" value="Ban"/>
  <input style="display:inline-block;" placeholder="Reason?" type = "text" name  ="reason" value = "" required/>
                </form>
            </td> -->
        </tr>

    <?php
            }
            ?>
			</table>

<div class="form-popup" id="myForm">
  <form method="POST">
  <input type = "hidden" name  ="id" value = "<?php echo $row['id'];?>"/>
  <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Reason" name="reason" id="reason" required>

    <input style="background-color: green;
  border-radius: 25px;
  width:75px;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;" type="submit" name="reasonsubmit" id="reasonsubmit" value="Send"/>

    <input style="background-color: green;
  border-radius: 25px;
  width:75px;
  border: none;
  color: white;
  padding: 15px 3px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;" onclick="closeForm()" id="close" name="close" value="Close"/>
  </form>
</div>
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

if(isset($_POST['approve'])){
    $id = $_POST['id'];
    $select = "UPDATE product set status = 'approve' WHERE id='$id'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("Product Approved!");';
    echo 'window.location.href = "ahome.php"';
    echo '</script>';
}
?>

<?php
if(isset($_POST['decline'])){
    $id = $_POST['id'];
    $reason = $_POST['reason'];
    $select = "UPDATE product set status = 'decline', reason = '$reason' WHERE id = '$id'";
    $result = mysqli_query($conn, $select);
    echo '<script type = "text/javascript">';
    echo 'alert("Product Declined!");';
    echo 'window.location.href = "ahome.php"';
    echo '</script>';
}
?>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script>
function myFunction() {
  do{
    var person = prompt('Reason for Declined? (Required)');
} while(person !== null && person === "")

  if (person != null) {
    document.getElementById("demo").innerHTML = person;

  }
}
</script>




