<?php

include 'config.php';
session_start();

//$date='';

if(isset($_POST['submit'])) {
$curuser = $_SESSION['username'];
echo $curuser;
$bcheck = "SELECT USER FROM budget WHERE USER = '$curuser'";
$bchkres = mysqli_query($conn,$bcheck);
$bauth = mysqli_fetch_assoc($bchkres);
if($bauth['USER'] === $curuser) {
	//Income Extraction
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$in1 = $_POST['incometype'];
	$in2 = $_POST['incomevalues'];
	//echo "Incomes : <br/>";
	foreach($in1 as $v => $vv){
		//echo $curuser."<br>";
		//echo "into the for loop<br/>";
		$sql1 = "INSERT INTO $curuser (user,imonth,iyear,idate,itype,ivalue) VALUES ('$curuser','$month','$year','$date','$in1[$v]','$in2[$v]')";
		$sql2 = mysqli_query($conn,$sql1);
		if($conn->query($sql2)===TRUE) {
			//echo "successfully added into $curuser<br/>";
		}
		else {
			echo "not added to database<br/>";
		}
		//echo "$in1[$v] "."-"." $in2[$v]";
		//echo "<br/>";
	}
	//Expense Extraction
	$exp1 = $_POST['expensetype'];
	$exp2 = $_POST['expensevalues'];
	//echo "Expenses : <br/>";
	foreach($exp1 as $e => $ee){
		$sql2 = "INSERT INTO $curuser (user,imonth,iyear,idate,itype,ivalue) VALUES ('$curuser','$month','$year','$date','$exp1[$e]','$exp2[$e]')";
		if($conn->query($sql2) === TRUE) {
			//echo "successfully added into $curuser<br/>";
		}
		else {
			echo "not added to database<br/>";
		}
		//echo "$exp1[$e] "."-"." $exp2[$e]";
		//echo "<br/>";
	}
}
header('location:bhome.php');		
}
/*
if(isset($_POST['monthlysubmit']) or isset($_POST['annualsubmit']))
{
	$chkbox = $_POST['monthlychk'];
	$txtbox = $_POST['monthlytxt'];
	$country = $_POST['monthlycountry'];

	foreach($txtbox as $a => $b)
  		echo "$chkbox[$a]  "."-"."  $txtbox[$a]"."-"."  $country[$a] <br />";	

  	$chkbox2 = $_POST['annualchk'];
	$txtbox2 = $_POST['annualtxt'];
	$country2 = $_POST['annualcountry'];

	foreach($txtbox2 as $aa => $bb)
  		echo "$chkbox2[$aa]  "."-"."  $txtbox2[$aa]"."-"."  $country2[$aa] <br />";	



}
*/
/*
if(isset($_POST['annualsubmit']))
{
	$chkbox = $_POST['annualchk'];
	$txtbox = $_POST['annualtxt'];
	$country = $_POST['annualcountry'];

	foreach($txtbox as $a => $b)
  		echo "$chkbox[$a]  "."-"."  $txtbox[$a]"."-"."  $country[$a] <br />";	
}

*/

?>