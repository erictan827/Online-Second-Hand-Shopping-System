<?php

//fetch.php

$connect = new PDO("mysql:host=localhost; dbname=fyp_project", "root", "");

$query = "
	SELECT * FROM product WHERE price BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."' ORDER BY price ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
<h4 align="center">Total Item - '.$total_row.'</h4>
<div class="row">
';

if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<div class="col-md-2">
			<img src="images/'.$row["image"].'" class="img-responsive img-thumnail img-circle" width=150px height=220px />
			<h4 align="center">'.$row["title"].'</h4>
			<h3 align="center" class="text-danger">'.$row["price"].'</h3>
			<br />
		</div>
		';
	}
}
else
{
	$output .= '
		<h3 align="center">No Product Found</h3>
	';
}
$output .= '
</div>
';

echo $output;

?>