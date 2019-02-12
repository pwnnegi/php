<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"shoe_db");

	$id=$_GET['id'];

	$Q="DELETE FROM product where id='$id'";
	$res=mysqli_query($con,$Q);

	if($res){

		header('location:display.php');
	}
	else{
			echo mysqli_error($con);
	}


	?>
