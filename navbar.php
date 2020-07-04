<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>Sidebar own</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .avatar {
	  vertical-align: middle;
	  width:70px;
	  height:70px;
	  border-radius:70%;
  }
  .center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  width: 50%;
	  height: 50%;
  }
  </style>
  
  <script>
  function destroy()
  {
    <?php header('index.php');?>
	  window.open('login.php');
  }
  </script>
</head>
<body>


<nav class = "navbar navbar-default navbar-static-top" role="navigation">
   
   <div class = "navbar-header">
		<br>
      <img src="images/avatar-login.png" alt="Avatar" class="avatar center">
	  <br>
	  <div align="center">
		Welcome <b><?php echo $_SESSION['username'];?></b>
	  </div>
   </div>
   
   
   
   <div>
      <ul class = "nav navbar-nav">
         <li><a href = "events.php" target="page"><button type="button" class="btn btn-primary btn-block"><font color="white"><b>Events</button></a></li>
         
		 <li><a href ="holiday.php" target="page"><button type="button" class="btn btn-primary btn-block"><font color="white"><b>HOLIDAYS</b></font></button></a></li>
         
		 <li><a href = "todo1.php" target="page"><button type="button" class="btn btn-primary btn-block"><font color="white"><b>Todo List</b></font></button></a></li>
		 <li><a href = "jan.php" target="page"><button type="button" class="btn btn-primary btn-block"><font color="white"><b>Calendar</b></font></button></a></li>
               <!--<b class = "caret"></b> -->	        
		 <li><a href = "main.php" target="page"><button type="button" class="btn btn-primary btn-block"><font color="white"><b>Chat With Friends</b></font></button></a></li>

     <li><a href = "bhome.php" target="page"><button type="button" class="btn btn-primary btn-block"><font color="white"><b>Budget</b></font></button></a></li>

         <li><a href="logout.php"><button type="button" class="btn btn-primary btn-block" onclick="self.parent.location='logout.php'"><font color="white"><b>Logout</button></a></li>
	  
	  </ul>
   </div>
   
</nav>


</body>
</html>
