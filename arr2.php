<?php

$msg = $_POST['box'];

//$array = array();
//$key="one";

$array[] = $msg;
//$array[$key] = "item";
array_push($array);

print_r($array);

//foreach $array as $a {
//	echo $a;
//}

?>