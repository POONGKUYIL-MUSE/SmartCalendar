<html>
    <head>
        <title>Budget</title>
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
if(isset($_GET['budgetedit']))
{
	$budgetedit = $_GET['budgetedit'];
	if(isset($_POST['submit']))
	{
		$type = $_POST['type'];
		$setvalue = $_POST['setvalue'];

		$sql = mysqli_query($conn,"UPDATE setbudget SET setvalue='$setvalue' WHERE user='$curuser' AND type='$budgetedit'");
		if($sql){
			//echo "succesfully updated query";
            header("location:bhome.php");
			ob_end_flush();
			die();
		}
		else {
			echo "Something wrong in updating";
		}
	}

	$sql3 = "SELECT * FROM setbudget WHERE user='$curuser' AND type='$budgetedit'";
	$sql1 = mysqli_query($conn,$sql3);
	$sql2 = mysqli_fetch_assoc($sql1);

	?>

<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        
    </div>
    <div>
 <form method="post" action="">
        
         <div class="uk-margin">
            Type : 
            <input class="uk-input" type="text" placeholder="<?php echo $sql2['type']; ?>" name='type'>
        </div>
        
         <div class="uk-margin">
            Set New Value :  
            <input class="uk-input" type="text" placeholder="new value" name="setvalue" value="<?php echo $sql2['setvalue']; ?>">
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