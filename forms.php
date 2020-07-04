<html>
<head>
	<script>
		/*function submitTwoForms() {
      $('#form1, #form2').ajaxSubmit(); 
}*/
	
	function change() {
			document.getElementById("btn").hidden = "";
	}

	</script>
</head>
<body>
	<form id="form1" action="update.php" method="POST">
	<input type="text" name="username1">
	</form>
	<form id="form2" action="update.php" method="POST">
	<input type="text" name="username2">
	</form>
	<!--<button type="button" onclick="submitTwoForms();">Send</button>-->
	<button name="btn" id="btn" onclick="change();" hidden="hidden">Button</button> 

	<?php
	$user1 = $_POST['username1'];
	$user2 = $_POST['username2'];
	echo "$user1.$user2";
	?>

</body>

</html>
