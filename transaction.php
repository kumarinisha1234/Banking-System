<!DOCTYPE html>
<html>
<head>
	<title>transcation</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 	
 	
    <link rel="stylesheet" type="text/css" href="style.css">

<body>
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
	<div class="container">
		<h2 class="text-center pt-4" > Transfer History</h2>
		<br>
		<div class="table-responsive-sm">
					<table class="table table-hover table-sm-striped table-bordered">
						<thead style="color: black;">
							<tr>
								<th  class="text-center py-2 ">s.no</th>
								<th  class="text-center py-2 ">Sender</th>
								<th  class="text-center py-2 ">Receiver</th>
								<th  class="text-center py-2 ">Amount</th>
							</tr>
							
						</thead>
						<tbody>
							<?php
	                         include 'config.php';
	                            $sql ="SELECT * from transaction";
	                       $query =mysqli_query($conn,$sql);
	                       while ($rows=mysqli_fetch_assoc($query)) 
	                       { 
	                       	?>
                                  
                                  <tr style="color: purple;">
									<td class="py-2"><?php echo $rows['s.no']?></td>
									<td class="py-2"><?php echo $rows['sender']?></td>
									<td class="py-2"><?php echo $rows['Receiver']?></td>
									<td class="py-2"><?php echo $rows['balance']?></td>
								</tr>
									<?php
								}


	                       ?>
	                         
						</tbody>
					</table>
		</div>
	</div>

</body>
</html>