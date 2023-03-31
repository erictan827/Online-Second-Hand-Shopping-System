<?php
include '../config.php';
error_reporting(0);
session_start();


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, type)
					VALUES ('$username', '$email', '$password','Admin')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
        header("Location: ownerHome.php");
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Owner</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/menu.css">

  <style>

* {
        box-sizing: border-box;
      }

.btn-area:hover{
    background-color:#f5a623;
}

.button1 {
  background-color: #4e657a;
  border: none;
  color: white;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  cursor: pointer;
}

.button1:hover{
    background-color:#f5a623;
}

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

      
      .formPopup {
        display: none;
        position: fixed;
        left: 50%;
        top: 3%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=email],
      .formContainer input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=email]:focus,
      .formContainer input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
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


  .openBtn {
        display: flex;
        justify-content: left;
      }
      .openButton {
        border: none;
        border-radius: 5px;
        background-color: #1c87c9;
        color: white;
        padding: 14px 20px;
        cursor: pointer;
        position: fixed;
      }
     
      

      .formPopup1 {
        display: none;
        position: fixed;
        left: 50%;
        top: 3%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer1 {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer1 input[type=text],
      .formContainer1 input[type=email],
      .formContainer1 input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer1 input[type=text]:focus,
      .formContainer1 input[type=email]:focus,
      .formContainer1 input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer1 .btn1 {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer1 .cancel1 {
        background-color: #cc0000;
      }
      .formContainer1 .btn1:hover,
      .openButton1:hover {
        opacity: 1;
      }
      
      
	</style>
</head>
<body>
<header class="header">
            <a href="#" class="logo"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="ownerHome.php">Admin List</a></li>
            <li><a href="commission.php">Commission List</a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>

<div class="center">
    <h1 style="color:#435c70">ADMIN LIST <button onclick="openForm()" class="button1" style="float: right;">ADD</button></h1>

    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="" method="post" class="formContainer">
          <br>
          <label for="email">
            <strong>Name</strong>
          </label>
          <input type="text" id="username" placeholder="Name" name="username" required>
          <label for="email">
            <strong>E-mail</strong>
          </label>
          <input type="email" id="email" placeholder="Email" name="email" required>
          <label for="psw">
            <strong>Password</strong>
          </label>
          <input type="password" id="password" placeholder="Password"  name="password" required>
          <label for="psw">
            <strong>Confirm Password</strong>
          </label>
          <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
          
          <input type="submit" style="border-radius: 0px;" name="submit">
        <br><br>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>

    

    <table id = "users">
	  <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
	</thead>
	<tbody>
        <?php
            $query = "SELECT * FROM users WHERE type='Admin'";
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
            <td>
                <form action ="ownerHome.php" method ="POST">
                    <input type = "hidden" name="id" value = "<?php echo $row['id'];?>"/>
                    <a style="
  background-color: orange;
  border-radius: 25px;
  border: none;
  width:6px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;" 
  onclick="openForm1()" class="fa" name  ="edit">&#xf044;</a>

                </form>
            </td>

        </tr>

    <?php
    
            }
            ?>
			</table>
    
          </div>
          <br>

          <?php
            $query = "SELECT * FROM users WHERE type='Admin'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
		    $id=$row['id'];
			$username=$row['username'];
			$email=$row['email'];
        ?>

          <div class="loginPopup1">
      <div class="formPopup1" id="popupForm1">
        <form action="" method="post" class="formContainer1">
          <br>
          <label for="email">
            <strong>Name</strong>
          </label>
          <input type="text" id="username" value="<?php echo $username;?>" name="username" required>
          <label for="email">
            <strong>E-mail</strong>
          </label>
          <input type="email" id="email" value="<?php echo $email;?>" name="email" readonly>
          <label for="psw">
            <strong>Password</strong>
          </label>
          <input type="password" id="password" placeholder="Password"  name="password" required>
          <label for="psw">
            <strong>Confirm Password</strong>
          </label>
          <input type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
          
          <input type="submit"  class="btn1 cancel1" style="border-radius: 0px;background:green;" name="update">
        <br>
          <button type="button" class="btn1 cancel1" onclick="closeForm1()">Close</button>
        </form>
      </div>
    </div>
    <?php
            }
    ?>

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
        document.getElementById("popupForm").style.display = "inline-block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
</script>

<script>
      function openForm1() {
        document.getElementById("popupForm1").style.display = "inline-block";
      }
      function closeForm1() {
        document.getElementById("popupForm1").style.display = "none";
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

<script>
      let modalBtns = [...document.querySelectorAll(".button")];
      modalBtns.forEach(function(btn) {
        btn.onclick = function() {
          let modal = btn.getAttribute('data-modal');
          document.getElementById(modal)
            .style.display = "block";
        }
      });
      let closeBtns = [...document.querySelectorAll(".close")];
      closeBtns.forEach(function(btn) {
        btn.onclick = function() {
          let modal = btn.closest('.modal');
          modal.style.display = "none";
        }
      });
      window.onclick = function(event) {
        if(event.target.className === "modal") {
          event.target.style.display = "none";
        }
      }
    </script>

<?php

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    
    $select = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    echo '<script type = "text/javascript">';
    echo 'window.location.href = "ownerHome.php"';
    echo '</script>';
}
?>

<?php

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password=md5($_POST['password']);
    $cpassword=md5($_POST['cpassword']);

        if($password == $cpassword){
            $sql = "UPDATE users SET username = '$username', password = '$password' WHERE email='$email'";
            $result = mysqli_query($conn,$sql);

            if($result){
              echo '<script type = "text/javascript">';
              echo 'window.location.href = "ownerHome.php"';
              echo '</script>';
            }else{
                echo "<script>alert('Password Not Changed.')</script>";
            }
            

        }else{
            echo "<script>alert('New Password Not Matched.')</script>";
        }
    }
?>



