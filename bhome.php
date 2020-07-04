<?php

session_start();

include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>


  <SCRIPT language="javascript">
    function addRow(tableID) {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      var row = table.insertRow(rowCount);
      var colCount = table.rows[0].cells.length;
      for(var i=0; i<colCount; i++) {
        var newcell = row.insertCell(i);
        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch(newcell.childNodes[0].type) {
          case "text":
              newcell.childNodes[0].value = "";
              break;
          case "checkbox":
              newcell.childNodes[0].checked = false;
              break;
          case "select-one":
              newcell.childNodes[0].selectedIndex = 0;
              break;
        }
      }
    }
    function deleteRow(tableID) {
      try {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if(null != chkbox && true == chkbox.checked) {
          if(rowCount <= 1) {
            alert("Cannot delete all the rows.");
            break;
          }
          table.deleteRow(i);
          rowCount--;
          i--;
        }
      }
      }catch(e) {
        alert(e);
      }
    }
  </SCRIPT>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="uikit/css/uikit.min.css" />
       <!-- <script src="uikit/js/jquery.js"></script> -->
        
        <!-- Jquery JS File -->
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        <!-- UI KIT JS File -->
        <script src="uikit/js/uikit.min.js"></script>
        <script src="uikit/js/uikit-icons.min.js"></script>
  
  <style>
  
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }
  
    th {
    background-color:rgba(116, 185, 255,1.0);
    color:white;
  }
  
  tr:hover {
    background-color:#DDD;
  }

  th, td {
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}
</style>
  
  
  

</head>
<body>

<div class="container">
  <h2>Budget Maintanance of <b><?php echo $_SESSION['username']; ?> </b></h2>
  
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Set Budget</a></li>
    <li><a data-toggle="pill" href="#menu1">Add Expense</a></li>
    <li><a data-toggle="pill" href="#menu2">View Expense</a></li>
    <li><a data-toggle="pill" href="#menu3">Report</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>set your budget once in a month (on 1st day of every month)</h3>
	  <form method="post" action="setbudget.php">
      <h4>Select a MONTH : 
      <SELECT name="month" class="form-control">
          <OPTION value="jananuary">January</OPTION>
          <OPTION value="february">February</OPTION>
          <OPTION value="march">March</OPTION>
          <OPTION value="april">April</OPTION>
          <OPTION value="may">May</OPTION>
          <OPTION value="june">June</OPTION>
          <OPTION value="july">July</OPTION>
          <OPTION value="august">August</OPTION>
          <OPTION value="september">September</OPTION>
          <OPTION value="october">October</OPTION>
          <OPTION value="november">November</OPTION>
          <OPTION value="december">December</OPTION>
          </SELECT>
      </h4>
      <h4>Select a YEAR :
      	<select name="year" class="form-control">
      	<option value="2019">2019</option>
      	<option value="2020">2020</option>
      </select>
      </h4>
      <div style="overflow-x:auto;">
	  <table border="1" >
	  <tr><th>Type</th><th>Value</th></tr>
	  <tr><td>Income</td><td><INPUT type="number" name="income" class="form-control"></td></tr>
	  	<tr><td>Shelter</td><td><INPUT type="number" name="shelter" class="form-control"></td></tr>
	  	<tr><td>Medical</td><td><INPUT type="number" name="medical" class="form-control"></td></tr>
	  	<tr><td>Tuition</td><td><INPUT type="number" name="tuition" class="form-control"></td></tr>
	  	<tr><td>Transport</td><td><INPUT type="number" name="transport" class="form-control"></td></tr>
	  	<tr><td>Grocery</td><td><INPUT type="number" name="grocery" class="form-control"></td></INPUT></tr>
	  	<tr><td>Electric Bill</td><td><INPUT type="number" name="electric" class="form-control"></td></INPUT></tr>
	  	<tr><td>Mobile Charge</td><td><INPUT type="number" name="mobile" class="form-control"></td></INPUT></tr>
	  	<tr><td>Cable Bill</td><td><INPUT type="number" name="cable" class="form-control"></td></INPUT></tr>
		<tr><td>Others</td><td><INPUT type="number" name="others" class="form-control"></td></INPUT></tr>
	  </table>
	  <button type="submit" class="btn btn-info" name="set">SUBMIT</button>
	</form>
	  	
	  <!--
	  <?php
	/*	$currentuser = $_SESSION['username'];
		$sql = "SELECT * FROM setbudget WHERE user='$currentuser'";
		$retrieval = mysqli_query($conn,$sql);
		
		if(! $retrieval) 
		{
			die("could not retrieve data".mysql_error());
		}
		while($row = mysqli_fetch_assoc($retrieval))
		{
			echo "<tr>";
			
			echo "<td><b>{$row['type']}</b> </td>".
			"<td> {$row['setvalue']} </td>";
			echo "<td>
			<a href='budgetedit.php?budgetedit=".$row['type']."'>
			<button>Edit</button>
			</a></td></tr>";
			/*
			echo "<td>
			<a href='bedgetdelete.php?del=".$row['type']."'>
			<button>Delete</button>
			</a></td></tr>";
		}*/
	  ?>-->
	 </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Set your daily income</h3>
	      <form method="post" action="budgettest.php">
        <h4>DATE : <input type="date" name="date"></h4>
        <h4>MONTH : 
      <SELECT name="month" class="form-control">
          <OPTION value="jananuary">January</OPTION>
          <OPTION value="february">February</OPTION>
          <OPTION value="march">March</OPTION>
          <OPTION value="april">April</OPTION>
          <OPTION value="may">May</OPTION>
          <OPTION value="june">June</OPTION>
          <OPTION value="july">July</OPTION>
          <OPTION value="august">August</OPTION>
          <OPTION value="september">September</OPTION>
          <OPTION value="october">October</OPTION>
          <OPTION value="november">November</OPTION>
          <OPTION value="december">December</OPTION>
          </SELECT>
      </h4>
      <h4>YEAR :
      	<select name="year" class="form-control">
      	<option value="2019">2019</option>
      	<option value="2020">2020</option>
      </select>
      </h4>
        <div class="form-group">
        <label for="income"> Income : </label> 
        <INPUT type="button" value="Add Row" onclick="addRow('dataTable')" class="btn btn-info">
        <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" class="btn btn-info">
        <TABLE id="dataTable" width="350px" border="1">
          <TR>
          <TD><INPUT type="checkbox" name="incomechk[]" class="form-control"></TD>
          <TD>
          <SELECT name="incometype[]" class="form-control">
          <OPTION value="emergency">Emergency Fund</OPTION>
          <OPTION value="retirements">Retirements (pension)</OPTION>
          <OPTION value="salary">Salary</OPTION>
          <OPTION value="otherincome">Other</OPTION>
          </SELECT>   
          </TD>          
          <TD><INPUT type="number" name="incomevalues[]" class="form-control"></TD>
          </TR>
        </TABLE>
        </div>
        <div class="form-group">
        <label for="expenses">Expenses : </label>
        <INPUT type="button" value="Add Row" onclick="addRow('annualTable')" class="btn btn-info">
        <INPUT type="button" value="Delete Row" onclick="deleteRow('annualTable')" class="btn btn-info">
        <TABLE id="annualTable" width="350px" border="1">
          <TR>
          <TD><INPUT type="checkbox" name="expensechk[]"  class="form-control"></TD>
          <TD>
          <SELECT name="expensetype[]" class="form-control">
          <OPTION value="grocery">Grocery</OPTION>
          <OPTION value="clothing">Clothing and Accessories</OPTION>
          <OPTION value="shelter">Shelter</OPTION>
          <OPTION value="household">Household</OPTION>
          <OPTION value="transport">Transport</OPTION>
          <OPTION value="medical">Medical</OPTION>
          <OPTION value="restaurant">Restaurant</OPTION>
          <OPTION value="electric">Electric Bill</OPTION>
          <OPTION value="tuition">Tuition</OPTION>
          <OPTION value="cable">Cable Bill</OPTION>
          <OPTION value="mobile">Mobile Charge</OPTION>
          <OPTION value="others">Others</OPTION>
          </SELECT>
          </TD>          <TD><INPUT type="number" name="expensevalues[]" class="form-control"></TD>          </TR>
        </TABLE>
        </div>
        <button type="submit" class="btn btn-info" name="submit">SUBMIT</button>

      </form>
