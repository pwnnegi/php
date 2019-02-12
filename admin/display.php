
<?php session_start(); ?>
 <?php 
if(isset($_SESSION['admin'])){

}
else
{
	header("location:login.php");
}
?>
<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"shoe_db");

	$q="select * from product";
	$res=mysqli_query($con,$q);

?>
<?php include('menu.php') ?>

<table border="1">

	<tr>
		<th>Id</th>
		<th>Name:</th>
		<th>Price:</th>
		<th>Photo:</th>
		<th>Description:</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
	<?php
	while($row=mysqli_fetch_array($res)) {
	
?>

	<tr>
		<td><?=$row['id'];?></td>
		<td><?=$row['name'];?></td>
		<td><?=$row['price'];?></td>
		<td>
		<?php $new_photo=explode(',',$row['photo'] );
		for($i=0;$i<count($new_photo);$i++)
			{?>
		<img src="./photos/<?php echo $new_photo[$i]; ?>"height="50px;" weight="50px;">
		<?php
	}?>
</td>
		<td><?=$row['Description'];?></td>
		<td><a href="edit.php ?id=<?php echo $row['id']; ?>"">Edit</a></td>
		<td><a href="delete.php ?id=<?php echo $row['id']; ?>"">Delete</a></td>
	</tr>
<?php } ?>
</table>
