<?php
$min = 1;
$max = 9999;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}

$keyword="";
if (! empty($_POST['search_product'])) {
  $keyword = $_POST['search_product'];
}

?>
  <script>
$("#Formid").submit( function(e) {
  loadAjax();
  e.returnValue = false;
});
  </script>
<?php
include('../config.php');

if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 6;
    $start_from = ($page-1)*02;

$select_category="";
if (empty($_POST['category'])) {
$sql="select * from product where shelf='on' and quantity>0 and price BETWEEN '$min' AND '$max' and title like '%$keyword%' ORDER BY price limit $start_from,$num_per_page;";
$result=$conn->query($sql);
}else if(! empty($_POST['category'])){
  $select_category = $_POST['category'];
  $sql="select * from product where shelf='on' and quantity>0 and category ='$select_category' and price BETWEEN '$min' AND '$max' and title like '%$keyword%' ORDER BY price limit $start_from,$num_per_page;";
  $result=$conn->query($sql);
}

// $keyword="";
// if(isset($_POST['search_product'])){
//     $keyword=$_POST['search_product'];
//     $sql="select * from product where title like '%$keyword%' or description like '%$keyword%' or price like '%$keyword%'";
//     $result=$conn->query($sql);
// }


  $sql5="select * from category";
  $result5=$conn->query($sql5);

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
      <link rel="stylesheet" href="bootstrap5.0.1.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
  
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 1,
      max: 9999,
      values: [ <?php echo $min; ?>, <?php echo $max; ?> ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#min" ).val(ui.values[ 0 ]);
		$( "#max" ).val(ui.values[ 1 ]);
      }
      });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>

  <title>2nd Hand | Products</title>
  <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">

  <!-- Site Icon -->
  <link rel="shortcut Icon" type="image/png" href="img/favicon.png">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../css/4.5.0 bootstrap.css" rel="stylesheet">
  <link href="../css/googlefont.css" rel="stylesheet">
  <link href="../css/awesome.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/menu.css" rel="stylesheet">
  <link href="../css/search.css" rel="stylesheet">

</head>

<style>
.form-price-range-filter {
	text-align: center;
}

.tutorial-table {
    width: 100%;
    font-size: 13px;
    border-top: #e5e5e5 1px solid;
    border-spacing: initial;
    margin: 20px 0px;
    word-break: break-word;
}

.tutorial-table th {
    background-color: #f5f5f5;
	padding: 10px 20px;
	text-align: left;
}

.tutorial-table td {
    border-bottom: #f0f0f0 1px solid;
    background-color: #ffffff;
	padding: 10px 20px;
}

.text-right {
	text-align: right;
}

th.text-right {
	text-align: right;
}

.btn-submit {
	margin-top: 20px;
	padding: 10px 20px;
	background: #FFF;
	border: #aaa 1px solid;
	border-radius: 4px;
	margin: 20px 0px;
}

#min {
	float: left;
	width: 70px;
	padding: 5px 10px;
	margin-right: 14px;
}

#slider-range {
	width: 75%;
	float: left;
	margin: 5px 0px 5px 0px;
}

#max {
	float: right;
	width: 70px;
	padding: 5px 10px;
}

.no-result {
	padding: 20px;
	background: #ffdddd;
	text-align: center;
	border-top: #d2aeb0 1px solid;
	color: #6f6e6e;
}

