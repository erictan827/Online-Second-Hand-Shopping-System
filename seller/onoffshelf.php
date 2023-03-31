<?php
	session_start();
	include_once('../config.php');

	if(isset($_GET['id'])){

		
            $query = "SELECT * FROM product WHERE id='".$_GET['id']."'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
			$shelf=$row['shelf'];
        
        if($row['shelf']=='off'){

		$sql="UPDATE product set shelf='on' WHERE id = '".$_GET['id']."'";
		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product On/Off the shelf successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong';
		}


		}

		if($row['shelf']=='on'){
			
		$sql="UPDATE product set shelf='off' WHERE id = '".$_GET['id']."'";
		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Product On/Off the shelf successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong';
		}
	  }
	}

	
	header('location: sellerProduct.php');

	}

	else{
		$_SESSION['error'] = 'Select Product to delete first';
	}

?>