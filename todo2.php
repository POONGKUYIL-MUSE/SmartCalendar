<?php
session_start();
include 'config.php';
$todoname='';
$currentuser=$_SESSION['username'];
if(isset($_POST['todoname'])) {
	$todoname = $_POST['todoname'];

if($todoname != NULL) {
	$sql = "INSERT INTO todolist (user,todoname) VALUES ('$currentuser','$todoname')";
	if($conn->query($sql) === TRUE) {

	}
	else {
		echo "Error".$sql."<br>".$conn->error;
	}
}
}
else
{
	echo "smtng wrong";
}
?>