<!doctype html>
<html>
    <head>
        <title>Income List | Seller</title>
        <link rel="icon" href="../images/logo/icon.png" sizes="32x32" type="image/png" sizes="50x50">

        <!-- Datatable CSS -->
        <link href='../css/datatables.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/menu.css">

        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">

        <!-- jQuery Library -->
        <script src="../javascript/jquery-3.4.1.min.js"></script>

        <script type="text/javascript" src="../javascript/jquery-ui.min.js"></script>

        <!-- Datatable JS -->
        <script src="../javascript/datatables.min.js"></script>
    
<style>
    #btn_search {
        background-color: #f5a623; /* Green */
  border: none;
  color: white;
  padding: 8px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

input[type="text"] {
  padding:   6px 8px;
  margin:    0;
  @include   box-shadow(none);
  @include   border-radius(5px);
  border:    1px solid #ccc;
  font-size: 16px;
}
</style>

    </head>
    <body>
    <header class="header">
            <a href="#" class="logo"><img src="../images/logo/logo.png" height="50px" alt=""></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
	    <ul class="menu">
            <li><a href="../buyer/buyerMain.php" style="color:#f5a623;font-weight:bold;">Buyer Centre</a></li>
            <li><a href="sellerMain.php">Home</a></li>
            <li><a href="sellerProduct.php">My Product</a></li>
    		<li><a href="sellerOrder.php">My Order</a></li>
    		<li><a href="income.php">My Income</a></li>
    		<li><a href="../logout.php">Logout</a></li>
        </ul>
        </header>

        <div style="margin-left:80px;margin-right:80px;text-align:center">
            <!-- Date Filter -->
            <table style="margin:30px 0 30px 0">
                <tr>
                    <td>
                        <input type='text' readonly id='search_fromdate' class="datepicker" placeholder='From date'>
                    </td>
                    <td>
                        <input type='text' readonly id='search_todate' class="datepicker" placeholder='To date'>
                    </td>
                    <td>
                        <input type='button' id="btn_search" value="Search">
                    </td>
                </tr>
            </table>
            
            <!-- Table -->
            <table id='empTable' class='display dataTable'>
                <thead>
                <tr>
                    <th>Date & Time</th>
                    <th>Transaction History</th>
                    <th>Amount (RM)</th>
                </tr>
                </thead>
                
                <tfoot>
                  <tr>
                     <th></th>
                     <th style="text-align:right">Total Price (RM):</th>
                     <th></th>
                  </tr>
               </tfoot>
            </table>
        </div>
        
        <!-- Script -->
        <script>
        $(document).ready(function(){

            // Datapicker 
            $( ".datepicker" ).datepicker({
                "dateFormat": "yy-mm-dd",
                changeYear: true
            });

            // DataTable
            var dataTable = $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': true, // Set false to remove default Search Control
                'ajax': {
                    'url':'ajaxfile.php',
                    'data': function(data){
                        // Read values
                        var from_date = $('#search_fromdate').val();
                        var to_date = $('#search_todate').val();

                        // Append to data
                        data.searchByFromdate = from_date;
                        data.searchByTodate = to_date;
                    }
                },
                'columns': [
                    { data: 'time' },
                    {
                            "data": "transaction_id",
                            "render": function(data, type, row, meta) {
                                return `Income from Order #${row.transaction_id}`;
                            }
                        },
                        {
                            "data": "totalPrice",
                            "render": function(data, type, row, meta) {
                                return `+ ${row.totalPrice}`;
                            }
                        },
                ],
                footerCallback: function(tfoot, data, start, end, display) {
                  var api = this.api();
                  $(api.column(2).footer()).html(
                     api.column(2).data().reduce(function(a,b) {
                        return (+a + +b);
                     }, 0)
                  );
               }
            });



            // Search button
            $('#btn_search').click(function(){
                dataTable.draw();
            });
           
        });
        </script>
    </body>

</html>
