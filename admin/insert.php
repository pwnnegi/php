<?php
	session_start();
	if(isset($_SESSION['admin']))
	{

	}
	else{
		header("location:login.php");
	}
	echo $_SESSION['admin'];
require_once "config.php";
	if(isset($_POST['submit']))
	{
	$name=$_POST['name'];
	$price=$_POST['price'];
	$photo=$_FILES['file']['name'];

	$photo1=implode(',', $photo);
	$des=$_POST['Description'];
	for($i=0; $i<count($photo); $i++){

	$tmp_name=$_FILES['file']['tmp_name'][$i];
	$target='./photos/'.$photo[$i];
	move_uploaded_file($tmp_name,$target);
}

	if($photo)
	{

	$q="insert into product(name,price,photo,Description) values ('$name','$price','$photo1','$des')";
	$query=mysqli_query($con,$q);
	if($query)
	{
		
	}
	else{
		echo "not inserted".mysqli_error($con);
	}
}
}	

 ?>
<?php include('menu.php') ?>

 <!DOCTYPE html>
 <html lang="eng">
 <head>
 	<meta charset="utf-8">
 	<title>insert  item</title>
 </head>
 <body>
 	<h1>Enter product Detail</h1>
 	<form action="" method="POST" enctype="multipart/form-data">
 		<table>
 		<tr>
 				<td>Name:</td>
 			<td>
 				<input type="text" name="name">
 			</td>
 		<tr>
 				<td>Price:</td>
 			<td>
 				<input type="text" name="price">
 			</td>
 		</tr>
 		</tr>
 		<tr>
 				<td>Photo:</td>
 			<td>
 				<input type="file" name="file[]" multiple/>
 			</td>
 		</tr>
 		<tr>
 				<td>Description:</td>
 			<td>
 				<input type="text" name="Description">
 			</td>
 		</tr>
 	
 		<tr>
 		<tr>
 			<td>
 				<input type="submit" name="submit" value="submit">
 			</td>
 		</tr>
 		<tr>
 			</td>
 		</tr>
 		
 		</table>
 	</form>
 </body>
 </html>