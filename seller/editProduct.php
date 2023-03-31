<?php 
include '../config.php';
session_start();

if(isset($_GET['pid'])){ //if received pid from other page
	$pid=$_GET['pid'];
	$sql="select * from product where id='$pid'";
	$result=$conn->query($sql);
}

$sql6="select * from category";
$result6=$conn->query($sql6);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    if(!isset($_FILES['fileToUpload']) || $_FILES['fileToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
      $image = $_POST["image"];
      $sql = "Update product set title='$title',category='$category',description='$description',image='$image',quantity='$quantity',price='$price',status='pending',reason='' where id='$id'";
      echo '<script type = "text/javascript">';
      echo 'alert("Product Updated!");';
      echo 'window.location.href = "pendingList.php"';
      echo '</script>';
    }else
$image=basename($_FILES["fileToUpload"]["name"]);
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
echo "File is an image - " . $check["mime"] . ".";
$uploadOk = 1;
} else {
echo "File is not an image.";
$uploadOk = 0;
}
}

if ($_FILES["fileToUpload"]["size"] > 2000000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
} 
else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

} else {
echo "Sorry, there was an error uploading your file.";
}
}
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_FILES["fileToUpload"]["size"] < 0) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    else{
      $sql = "Update product set title='$title',category='$category',description='$description',quantity='$quantity',image='$image',price='$price',status='Pending',reason='',shelf='off' where id='$id'";
      if (mysqli_query($conn, $sql)) {
        echo '<script type = "text/javascript">';
        echo 'alert("Product Updated!");';
        echo 'window.location.href = "sellerProduct.php"';
        echo '</script>';
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
      mysqli_close($conn);
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product | Seller</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/menu.css">
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
        
        .wrapper{
        margin:auto;
        background: white;
        padding: 30px;
        width:50%;
        border-radius: 5px;
        }

        .wrapper .title h1{
        color: #435c70;
        text-align: center;
        }

        .contact-form{
        display: flex;
        }

        .input-fields{
        display: flex;
        flex-direction: column;
        margin-right: 4%;
        }

        .input-fields,
        .msg{
        width: 50%;
        }

        .msg1{
        width: 50%;
        }

        .input-fields .input{
        margin: 10px 0;
        background: transparent;
        border: 0px;
        border-bottom: 2px solid #c5ecfd;
        padding: 10px;
        color: #435c70;
        width: 100%;
        }

        .msg textarea{
        height: 212px;
        margin: 10px 0;
        background: transparent;
        border: 0px;
        padding: 10px;
        color: #435c70;
        width: 80%;
        }

        ::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #435c70;
        }
        ::-moz-placeholder {
        /* Firefox 19+ */
        color: #c5ecfd;
        }
        :-ms-input-placeholder {
        /* IE 10+ */
        color: #c5ecfd;
        }


        @media screen and (max-width: 600px){
        .contact-form{
            flex-direction: column;
        }
        .msg textarea{
            height: 80px;
        }
        .input-fields,
        .msg{
            width: 100%;
            }
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
    <link rel="stylesheet" href="style.css">
</head>
<body style="background:#edf0f2;">
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
            <li style="list-style-type: none;"><a href="chat.php"><i class="fa fa-comment" style="font-size:15px;color:white;"></i> <span class='badge badge-warning' id='lblCartCount'>1</span></a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>

<div class="wrapper">
  <div class="title">
    <h1>Edit Product</h1>
  </div>
  <div class="contact-form">
    <div class="input-fields">
    <form method="post" action="editProduct.php" enctype="multipart/form-data">
    <?php
			if ($result->num_rows > 0) {    
				while($row = $result->fetch_assoc()) {
					//display result
					$id=$row['id'];
					$title=$row['title'];
          $category=$row['category'];
          $quantity=$row['quantity'];
          $price=$row['price'];
          $image=$row['image'];
					$description=$row['description'];
		?>
    <input type="text" class="input" name="id" id="id" value = "<?php echo $id;?>" readonly>
      <input type="text" class="input" id="title" name="title" value = "<?php echo $title;?>" placeholder="Product Name" required>
        <select name="category" class="input" id="category" required>
  		  <option value="" disabled selected>Select Category</option>	
        <?php
  
                            while($row = $result6->fetch_assoc()) {
                                $id=$row['id'];
                                $name=$row['name'];
                    ?>	
          <option <?php if($name) echo"selected='selected'"; ?>><?php echo $name;?></option>
          <?php
                            }
                          
                          ?>
      </select>
      <input name="quantity" id="quantity" type="number" value = "<?php echo $quantity;?>" class="input" placeholder="Quantity" required>
      <input name="price" id="price" type="number" class="input" value = "<?php echo $price;?>" placeholder="Price" required>
      <input name="image" id="image" type="hidden" class="input" value ="<?php echo $image;?>">
      <br>
      <input type="file" id="fileToUpload" name="fileToUpload" onchange="showPreview(event);">
      <br>
    </div>
    <div class="msg">
      <textarea id="description" name="description" placeholder="Description" required><?php echo $description;?></textarea>
    </div>
    <div class="msg">
    <img style="height:100px; padding-top:20px" id="fileToUpload-preview" src="../images/<?php echo $image;?>">
    <?php
				} //end while loop
			}	// end if statement
		?>
    </div>
  </div>
  <br>
  <input type="submit" value="Update" onclick="checkFile()">
</div>
      </form>

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

<!-- <script>
  function checkFile() {
    let fileInputField = document.getElementById("fileToUpload");
    if (fileInputField.files.length == 1) {
      var php_var = "<?php $sql = "Update product set image='$image' where id='$id'"; ?>";
      alert("Product Updated!");
    }
    else{
      alert("Product Updated but image no!");
    }
}
</script> -->

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