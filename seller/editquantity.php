<?php
	session_start();
	include_once('../config.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$quantity = $_POST['quantity'];
		$sql = "UPDATE product SET title = '$title', quantity = '$quantity' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Quantity updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong';
		}
	}
	else{
		$_SESSION['error'] = 'Select product to edit first';
	}

	header('location: sellerProduct.php');

?>