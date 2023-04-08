<?php
include('order.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-6">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/order.js"></script>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	
	<br/><br/>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>Add New Order</h4>
				  </div>
				  <div class="card-body">
                  <form action="" method="GET">
                            <div class="row" style="margin-left:100px">
                                <div class="col-md-8">
                                    <input required type="text" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4"><br>
                                    <button type="submit" class="btn btn-primary" style="margin-top:-25px">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","test");

                                    if(isset($_GET['id']))
                                    {
                                        $id = $_GET['id'];

                                        $query = "SELECT * FROM product WHERE ID='$id' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <form action="" method="POST">
                                                  
                                                    <input type="hidden" readonly name="id2" class="form-control form-control-sm" id="ID2" value="<?= $row['ID']; ?>"/>
                                                     
                                                    <div class="form-group row">
                                                    <label for="product_name" class="col-sm-3 col-form-label" align="right">Product Name</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" readonly name="pname" class="form-control form-control-sm" id="product_name" value="<?= $row['Name']; ?>"/>
                                                    </div>
                                                    </div>                   
                                                    <div class="form-group row">
                                                    <label for="quantity" class="col-sm-3 col-form-label" align="right">Total Quantity</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" readonly name="tquantity" class="form-control form-control-sm" id="tquantity" value="<?= $row['Quantity']; ?>"/>
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="quantity" class="col-sm-3 col-form-label" align="right">Quantity</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" name="pquantity" class="form-control form-control-sm" id="pquantity" required />
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="price" class="col-sm-3 col-form-label" align="right">Price</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" readonly name="pprice" class="form-control form-control-sm" id="price" value="<?= $row['Price']; ?>"/>
                                                    </div>
                                                    </div>
                                                    <!-- <div class="form-group row">
                                                    <label for="total_price" class="col-sm-3 col-form-label" align="right">Total Price</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" readonly name="tprice" class="form-control form-control-sm" id="total_price" >
                                                    </div>
                                                    </div> -->
                                                    <center>
                                                    <input type="submit" name="order" style="width:150px;" class="btn btn-info" value="Order">
                                                    </center>
                                            </form>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>


				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>