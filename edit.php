<html>
    <head>
        <title>Events</title>
        <link rel="stylesheet" href="uikit/css/uikit.min.css" />
       <!-- <script src="uikit/js/jquery.js"></script> -->
        
        <!-- Jquery JS File -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>     
    </head>
    <body>

<?php

include 'config.php';
session_start();


$curuser = $_SESSION['username'];
if(isset($_GET['edit']))
{
	$editrec = $_GET['edit'];
	if(isset($_POST['submit']))
	{
		$eventname = $_POST['eventname'];
		$eventdate = $_POST['eventdate'];
		$eventdesc = $_POST['description'];

		$sql = mysqli_query($conn,"UPDATE eventstable SET EVENTNAME='$eventname',EVENTDATE='$eventdate',EVENTDESC='$eventdesc' WHERE EVENTNAME='$editrec' AND USERNAME='$curuser'");
		if($sql){
			header("location:events.php");
			ob_end_flush();
			die();
		}
		else {
			echo "Something wrong in updating";
		}
	}

	$sql3 = "SELECT * FROM eventstable WHERE USERNAME = '$curuser' AND EVENTNAME='$editrec'";
	$sql1 = mysqli_query($conn,$sql3);
	$sql2 = mysqli_fetch_assoc($sql1);

	?>

<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        
    </div>
    <div>
 <form method="post" action="">
        
         <div class="uk-margin">
            Eventname : 
            <input class="uk-input" type="text" placeholder="Event Name" name="eventname" value="<?php echo $sql2['EVENTNAME']; ?>">
        </div>
        
         <div class="uk-margin">
            EventDate :  
            <input class="uk-input" type="text" placeholder="Event Date" name="eventdate" value="<?php echo $sql2['EVENTDATE']; ?>">
        </div>
        
         <div class="uk-margin">
            Event Desciption : 
            <input class="uk-input" type="text" placeholder="Event Description" name="description" value="<?php echo $sql2['EVENTDESC']; ?>">
        </div>
        
        
         <button class="uk-button uk-button-primary " type="submit" name="submit">Submit</button>
</form>
</div>

<div></div>
</div>
<?php
}
?>
</body>
</html>