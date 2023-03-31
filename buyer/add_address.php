<?php
	session_start();
	include_once('../config.php');

	if(isset($_POST['add'])){
		$email = $_SESSION['email'];
		$home_address = $_POST['home_address'];
		$zip = $_POST['zip'];
		$state = $_POST['state'];
		$area = $_POST['area'];
		$phone_number = $_POST['phone_number'];
		$sql = "INSERT INTO address (email,home_address, zip, state, area, phone_number) VALUES ('$email','$home_address', '$zip', '$state', '$area', '$phone_number')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Address added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: address.php');
?>