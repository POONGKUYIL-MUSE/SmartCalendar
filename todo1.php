<?php 
session_start();
include 'config.php';
$currentuser = $_SESSION['username'];
$todoname='';
if(isset($_POST['addbtn'])) {

if(isset($_POST['todoname'])) {
	$todoname = $_POST['todoname'];

if($todoname != NULL) {
	$sql = "INSERT INTO todolist (user,todoname) VALUES ('$currentuser','$todoname')";
	if($conn->query($sql) === TRUE) {
    
	}
	else {
		echo "Error".$sql."<br>".$conn->error;
	}
}
}
else
{
	echo "smtng wrong";
}
}
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="uikit/css/uikit.min.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>
<style>
body {
  margin: 0;
  min-width: 250px;
}

/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
ul {
  margin: 0;
  padding: 0;
}

/* Style the list items */
ul li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;
  
  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes) */
ul li:nth-child(odd) {
  background: #f9f9f9;
}

/* Darker background-color on hover */
ul li:hover {
  background: #ddd;
}

/* When clicked on, add a background color and strike out text */
ul li.onclick {
  background: #888;
  color: #fff;
  text-decoration: line-through;
}

/* Add a "checked" mark when clicked on */
ul li.onclick::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Style the header */
.header {
  background-color: rgba(116, 185, 255,1.0);
  padding: 30px 40px;
  color: white;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
input {
  margin: 0;
  border: none;
  border-radius: 0;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}
</style>


</head>
<body>
<form method="post" action='todo1.php'>
<div id='myDiv' class='header'>
	<h2 style='margin:5px'>My To Do List</h2>
	<input type="text" name='todoname' id="myInput" placeholder="Title...">
	<span><button class="addBtn" name='addbtn'>Add</button></span>
</div>
<ul id="myUL">
<?php

$sql = "SELECT * FROM todolist WHERE user='$currentuser'";
$retrieval = mysqli_query($conn,$sql);
if(! $retrieval) {
	die("Could not retrieve data".mysql_error());
}
while($row = mysqli_fetch_assoc($retrieval)) {
	echo "<li><b>{$row['todoname']}</b><span><a href='tododel.php?del=".$row['todoname']."'><button class='uk-close-large close' type='button' uk-close></button></span></li>";
}
?>
</ul>
</form>
</body>
</html>
<!--echo "<li><b>{$row['todoname']}</b><span><a href='del.php?del=".$row['todoname']."'><button class='close'>delete</button></span></li>";-->