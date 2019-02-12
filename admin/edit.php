<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"shoe_db");

	$id=$_GET['id'];

	if(isset($_POST['submit']))
	{


		$name=$_POST['name'];
		$price=$_POST['price'];
		$photo=$_FILES['file']['name'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$des=$_POST['Description'];

		$target='./photos/'.$photo;
		move_uploaded_file($tmp_name,$target);


	$q="UPDATE product SET name='$name',price='$price',photo='$photo',Description='$des' WHERE id='$id'";
	$query=mysqli_query($con,$q);
	if($query){


		header('location:display.php');
	}
	else{

		echo mysqli_error($con);
	}

}
	?>
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
 		<?php 
		$s="select * from product where id='$id'";
		$res=mysqli_query($con,$s); 		

 		while ($row=mysqli_fetch_array($res)) {
 			
 		 ?>
 		<tr>
 				<td>Name:</td>
 			<td>
 				<input type="text" name="name" value="<?php echo $row['name']; ?>">
 			</td>
 		<tr>
 				<td>Price:</td>
 			<td>
 				<input type="text" name="price" value="<?php echo $row['price']; ?>">
 			</td>
 		</tr>
 		<tr>
 				<td>Photo:</td>
 			<td>
 				<input type="file" name="file">
 			</td>
 		</tr>
 		<tr>
 				<td>Description:</td>
 			<td>
 				<input type="text" name="Description" value="<?php echo $row['Description']; ?>">
 			</td>
 		</tr>
 	
 		<tr>
 		<tr>
 			<td>
 				<input type="submit" name="submit" value="submit">
 			</td>
 		</tr>
 	<?php } ?>
 		</table>
 	</form>

 </body>
 </html>