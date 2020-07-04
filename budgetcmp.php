<?php

session_start();
include 'config.php';


?> 

<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



<style>
.danger {
  background-color: #ffdddd;
  border-left: 6px solid #f44336;
  height:30%;
  font-size : 20px;
}

.info {
  background-color: #e7f3fe;
  border-left: 6px solid #2196F3;
  height:30%;
  font-size : 20px;
}


.warning {
  background-color: #ffffcc;
  border-left: 6px solid #ffeb3b;
  height:30%;
  font-size : 20px;
}
	.success {
  background-color: #ddffdd;
  border-left: 6px solid #4CAF50;
  height:30%;
  font-size : 20px;
}
</style>
</head>
<body>
<table>
<?php

$user=$month=$year='';

if(isset($_POST['submit'])) {
	$user = $_SESSION['username'];
	if(isset($_POST['month']) && isset($_POST['year'])) 
	{
		$month = $_POST['month'];
		$year = $_POST['year'];
	}

	$salary=$grocery=$clothing=$shelter=$household=$transport=$medical=$restaurant=$electric=$tuition=$cable=$mobile=$others=$retirements=$otherincome=$emergency=0;
	$bincome=$btransport=$bshelter=$bmedical=$btuition=$bgrocery=$belectric=$bmobile=$bcable=0;
	$btotal=$bdiff=$budgetsaving=0;
	$itotal=$idiff=$isaving=0;

	$sql1 = "SELECT * FROM setbudget WHERE user='$user' and month='$month' and year='$year'";
	$sql2 = "SELECT * FROM $user WHERE imonth='$month' and iyear='$year'";
	$res1 = mysqli_query($conn,$sql1);
	$res2 = mysqli_query($conn,$sql2);
	
	if(! $res1) {
		die("couldnt retrieve".mysql_error());
	}
	while($row1 = mysqli_fetch_assoc($res1)) {
		if($row1['type'] === 'income')  {
			$bincome = $row1['value'];
			$btotal = $btotal+$bincome;
		}
		if($row1['type'] === 'shelter') {
			$bshelter = $row1['value'];
			$bdiff=$bdiff+$bshelter;
		}
		if($row1['type'] === 'medical') {
			$bmedical = $row1['value'];
			$bdiff=$bdiff+$bmedical;
		}
		if($row1['type'] === 'tuition') {
			$btuition = $row1['value'];
			$bdiff=$bdiff+$btuition;
		}
		if($row1['type'] === 'transport') {
			$btransport = $row1['value'];
			$bdiff=$bdiff+$btransport;
		}
		if($row1['type'] === 'grocery') {
			$bgrocery = $row1['value'];
			$bdiff=$bdiff+$bgrocery;
		}
		if($row1['type'] === 'electric') {
			$belectric = $row1['value'];
			$bdiff=$bdiff+$belectric;
		}
		if($row1['type'] === 'mobile') {
			$bmobile = $row1['value'];
			$bdiff=$bdiff+$bmobile;
		}
		if($row1['type'] === 'cable') {
			$bcable = $row1['value'];
			$bdiff=$bdiff+$bcable;
		}
		if($row1['type'] === 'others') {
			$bothers = $row1['value'];
			$bdiff=$bdiff+$bothers;
		}
		
	}
	$budgetsaving = $btotal - $bdiff;

	//user income expenses add up
	if(! $res2) {
		die("could not retrieve data".mysql_error());
	}
	while($row = mysqli_fetch_assoc($res2)) {
		//	echo "{$row['itype']}<br>";

		if($row['itype'] === 'salary') {
			$salary = $salary + $row['ivalue'];
			$itotal = $itotal + $salary;
		}

		if($row['itype'] === 'emergency') {
			$emergency = $emergency + $row['ivalue'];
			$itotal = $itotal + $emergency;
		}

		if($row['itype'] === 'retirements') {
			$retirements = $retirements + $row['ivalue'];
			$itotal = $itotal + $retirements;
		}

		if($row['itype'] === 'otherincome') {
			$otherincome = $otherincome + $row['ivalue'];
			$itotal = $itotal + $otherincome;
		}

		if($row['itype'] === 'grocery') {
			$grocery = $grocery + $row['ivalue'];
			$idiff = $idiff + $grocery;
		}

		if($row['itype'] === 'clothing') {
			$clothing = $clothing + $row['ivalue'];
			$idiff = $idiff + $clothing;
		}
		if($row['itype'] === 'shelter') {
			$shelter = $shelter + $row['ivalue'];
			$idiff = $idiff + $shelter;
		}
		if($row['itype'] === 'household') {
			$household = $household + $row['ivalue'];
			$idiff = $idiff + $household;
		}
		if($row['itype'] === 'transport') {
			$transport = $transport + $row['ivalue'];
			$idiff = $idiff + $transport;
		}
		if($row['itype'] === 'medical') {
			$medical = $medical + $row['ivalue'];
			$idiff = $idiff + $medical;
		}
		if($row['itype'] === 'restaurant') {
			$restaurant = $restaurant + $row['ivalue'];
			$idiff = $idiff + $restaurant;
		}
		if($row['itype'] === 'electric') {
			$electric = $electric + $row['ivalue'];
			$idiff = $idiff + $electric;
		}
		if($row['itype'] === 'tuition') {
			$tuition = $tuition + $row['ivalue'];
			$idiff = $idiff + $tuition;
		}
		if($row['itype'] === 'cable') {
			$cable = $cable + $row['ivalue'];
			$idiff = $idiff + $cable;
		}
		if($row['itype'] === 'mobile') {
			$mobile = $mobile + $row['ivalue'];
			$idiff = $idiff + $mobile;
		}
		if($row['itype'] === 'others') {
			$others = $others + $row['ivalue'];
			$idiff = $idiff + $others;
		}
	}
	$isaving = $itotal - $idiff;


	//budget value comparison
	//medical checkup
	if($bmedical > $medical) {
		$temp = $bmedical - $medical;
		echo "<div class='success'><p>Medical Expense : LOW<br>
		Budget : $bmedical<br>
		Spent : $medical<br>
		Profit : $temp<br>
		You are healthy !!!.You have saved $temp</p></div>";
	}
	elseif($bmedical < $medical){
		$temp = $medical - $bmedical;
		echo "<div class='danger'><p>Medical Expense : HIGH<br>
		Budget : $bmedical<br>
		Spent : $medical<br>
		Loss : $temp<br>
		You are too weak.</p></div>";
	}
	elseif($bmedical == $medical){
		echo "<div class='warning'><p>Medical Expense : ZERO<br>
		Budget : $bemedical<br>
		Spent : $medical<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//shelter
	if($bshelter > $shelter) {
		$temp = $bshelter - $shelter;
		echo "<div class='success'><p>Rental Expense : LOW<br>
		Budget : $bshelter<br>
		Spent : $shelter<br>
		Profit : $temp<br>
		Happy Living! You have saved $temp.</p></div>";
	}
	elseif($bshelter < $shelter){
		$temp = $shelter - $bshelter;
		echo "<div class='danger'><p>Rental Expense : HIGH<br>
		Budget : $bshelter<br>
		Spent : $shelter<br>
		Loss : $temp<br>
		You spent more on Housing Rental.</p></div>";
	}
	elseif($bshelter == $shelter){
		echo "<div class='warning'><p>Rental Expense : ZERO<br>
		Budget : $bshelter<br>
		Spent : $shelter<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//tuition
	if($btuition > $tuition) {
		$temp = $btuition - $tuition;
		echo "<div class='success'><p>Education Expense : LOW<br>
		Budget : $btuition<br>
		Spent : $tuition<br>
		Profit : $temp<br>
		Knowledge is the key to success! You have saved $temp.</p></div>";
	}
	elseif($btuition < $tuition){
		$temp = $tuition - $btuition;
		echo "<div class='danger'><p>Education Expense : HIGH<br>
		Budget : $btuition<br>
		Spent : $tuition<br>
		Loss : $temp<br>
		You spent more on Education.</p></div>";
	}
	elseif($btuition == $tuition){
		echo "<div class='warning'><p>Education Expense : ZERO<br>
		Budget : $btuition<br>
		Spent : $tuition<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//transport
	if($btransport > $transport) {
		$temp = $btransport - $transport;
		echo "<div class='success'><p>Transport Expense : LOW<br>
		Budget : $btransport<br>
		Spent : $transport<br>
		Profit : $temp<br>
		Travel around the World! You have saved $temp.</p></div>";
	}
	elseif($btransport < $transport){
		$temp = $transport - $btransport;
		echo "<div class='danger'><p>Transport Expense : HIGH<br>
		Budget : $btransport<br>
		Spent : $transport<br>
		Loss : $temp<br>
		Reduce your travel </p></div>";
	}
	elseif($btransport == $transport){
		echo "<div class='warning'><p>Transport Expense : ZERO<br>
		Budget : $btransport<br>
		Spent : $transport<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//grocery
	if($bgrocery > $grocery) {
		$temp = $bgrocery - $grocery;
		echo "<div class='success'><p>Grocery Expense : LOW<br>
		Budget : $bgrocery<br>
		Spent : $grocery<br>
		Profit : $temp<br>
		You have saved $temp.</p></div>";
	}
	elseif($bgrocery < $grocery){
		$temp = $grocery - $bgrocery;
		echo "<div class='danger'><p>Grocery Expense : HIGH<br>
		Budget : $bgrocery<br>
		Spent : $grocery<br>
		Loss : $temp<br>
		</p></div>";
	}
	elseif($bgrocery == $grocery){
		echo "<div class='warning'><p>Grocery Expense : ZERO<br>
		Budget : $bgrocery<br>
		Spent : $grocery<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//electric
	if($belectric > $electric) {
		$temp = $belectric - $electric;
		echo "<div class='success'><p>Electric Expense : LOW<br>
		Budget : $belectric<br>
		Spent : $electric<br>
		Profit : $temp<br>
		Consuming less leads to global warming! You have saved $temp.</p></div>";
	}
	elseif($belectric < $electric){
		$temp = $electric - $belectric;
		echo "<div class='danger'><p>Electric Expense : HIGH<br>
		Budget : $belectric<br>
		Spent : $electric<br>
		Loss : $temp<br>
		Consume less power! </p></div>";
	}
	elseif($belectric == $electric){
		echo "<div class='warning'><p>Electric Expense : ZERO<br>
		Budget : $belectric<br>
		Spent : $electric<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//mobile
	if($bmobile > $mobile) {
		$temp = $bmobile - $mobile;
		echo "<div class='success'><p>Mobile Expense : LOW<br>
		Budget : $bmobile<br>
		Spent : $mobile<br>
		Profit : $temp<br>
		You have saved $temp.</p></div>";
	}
	elseif($bmobile < $mobile){
		$temp = $mobile - $bmobile;
		echo "<div class='danger'><p>Mobile Expense : HIGH<br>
		Budget : $bmobile<br>
		Spent : $mobile<br>
		Loss : $temp<br>
		</p></div>";
	}
	elseif($bmobile == $mobile){
		echo "<div class='warning'><p>Mobile Expense : ZERO<br>
		Budget : $bmobile<br>
		Spent : $mobile<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//cable
	if($bcable > $cable) {
		$temp = $bcable - $cable;
		echo "<div class='success'><p>Cable Expense : LOW<br>
		Budget : $bcable<br>
		Spent : $cable<br>
		Profit : $temp<br>
		You have saved $temp.</p></div>";
	}
	elseif($bcable < $cable){
		$temp = $cable - $bcable;
		echo "<div class='danger'><p>Cable Expense : HIGH<br>
		Budget : $bcable<br>
		Spent : $cable<br>
		Loss : $temp<br>
		</p></div>";
	}
	elseif($bcable == $cable){
		echo "<div class='warning'><p>Cable Expense : ZERO<br>
		Budget : $bcable<br>
		Spent : $cable<br>
		You have spent all the amount. Take Care!</p></div>";
	}
	//others
	if($bothers > $others) {
		$temp = $bothers - $others;
		echo "<div class='success'><p>Others Expense : LOW<br>
		Budget : $bothers<br>
		Spent : $others<br>
		Profit : $temp<br>
		You have saved $temp.</p></div>";
	}
	elseif($bothers < $others){
		$temp = $others - $bothers;
		echo "<div class='danger'><p>Others Expense : HIGH<br>
		Budget : $bothers<br>
		Spent : $others<br>
		Loss : $temp<br>
		</p></div>";
	}
	elseif($bothers == $others){
		echo "<div class='warning'><p>Others Expense : ZERO<br>
		Budget : $bothers<br>
		Spent : $others<br>
		You have spent all the amount. Take Care!</p></div>";
	}

	if($isaving < 0) {
		$isaving = 0;
	}


	//Non-budget value comparison
	if($isaving == 0) {
		echo "<div class='info'><p>Overall Report : <br>
		Expected saving for this month : $budgetsaving<br>
		Actual Saving for this month   : $isaving<br>
		Bravo ! You are running out of money!";
	}
	elseif($budgetsaving > $isaving) {
		echo "<div class='info'><p>Overall Report : <br>
		Expected saving for this month : $budgetsaving<br>
		Actual Saving for this month   : $isaving<br>
		Bravo ! You have saved a lot this month.";
	}
	elseif($budgetsaving < $isaving) {
		echo "<div class='info'><p>Overall Report : <br>
		Expected saving for this month : $budgetsaving<br>
		Actual Saving for this month   : $isaving<br>
		Bravo ! You have spent a lot this month.";
	}
	elseif($budgetsaving == $isaving) {
		echo "<div class='info'><p>Overall Report : <br>
		Expected saving for this month : $budgetsaving<br>
		Actual Saving for this month   : $isaving<br>
		Bravo ! You have consumed the entire amount set on this month.";
	}
}



?>
</table>
</body>
</html>