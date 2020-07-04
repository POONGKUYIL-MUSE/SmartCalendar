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
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="uikit/css/uikit.min.css" />
       <!-- <script src="uikit/js/jquery.js"></script> -->
        
        <!-- Jquery JS File -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>

        <script>
function snackbar() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
}
</script>
	
	<style>

	/*Snack bar style*/
	#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

	
	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 1px solid #ddd;
	}
	
		th {
		background-color:rgba(116, 185, 255,1.0);
		color:white;
	}
	
	tr:hover {
		background-color:#DDD;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}
</style>
	
	
	

</head>
<body>

<div class="container">
  <h2>Events of <b><?php echo $_SESSION['username']; ?> </b></h2>
  
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Add Events</a></li>
    <li><a data-toggle="pill" href="#menu1">View Events</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Add Events</h3>
      
		<form name="addevent" method="post" action="eventsadd.php">
	    
		<div class="form-group">
			
			<label for="eventname"> Event Name : </label> 
			<input type="text" class="form-control" name="eventname" required>
		</div>
		<div class="form-group">
			<label for="date"> Pick a Date : </label>
			<input type="date" name="eventdate" required>
		</div>
		<div class="form-group">
			<label for="Description">Description : </label>
			<textarea class="form-control" rows="5" name="description"></textarea>
		</div>
		<button type="submit" class="btn btn-info" name="addbtn" onclick="snackbar()">Add</button>

		<div id="snackbar">Event added Successfully</div>
	  
	  
	  
	  </form>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>View Events</h3>
	  <div style="overflow-x:auto;">
	  <table border="1" 
	  <tr><th>Eventname</th><th>Eventdate</th><th>EventDescription</th><th>Edit</th><th>Delete</th></tr>
	  <?php
		$currentuser = $_SESSION['username'];
		$sql = "SELECT * FROM eventstable WHERE USERNAME='$currentuser'";
		$retrieval = mysqli_query($conn,$sql);
		
		if(! $retrieval) 
		{
			die("could not retrieve data".mysql_error());
		}
		while($row = mysqli_fetch_assoc($retrieval))
		{
			echo "<tr>";
			
			echo "<td><b>{$row['EVENTNAME']}</b> </td>".
			"<td> {$row['EVENTDATE']} </td>".
			"<td> {$row['EVENTDESC']} </td>";
			echo "<td>
			<a href='edit.php?edit=".$row['EVENTNAME']."'>
			<button>Edit</button>
			</a></td>";
			echo "<td>
			<a href='delete.php?del=".$row['EVENTNAME']."'>
			<button>Delete</button>
			</a></td></tr>";
		}
	  ?>
	  </table>
	 </div>
    </div>

  </div>
</div>

</body>
</html>