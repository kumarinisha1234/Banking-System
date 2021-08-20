<!DOCTYPE html>
<html>
<head>
	<title>our customers</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">

    	button{
    		transition: 1.5s;
    		

    	}
    	button.hover{
    		background-color: black;
    		color: white;
    	}
    	.btn{
    		width: 80%;
    		background-color: green;
    		color: white;
    		margin: auto;
    	}
    </style>

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Zombie bank</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
				<span class="navbar-toggle-icon"></span>
				
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					
					</li>
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="customers.php">our customers</a>
					
					</li>
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="transaction.php">transfer History</a>
					
					</li>
					
					</div>
				</ul>
				
			</div>
		</div>
	</nav>
<body  background ="blue;">

	<?php
	include 'config.php';
	$sql ="SELECT *FROM users";
	$result =mysqli_query($conn,$sql);
	?>


	<div class="container">
		<h2 class="text-center pt-4" style="color; blue";>Our Customers</h2>
		<br>
		<div class="row">
			<div class="col">
				<div class="table-responsive-sm">
					<table class="table table-hover table-sm-striped table-condensed table-bordered" style ="border-color: green;">
						<thead style="color: tomato;">
							<tr>
								<th scope="col" class="text-center py-2 ">Account no.</th>
								<th scope="col" class="text-center py-2 ">Account holder name</th>
								<th scope="col" class="text-center py-2 ">E-mail</th>
								<th scope="col" class="text-center py-2 ">Account Balance(in Rs.)</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
							while ($rows=mysqli_fetch_assoc($result)) {
								?>
								<tr style="color: black;">
									<td class="py-2"><?php echo $rows['id']?></td>
									<td class="py-2"><?php echo $rows['name']?></td>
									<td class="py-2"><?php echo $rows['email']?></td>
									<td class="py-2"><?php echo $rows['balance']?></td>
									<td><a href="selectedusersdetails.php?id= <?php echo $rows['id'] ;?>"><button type="button" class="btn" style="background-color: green" style="color: white"> Transfer Money </button></a>
							</tr>
							<?php

							}
							?>
						</tbody>
					
                    </table>
				</div>
				
			</div>
			
		</div>
	</div>

</body>
</html>