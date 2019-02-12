<?php
	session_start();
	if(isset($_SESSION['admin']))
	{

	}
	else{
		header("location:login.php");
	}
	echo $_SESSION['admin'];
 ?>
 <?php include('menu.php'); ?>
 <h1>Dashbord</h1>
