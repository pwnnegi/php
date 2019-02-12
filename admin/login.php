<?php 

	$con=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($con,"shoe_db");

	if(isset($_POST['submit'])){

		$name=$_POST['username'];
		$pass=$_POST['password'];


		$q="SELECT * FROM admin WHERE username='$name' and password='$pass'"or die(mysqli_error($con));

		$res=mysqli_query($con,$q);
		if($res){

			session_start();
			$_SESSION['admin']=1;
			header("location:index.php");
		}
		else{
			
			echo mysqli_error($con);

			echo "plz enter valid id and password";
		}
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 	<form action="" method="POST">
 		

 		Username:<input type="text" name="username"><br>

 		Password:<input type="password" name="password"><br>

 		<input type="submit" name="submit" value="Login">

 	</form>

 </body>
 </html>