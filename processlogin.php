<?php

include 'config.php';

//Storing data in php variables
$username = $_POST['username'];
$password = $_POST['password'];

//Checking for authenticated User

$user_check_query = "SELECT * FROM registerdetails WHERE USERNAME = '$username' or PASSWORD = '$password'";

$results = mysqli_query($conn, $user_check_query);
$authenticateduser = mysqli_fetch_assoc($results);

if($authenticateduser['USERNAME'] === $username && $authenticateduser['PASSWORD'] === $password)
{
	
	session_start();
	$_SESSION['username'] = $username;
	header("location:loggedin.php");
}
else
{	
	header("location:index.php");
	
}

?>
