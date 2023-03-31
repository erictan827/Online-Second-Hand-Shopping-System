<html lang="en">
<head>
<link rel="stylesheet" href="toastr.min.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="toastr.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
      include '../config.php';
session_start();
        $query2 = "select * from product order by id desc limit 1";
        $result2 = mysqli_query($conn,$query2);
        $row = mysqli_fetch_array($result2);
        $last_id = $row['id'];
        if ($last_id==$row['id'])
        {
            $code = rand(10000,99999);
            $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $code2 = substr(str_shuffle($char),0,3);
            $customer_ID = $code2."_".$code;
        }
 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $title = $_POST["title"];
            $category = $_POST["category"];
            $description = $_POST["description"];
            $quantity = $_POST["quantity"];
            $price = $_POST["price"];
            $seller_id = $_SESSION['email'];
            $seller_username = $_SESSION['username'];
            $image=basename($_FILES["fileToUpload"]["name"]);
  $target_dir = "../images/";
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
            $sql = "INSERT INTO product (id,title,category,description,quantity,price,image,seller_id,seller_username) VALUES ('$id','$title','$category','$description','$quantity','$price','$image','$seller_id','$seller_username')";
            if (mysqli_query($conn, $sql)) {
              $kobe="Add Successful!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
?>

<!DOCTYPE html>
    <meta charset="UTF-8">
    <title>Add New Product | Seller</title>
    <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="toastr.min.css">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="toastr.min.js"></script>
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

<div class="wrapper">
  <div class="contact-form">
    <div class="input-fields">
    <form method="post" enctype="multipart/form-data">
    <input type="text" class="input" name="id" id="id" value="<?php echo $customer_ID; ?>" readonly>
      <input type="text" class="input" id="title" name="title" placeholder="Product Name" required>
        <select name="category" class="input" id="category" placeholder="Please Select Category" required>
  			<option value="" disabled selected>Select Category</option>
        <?php
                      $sql5="select * from category";
                      $result5=$conn->query($sql5);
                        if ($result5->num_rows > 0) {    
                            while($row = $result5->fetch_assoc()) {
                                //display result
                                $id=$row['id'];
                                $name=$row['name'];
                    ?>	
          <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
          <?php
                            }
                          }
                          ?>
      </select>
      <input name="quantity" id="quantity" type="number" class="input" placeholder="Quantity" required>
      <input name="price" id="quantity" type="number" class="input" placeholder="Price" required>
      <br>
      <input type="file" id="fileToUpload" name="fileToUpload" onchange="showPreview(event);" required>
      <br>
    </div>
    <div class="msg">
      <textarea id="description" name="description" placeholder="Description" required></textarea>
    </div>
    <div class="msg">
    <img style="height:100px; padding-top:20px" id="fileToUpload-preview">
    <?php if (!empty($kobe)) {echo "<h1 style='color:#f5a623;text-align:center';>"."<br>Add Successful!"."</h1>";} ?>
    </div>
  </div>
  <br>
  <input type="submit" value="Insert">
</div>
      </form>
    

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