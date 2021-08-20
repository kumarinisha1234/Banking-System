<?php
include 'config.php';

if(isset($_POST['submit']))
{
	$from = $_GET['id'];
	$to = $_POST['to'];
	$amount = $_POST['amount'];


	$sql ="SELECT * from users where id=$from";
	$query = mysqli_query($conn,$sql);
	$sql1 =mysqli_fetch_array($query); //returns  the output of user from which amount is to be transfered.



	$sql ="SELECT * from users where id=$to";
	$query = mysqli_query($conn,$sql);
	$sql2 =mysqli_fetch_array($query);//returns  the output of user from which amount is to be transfered.
 

 //constrints to check insufficent balance.
	if($amount> $sql1['balance'])
	{
		echo '<script type="text/javascript">';
		echo 'alert("Error -insufficent Balance")'; //showing alert msg box;
		echo '</script>';
	}
	else{
		//deducting amount from sender's account.
		$newbalance = $sql1['balance'] - $amount;
		$sql = "UPDATE users set balance=$newbalance where id=$from";
		mysqli_query($conn,$sql);

        //adding amount to receiver acount.
        $newbalance =$sql2['balance'] +  $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
		mysqli_query($conn,$sql);

		$sender = $sql1['name'];
		$receiver =$sql2['name'];

		$sql ="INSERT INTO transaction(sender,Receiver,balance) VALUES ('$sender','$receiver',$amount)";
		$query =mysqli_query($conn,$sql);

		if($query){
			echo "<script> alert('Hurray! transcation is successful');
			    window.location='transaction.php';
			    </script>";
		}
		$newbalance= 0;
		$amount =0;
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Easy money transfer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
    	
    	button{
    		border: none;
    		background: #d9d9d9;
    	}
    	button.hover{
    		background-color: #777EBB;
    		transform: scale(1.1);
    		color: tomato;
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
					<a class="nav-link active" aria-current="page" href="transaction.php">Transfer History</a>
					
					</li>
					
					</div>
				</ul>
				
			</div>
		</div>
	</nav>
<body style="background-color: #000008B;">

	<div class="container">
		<h2 class="text-center pt-4" style="color: purple;">Easy Money Transfer</h2>
		<?php

		include 'config.php';
		$sid =$_GET['id'];
		$sql ="SELECT * FROM users where id=$sid";
		$result =mysqli_query($conn,$sql);

		if(!$result)
		{
			echo "Error : ".$sql."<br" .mysqli_error($conn);
		}
		$rows=mysqli_fetch_assoc($result);
		?>
		<form method="post" name="tcredit" class="tabletext" ><br>
			<div>
				<table class="table table-striped table-condensed table-bordered">
					<tr style="color: purple;">
						<th class="text-center">Account No.</th>
						<th class="text-center">Account Name</th>
						<th class="text-center">E-mail</th>
						<th class="text-center">Account Balance(in Rs.)</th>
							
						</tr>
						<tr style="color: purple;">
							<td class="py-2"><?php echo $rows['id']?></td>
							<td class="py-2"><?php echo $rows['name']?></td>
							<td class="py-2"><?php echo $rows['email']?></td>
							<td class="py-2"><?php echo $rows['balance']?></td>
							
							
						</tr>
					
				</table>
			</div>
			<br><br><br>

			<label style="color: purple;"><b>Transfer To:</b></label>
			<select name="to" class="form-control" required>
				<option value=""selected>Choose</option>
					<?php
				include 'config.php';
				$sid=$_GET['id'];
				$sql ="SELECT * FROM users where id!=$sid";
				$result=mysqli_query($conn,$sql);
				

				if(!$result)
				{
					echo "Error".$sql."<br>".mysqli_error($conn);
				}
				while ($rows=mysqli_fetch_array($result)) {
					

					?>
					<option class="table" value="<?php echo $rows['id'];?>">
						<?php echo $rows['name'];?>(balance:
						<?php echo $rows['balance'];?>)

					
			</option>
			<?php

				}
				?>
			</div>
			</select>
			<br>
			<br>
			<label style="color: black;"><b>Amount:</b></label>
			<input type="number" class="form-control" name="amount" required>
			<br><br>
			<div class="text-center">
				<button class="btn-mt-3" name="submit" type="submit" id="myBtn">Transfer Money</button>
				
			</div>
			
		</form>
		
	</div>

</body>
</html>