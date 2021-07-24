<!DOCTYPE html>
<?php

require ('db.php');

  ?>
 <html> 
	<head>
		<meta charset="utf-8">
		<title>Buy Tickets</title>
		<link rel="stylesheet" type="text/css" href="app.css">
	</head>
	<body>

		<span id="app"></span>

	    <main class="py-4">
	        <div class="container">

	        	<h1> <img src="images/logo.png" width="200px" height="200px">Infinity Charity Organisation</h1><br>

	        		<img src="images/banner.jfif" width="1200px" height="300px">

	        	<hr>

	        	<span style="font-size: 40px;"><?php echo  $_GET['message'] ?></span>

	        	</div>
	    </main>

	</body>
</html>