</div>

<div id="menu2" class="tab-pane fade">
      <h3>View  your daily income</h3>
      <div style="overflow-x:auto;">
	  <table border="1" 
	  <tr><th>Date</th><th>Type</th><th>Value</th></tr>
	  <?php
		$currentuser = $_SESSION['username'];
		$sql = "SELECT * FROM $currentuser";
		$retrieval = mysqli_query($conn,$sql);
		
		if(! $retrieval) 
		{
			die("could not retrieve data".mysql_error());
		}
		while($row = mysqli_fetch_assoc($retrieval))
		{
			echo "<tr>";
			
			echo "<td><b>{$row['idate']}</b></td><td>{$row['itype']}</td>".
			"<td> {$row['ivalue']} </td></tr>";
		}
	  ?>
	  </table>
	 </div>
	      
</div>
<div id="menu3" class="tab-pane fade">
      <h3>Report Analysis</h3>
		<form name="" method="post" action="budgetcmp.php">
        <!--<h4>Select a Month : <input type="month" name="month"></h4>-->
        <h4>Select a MONTH : 
      <SELECT name="month" class="form-control">
          <OPTION value="jananuary">January</OPTION>
          <OPTION value="february">February</OPTION>
          <OPTION value="march">March</OPTION>
          <OPTION value="april">April</OPTION>
          <OPTION value="may">May</OPTION>
          <OPTION value="june">June</OPTION>
          <OPTION value="july">July</OPTION>
          <OPTION value="august">August</OPTION>
          <OPTION value="september">September</OPTION>
          <OPTION value="october">October</OPTION>
          <OPTION value="november">November</OPTION>
          <OPTION value="december">December</OPTION>
          </SELECT>
      </h4>
      <h4>Select a YEAR :
      	<select name="year" class="form-control">
      	<option value="2019">2019</option>
      	<option value="2020">2020</option>
      </select>
      </h4>
        <button type="submit" class="btn btn-info" name="submit">SUBMIT</button>
    </form>
      <?php
		/*$currentuser = $_SESSION['username'];
		$sql1 = "SELECT * FROM $currentuser";
		$res1 = mysqli_query($conn,$sql1);
		$sql2 = "SELECT * FROM setbudget WHERE user=$currentuser";
		$res2 = mysqli_query($conn,$sql2);

		if((! $res1) && (! $res2)) 
		{
			die("could not retrieve data".mysql_error());
		}
		while(($row1 = mysqli_fetch_assoc($res1)) && ($row2 = mysqli_fetch_assoc($res2)))
		{
			if($row1[''])
		}*/
	  ?>
</div>
</div>

</body>
</html>