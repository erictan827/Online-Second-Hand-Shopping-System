<?php
include '../config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Date search value
$searchByFromdate = mysqli_real_escape_string($conn,$_POST['searchByFromdate']);
$searchByTodate = mysqli_real_escape_string($conn,$_POST['searchByTodate']);

## Search 
$searchQuery = " ";
if($searchValue != ''){
    $searchQuery = " and (transaction_id like '%".$searchValue."%' or totalPrice like '%".$searchValue."%' ) ";
}

// Date filter
if($searchByFromdate != '' && $searchByTodate != ''){
    $searchQuery .= " and (time between '".$searchByFromdate."' and '".$searchByTodate."' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from order_list");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from order_list WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from order_list WHERE order_status ='Completed' and 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $data[] = array(
    		"time"=>$row['time'],
    		"transaction_id"=>$row['transaction_id'],
    		"totalPrice"=>number_format($row['totalPrice']*0.05, 2), 
    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
die;
