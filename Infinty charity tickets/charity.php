<!DOCTYPE html>
<?php
require 'db.php';
?>

<html> 
	<head>
		<meta charset="utf-8">
		<title>Buy Tickets</title>
		<link rel="stylesheet" type="text/css" href="app.css">
		 	<link rel="stylesheet" type="text/css" href="footer.css">
		 	<link rel="stylesheet" type="text/css" href="nav.css">
	</head>
	<body>

		<span id="app"></span>

	    <main class="py-4">
	        <div class="container">

	        	<h1> <img src="images/logo.png" width="200px" height="200px">Infinity Charity Organisation</h1>
<nav>
  <ul class="menu">
    <li><a href="#!">Home</a></li>
    <li><a href="#!">About us</a></li>
    <li><a href="#!">Contact</a></li>
    <li><a href="#!">Donation</a></li>
  </ul>
</nav>

	        	<h3>Pay for your ticket here..</h3>
	        	<hr>

	        	<?php

	        	   $tickets = "SELECT * FROM tickets";

	        	   $records = $dbconnection->query($tickets); 


	        	 ?>
 	<div class="row">

<?php

	        		  foreach ($records as $key => $value) {

	        		  	$id = $value['id'];
	        		  	$name = $value['name'];
	        		  	$price = $value['price'];

	        		  	?>

	        		  		  	<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 col-xl-6">

	        		  		<h3><img src="images/tk.png" width="100px" height="100px"><?php echo  $name?></h3>
	        		  		<hr>
	        		  		<strong>UGX <?php echo $price ?></strong><br>
	        		  		<a href="pay_here.php?id=<?php echo $id ?>" class="btn btn-success">Pay Ticket</a>

	        		    </div>
	        		    	<?php
	        		   
	        		   	 
	        		   } 


	        		 ?>


	        	</div>


	        	<hr>

	        	<h3>Payments</h3>
	        	<hr>

	        	<table class="table table-striped table-hover">

	        		<th>ID</th> <th>Customer</th> <th>Status</th> <th>Amount</th> <th>Plan</th>


	        	<?php 

	        	   $paymentRecords = $dbconnection->query("SELECT payments.name as customer_name, phone_number,tickets.name as ticket_name, payments.price as amount, payments.id as transaction_id,status FROM payments,tickets WHERE payments.plan_id = tickets.id"); 

	        	   foreach ($paymentRecords as $key => $payment) {

	        	   	$id = $payment["transaction_id"];
	        	   	$name = $payment["customer_name"];
	        	   	$phone_number = $payment["phone_number"];
	        	   	$status = $payment["status"];
	        	   	$amount = $payment["amount"];
	        	   	$ticket_name = $payment["ticket_name"];

	        	   	?>

	        	   	   	<tr>

	        	   		<td><?php echo $id ?></td>
	        	   		<td><?php echo $name ?><br><?php echo $phone_number ?></td>
	        	   		<td>

	        	   					<?php 

	        	   			if($status == "successful")
	        	   				echo "<span class='text-success'> $status </span>";

	        	   			else

	        	   				echo "<span class='text-warning'> $status </span>";

	        	   			?>

	        	   			   			</td>
	        	   		<td><?php echo $amount ?></td>
	        	   		<td><?php echo $ticket_name ?></td>
	        	   	 
	        	   		


	        	   	</tr>



	        	   	<?php




 
	        	   }


	        	 ?>



	                

	        </div>
	    </main>
</body>

<footer id="fh5co-footer" class="fh5co-bg" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>A Little About Infinity Charity Organisation.</h3>
					<p>It was founded to help the children that are in need in every way possible, in Uganda and Africa at large.</p>
					<p><a class="btn btn-primary" href="#">Become A Member</a></p>
				</div>
				<div class="col-md-8">
					<h3>Visit us</h3>
					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="fh5co-footer-links">
							<li><a href="#">Home</a></li>
							<li><a href="#">Donation</a></li>
							<li><a href="#">Gallery</a></li>
							<li><a href="#">Seminars</a></li>
							<li><a href="#">About us</a></li>
						</ul>
					</div>

 
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2021 | All Rights Reserved.</small> 
						<small class="block">Powered by  Infinity Charity Organisation.com</small>
					</p>
				</div>
			</div>

		</div>
	</footer>

</html>
