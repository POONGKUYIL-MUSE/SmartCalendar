<?php
include 'config.php';
/*+



$sql = "CREATE TABLE RegisterDetails (
	ID INT(6) AUTO_INCREMENT PRIMARY KEY,
	USERNAME VARCHAR(40) NOT NULL,
	EMAIL VARCHAR(40) NOT NULL, 
	PASSWORD VARCHAR(10) NOT NULL,
	REG_DATE TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Sample created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/

//Storing Data From form into php variables 
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['confirmpassword'];



//Checking for the same password entered

if($password == $cpassword) {
	echo "Passwords match";
	
	
	//Checking for duplicate usernames
	//All users must have unique username and email

	$user_check_query = "SELECT * FROM  RegisterDetails WHERE USERNAME = '$username' or EMAIL = '$email' LIMIT 1";
	
	$results = mysqli_query($conn, $user_check_query);
	$duplicate = mysqli_fetch_assoc($results);
	                                                                                   
	if($duplicate['USERNAME'] === $username && $duplicate['EMAIL'] === $email) 
	{ 
		echo "Registered already - if not you register with another username and password";
	}
	else
	{
	
		//Inserting Data into Table RegisterDetails after authentication
		
			$sql = "INSERT INTO RegisterDetails (USERNAME,EMAIL,PASSWORD,REG_DATE) 
					VALUES ('$username','$email','$password',NOW())";

			//Checking Whether Data is Inserted or not

			if($conn->query($sql) === TRUE) 
			{
				$sql2 = "CREATE TABLE $username (user varchar(20),imonth varchar(20),iyear int(11),idate date,itype varchar(20),ivalue int(11))";
				if($conn->query($sql2) === TRUE){
					$sql3 = "INSERT INTO budget (USER) VALUES ('$username')";
					if($conn->query($sql3) === TRUE) {
						$sql4 = "INSERT INTO setbudget (user,type) VALUES ('$username','income'), ('$username','shelter'), ('$username','medical'), ('$username','tuition'), ('$username','eb'), ('$username','transport'), ('$username','others')";
						if($conn->query($sql4) === TRUE) {

									echo "<script> window.alert('Resgistered successfully'); </script>";
				//echo "New Record Inserted Successfully";
						header("location:login.php");
					}
			}
			}
			}
			else
			{
				echo "Error in inserting ".$sql."<br>".$conn->error;
			}

				
	}	
}
else
{
	echo "Passwords	need to be same";
}

$conn->close();
?>