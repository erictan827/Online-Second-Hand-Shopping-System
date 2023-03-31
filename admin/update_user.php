<?php 
include('../config.php');
$name = $_POST['name'];
$id = $_POST['id'];

$sql = "UPDATE `category` SET  `name`='$name' WHERE id='$id' ";
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