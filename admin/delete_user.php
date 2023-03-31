<?php 
include('../config.php');

$user_id = $_POST['id'];
$sql = "DELETE FROM category WHERE id='$user_id'";
$delQuery =mysqli_query($conn,$sql);
if($delQuery==true)
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 

?>