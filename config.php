<?php
$conn=new mysqli("localhost","root","","samplenew2");
if($conn->connect_error)
{
	 echo $conn->connect_error;
	 echo "<br>";
	 die("sorry database connection failed");
}
else
{
	echo "successfully connected to database<br>";
}
?>