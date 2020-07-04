<?php

//$user1 = $user2 = "";

if(isset($_POST['name']) and isset($_POST['job'])) {
	$user1 = $_POST['name'];
	$user2 = $_POST['job'];
}

echo $user1;
echo $user2;

?>