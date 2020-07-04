<?php

session_start();

include 'config.php';

$eventname=$eventdate=$eventdesc=$delevent="";

//function for add button

	//storing values of events in php variables
	$tempuser = $_SESSION['username'];
	
	if(isset($_POST['eventname']))
	{	
		$eventname = $_POST['eventname'];
	}
	if(isset($_POST['eventdate']))
	{	
		$eventdate = $_POST['eventdate'];
	}
	if(isset($_POST['description']))
	{	
		$eventdesc = $_POST['description'];
	}
	
	//echo $eventname."and<br>".$eventdate."and<br>".$eventdesc;
		
	//checking for zero null values

	if(($eventname != NULL) && ($eventdate != NULL) && ($eventdesc !=  NULL)) 
	{
		//inserting event in events table;
		$sql = "INSERT INTO eventstable (USERNAME,EVENTNAME,EVENTDATE,EVENTDESC)
				VALUES ('$tempuser','$eventname','$eventdate','$eventdesc')";

		//checking whether inserted or not

		if($conn->query($sql) === TRUE) 
		{
			header('location:events.php');
		}
		else
		{
			echo "Error in adding events".$sql."<br>".$conn->error;
		}
	}
	else
	{
		//echo "smtng wrong";
	}


//function for view button

?>