<?php

include 'config.php';

session_start();

$tempusr = $_SESSION['username'];

$user=$month=$year='';
$income=$shelter=$medical=$grocery=$electric=$mobile=$cable=$tuition=$transport=$others='';

if(isset($_POST['set'])) {
	$user = $tempusr;
	if(isset($_POST['month'])) { $month = $_POST['month']; }
	if(isset($_POST['year'])) { $year = $_POST['year']; }
	if(isset($_POST['income'])) { $income = $_POST['income']; }
	if(isset($_POST['shelter'])) { $shelter = $_POST['shelter']; }
	if(isset($_POST['medical'])) { $medical = $_POST['medical']; }
	if(isset($_POST['transport'])) { $transport = $_POST['transport']; }
	if(isset($_POST['tuition'])) { $tuition = $_POST['tuition']; }
	if(isset($_POST['others'])) { $others = $_POST['others']; }
	if(isset($_POST['grocery'])) { $grocery = $_POST['grocery']; }
	if(isset($_POST['electric'])) { $electric = $_POST['electric']; }
	if(isset($_POST['mobile'])) { $mobile = $_POST['mobile']; }
	if(isset($_POST['cable'])) { $cable = $_POST['cable']; }

}

if(($year!=null) && ($month!=null) && ($income!=null) && ($shelter!=null) && ($medical!=null) && ($tuition!=null) && ($others!=null) && ($grocery!=null) && ($electric!=null) && ($mobile!=null) && ($cable!=null))
{
	$sql = "INSERT INTO setbudget(user,month,year,type,value) values ('$user','$month','$year','income','$income'),('$user','$month','$year','shelter','$shelter'), ('$user','$month','$year','medical','$medical'), ('$user','$month','$year','tuition','$tuition'), ('$user','$month','$year','transport','$transport'), ('$user','$month','$year','others','$others'), ('$user','$month','$year','grocery','$grocery'), ('$user','$month','$year','mobile','$mobile'), ('$user','$month','$year','cable','$cable'), ('$user','$month','$year','electric','$electric')";
	if($conn->query($sql) === TRUE) {
		//echo "budget set successfully";
		header('location:bhome.php');
	}
	else{
		echo "Error in setting -> -> ".$sql."<br>".$conn->error;
	}
}
else {
	echo "smtng wrong";
}
?>