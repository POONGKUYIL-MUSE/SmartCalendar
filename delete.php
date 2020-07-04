<?php
ob_start();
	include'config.php';
	
?>

<html>
<body>
<?php

session_start();
$curuser = $_SESSION['username'];

if(isset($_GET['del']))
{
$delrec=$_GET['del'];
$query1=mysqli_query($conn,"DELETE FROM eventstable WHERE USERNAME='$curuser' AND EVENTNAME='$delrec'");
if($query1)
{
	header("Location:events.php");
	exit();
}else{
     echo "Could not delete";
    /*header("Location:events.php");
    exit();*/
}
}
?>
</body>
</html>