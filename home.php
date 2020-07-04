<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 80px;
  text-align: center;
  background: #1abc9c;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  /*-ms-flex: 30%; /* IE10 */
  /*flex: 30%;*/
  background-color: #f1f1f1;
  padding: 20px;
  max-height:100%;
  width:30%;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;

}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
  <h1>SMART CALENDAR 2k19</h1>
</div>

<div class="navbar">
  
</div>

<div class="row">
  <div class="side">
    <h2>Our Services</h2>
    <ul>
      <li>Event Manager</li>
      <li>Todo List</li>
      <li>Holiday</li>
      <li>Budget Maintenance</li>
      <li>Calendar</li>
      <li>Chat System</li>
    </ul>
    
  </div>
  <div class="main">
    <p>Technology has improved a lot over the last few decades. A calendar  is a tool That keeps every aspect of our life focused in one place, allowing you to worry less and accomplish more. using the smart calendar is the best way to avoid procrastination and  general tardliness.</p>

    <p>Smart calendar is based on web application which can be implemented on any Computer.In this application, PHP is server side language, MYSQL and PHPis used as backend and HTML,CSS and JAVASCRIPT are used as front end tools.</p>

    <p>This system communicates with database residing on localhost server.The system Faciliates end users with interactive design and automated processing of smart calendar.</p>

    <p>Smart calendar is a web based  application  which accesses the calendars of multiple users for instance members will pull out the event on one screen in customized  format.It also helps the user to create edit and delete events of his\her calendar .Additionally this application will use stratergy to update data only if there is  any change in the events making it faster.</p>

    <p>There are many other application project but they cannot get the rid of redundent event and remainders of belonging to other users.This cause a lot of distrubance to the user. on the contrary,smart calendar application will use an intelligent alogrithm to compare the event in many ways based on the time,name and place of events.</p>


    <div align='center'><a href="register.php"><button  class="btn btn-info">Get Started!</button></a></div>

  </div>
</div>

</body>
</html>
