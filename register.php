<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
	background: url('pics/caltodo.jpg')no-repeat;
	background-size:100%;
	height: 100%;
	max-height: 600px;
	max-width: 600px;
	display:block;
	margin:0;
	background-position: center;
}
* {
  box-sizing: border-box;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
input[type=submit]:hover {	
  background-color: white;
  color:green;
}
input[type=submit]:active {
	background-color: green;
	color:white;
}
.container {
  border : 5px solid black;
  padding: 20px;
  margin: 100px 100px;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
  color: black;
  text-align:center;
}
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<b><u><h2 align="center" style="margin:70px 200px 30px 200px;">REGISTRATION FORM</h2></u></b>
<div class="container">
  <form method="POST" name="register" action="process.php">
    <div class="row">
      <div class="col-25">
        <label for="username">Username : </label>
      </div>
      <div class="col-75">
        <input type="text" name="username" placeholder="Enter the User Name " required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Email">Email : </label>
      </div>
      <div class="col-75">
        <input type="text" name="email" placeholder="Enter a valid Email-Id">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Password">Password : </label>
      </div>
      <div class="col-75">
        <input type="password" name="password" placeholder="Enter a new password">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="Confirm Password">Confirm Password : </label>
      </div>
      <div class="col-75">
        <input type="password" name="confirmpassword" placeholder="Confirm your password">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Register" name="REGISTER">
	  <b><div align="right" style="color:black;padding:20px;"> <a href="login.php">Log in Here !!! </a></div></b>  
    </div>
  </form>
</div>
</body>
</html>