.product-thumb {
	width: 50px;
	height: 50px;
	margin-right: 15px;
	border-radius: 50%;
	vertical-align: middle;
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

  /* 48em = 768px @ 16pt font */

@media (min-width: 60em) {
  .header li {
    float: left;
  }
  .header li a {
    padding: 20px 20px;
  }
  .header .menu {
    clear: none;
    float: right;
    max-height: none;
  }
  .header .menu-icon {
    display: none;
  }
}

a:hover{
  color:#f5a623;
}

</style>

<body>
<header class="header">
            <a href="#" class="logo"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
        <ul class="menu">
            <li><a href="../visitor/register.php" style="color:#f5a623;font-weight:bold;margin-top:-3px;">Register Now!</a></li>
            <li><a style="margin-top:-3px;" href="../index.php">Home</a></li>
            <li><a style="margin-top:-3px;" href="../visitor/vProduct.php">Product</a></li>
            <li><a style="margin-top:-3px;" href="../visitor/about_us.php">About</a></li>
            <li><a style="margin-top:-3px;" href="../visitor/login.php">Login</a></li>
        </ul>
        </header>

<form id="Formid" method="post" action="">
  <div class="search">
          <input type="text" name="search_product" id="search_product" value="<?php echo $keyword ?>" placeholder="Search for Products, Brand and more..">
  </div>

  <section class="page-section">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 blog-form">

          <h2 class="blog-sidebar-title"><b>Categories</b></h2>
          <hr />


          <?php
                        if ($result5->num_rows > 0) {    
                            while($row = $result5->fetch_assoc()) {
                                //display result
                                $id=$row['id'];
                                $name=$row['name'];
                    ?>
          <p class="blog-sidebar-list"><a style="color:black"><input type="radio" name="category" id="<?php echo $name ?>" value="<?php echo $name ?>" <?php echo ($select_category== $name)?'checked':'' ?>> <?php echo $name ?> <br></a></p>

          <?php
                            }
                          }
          ?>
         
        </div>
        <!--END  <div class="col-lg-3 blog-form">-->

        <div class="col-lg-9" style="padding-left: 30px;">
          <div class="row">
            <div class="col">
              
            </div>

          </div>
          <!-- Sorting by <div class="row"> -->

          <div class="form-price-range-filter">

            <div>
                <input type="" id="min" name="min_price"
                    value="<?php echo $min; ?>">
                <div id="slider-range"></div>
                <input type="" id="max" name="max_price"
                    value="<?php echo $max; ?>">
            </div>
            <div>
                <input type="submit" name="submit_range" value="Filter Product" class="btn-submit">
                <input type="button" onClick="window.location.href=window.location.href" value="Reset" class="btn-submit">
            </div>
        </form>
    </div>
          <div class="row">
          
          <?php
                        if ($result->num_rows > 0) {    
                            while($row = $result->fetch_assoc()) {
                                $id=$row['id'];
                                $title=$row['title'];
                                $description=$row['description'];
                                $quantity=$row['quantity'];
                                $price=$row['price'];
                                $image=$row['image'];
                    ?>

            <div class="col-sm-3 col-md-6 col-lg-4" style="cursor: pointer;margin-bottom:20px;"  style="margin-bottom:20px;">
              <div class="card">
                <div class="card-body text-center">
                  <img src="../images/<?php echo $image;?>" class="product-image">
                  <h5 class="card-title" style="display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;height:65px;"><b><?php echo $title;?></b></h5>
                  <p class="card-text small" style="display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;height:37px;"><?php echo $description;?></p>
                  <p class="tags">RM <?php echo $price;?></p>
                  
                  <a href="product_detail.php?pid=<?php echo $id;?>" target="_blank" class="btn btn-success button-text"> Check Details</a>
                            </div>
                
              </div>
            </div>
          
            <?php
                            } //end while loop
                        }else echo "<p display: flex; flex-direction: column;>"."No results found."."<span>"."    Try different or more general keywords."."</span>"."</p>";
                        
                    ?>

          </div>
          <?php 
        
        $select_category="";
if (empty($_POST['category'])) {
  $pr_query = "select * from product where shelf='on' and quantity>0 and price BETWEEN '$min' AND '$max' and title like '%$keyword%' ORDER BY price";
  $pr_result=$conn->query($pr_query);
  $total_record = mysqli_num_rows($pr_result);
}else if(! empty($_POST['category'])){
  $select_category = $_POST['category'];
  $pr_query="select * from product where shelf='on' and quantity>0 and category ='$select_category' and price BETWEEN '$min' AND '$max' and title like '%$keyword%' ORDER BY price";
  $pr_result=$conn->query($pr_query);
  $total_record = mysqli_num_rows($pr_result);
}
                
                
                $total_page = ceil($total_record/$num_per_page);

                if($page>1)
                {
                    echo "<a href='vProduct.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "<a href='vProduct.php?page=".$i."' class='btn btn-primary'>$i</a>";
                }

                if($i>$page)
                {
                    echo "<a href='vProduct.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                }
        
        ?>
          <!-- Sorting by <div class="row"> -->



        </div>
        <!--END  <div class="col-lg-9">-->

      </div>
    </div>
  </section>


</body>
</html>