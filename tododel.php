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
$query1=mysqli_query($conn,"DELETE FROM todolist WHERE user='$curuser' AND todoname='$delrec'");
if($query1)
{
	header("Location:todo1.php");
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