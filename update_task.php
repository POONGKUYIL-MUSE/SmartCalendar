<?php
	require_once 'confiig.php';
	
	if($_GET['task_id'] != ""){
		$task_id = $_GET['task_id'];
		
		$conn->query("UPDATE `task` SET `status` = 'Done' WHERE `task_id` = $task_id") or die(mysqli_errno());
		header('location: todonew.php');
	}
?>