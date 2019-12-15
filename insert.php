<?php

	$con = mysqli_connect('127.0.0.1','root','');
	
	if(!$con)
	{
		echo 'Not Connected To Server';
	}
	
	if(!mysqli_select_dev($con,'Seller_Information')){
	{
		echo 'Database not Selected';
	}
	
	$Name = $_POST['username'];
	$Address = $_POST['address'];
	$City = $_POST['city'];
	$Province = $_POST['province'];
	$PostalCode = $_POST['postalcode'];
	$Phone = $_POST['phone'];
	$Email = $_POST['email'];
	

	
	$sql = "INSERT INTO Seller_Information (name,email) VALUES ('$Name','$Address','$City','$Province','$PostalCode','$Phone','Email')";
	
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		echo 'Inserted';
	}
	
	header("refresh:2; url=index.html.html");

?>