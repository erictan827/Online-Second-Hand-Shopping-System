<?php

$connect = new PDO("mysql:host=localhost;dbname=fyp_project", "root", "");

$column = array('time', 'transaction_id', 'totalPrice', 'order_status');

$query = '
SELECT * FROM order_list 
WHERE time LIKE "%'.$_POST["search"]["value"].'%" 
OR transaction_id LIKE "%'.$_POST["search"]["value"].'%" 
OR totalPrice LIKE "%'.$_POST["search"]["value"].'%" 
OR order_status LIKE "%'.$_POST["search"]["value"].'%" 
';

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY totalPrice DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_order = 0;

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["time"];
 $sub_array[] = 'Income from order #'.$row["transaction_id"];
 $sub_array[] = '+ '.number_format(($row["totalPrice"] * 0.97),2);
 $sub_array[] = $row["order_status"];

 $total_order = $total_order + floatval($row["totalPrice"]*0.97);
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM order_list WHERE order_status='Completed'";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST["draw"]),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data,
 'total'    => number_format($total_order, 2)
);

echo json_encode($output);


?>