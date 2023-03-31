<?php 
include('../config.php');
session_start();

$email = $_SESSION['email'];
$home_address = $_POST['home_address'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$area = $_POST['area'];
$phone_number = $_POST['phone_number'];

$sql = "INSERT INTO `address` (`email`,`home_address`,`zip`,`state`,`area`,`phone_number`) values ('$email','$home_address', '$zip', '$state', '$area', '$phone_number' )";
$query= mysqli_query($conn,$sql);
$lastId = mysqli_insert_id($conn);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>