<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

/* Animation for button */
.button {
  padding: 15px 25px;
  font-size: 28px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

</style>
</head>
<body>

<h2>Animated Modal with Header and Footer</h2>

<!--For Aligning buttons side by side -->
<div class="row">
  <div class="column">


<!--Set budget button -->
<!-- Trigger/Open The Modal -->
<button id="setb" class="button"><span>Set your Budget</span></button>
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Set your Budget. The values are set to zero for default</h2>
    </div>
    <div class="modal-body">
      <p>budget setting</p>
        
    </div>
    <div class="modal-footer">
      <h3><input type="submit" value = "unknown" name="submit" >
  </h3></form>
    </div>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("setb");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</div>


<!--Loading todays expense button-->
<div class="column">
<button id="sette" class="button"><span>Today's Expense</span></button>
<!-- The Modal -->
<div id="expensemodal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Dynamically add rows</h2>
    </div>
    <div class="modal-body">
      <form action='budgettest.php' method='POST' name='budgetform'>
      <p>
        <h4>Select a DATE : <input type="date" name="date"></h4>
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
  
  <fieldset style="width:9px">
    <legend>Income : </legend>
  <INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
  <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
  <TABLE id="dataTable" width="350px" border="1">
    <TR>
      <TD><INPUT type="checkbox" name="incomechk[]"/></TD>
      <TD>
        <SELECT name="incometype[]">
          <OPTION value="emergency">Emergency Fund</OPTION>
          <OPTION value="investments">Investments</OPTION>
          <OPTION value="retirements">Retirements</OPTION>
          <OPTION value="salary">Salary</OPTION>
          <OPTION value="other">Other</OPTION>
        </SELECT>
      </TD>
      <TD><INPUT type="number" name="incomevalues[]"/></TD>
    </TR>
  </TABLE>
  </fieldset>
<fieldset style="width:9px">
  <legend>Expenses : </legend>
  <INPUT type="button" value="Add Row" onclick="addRow('annualTable')" />
  <INPUT type="button" value="Delete Row" onclick="deleteRow('annualTable')" />
  <TABLE id="annualTable" width="350px" border="1">
    <TR>
      <TD><INPUT type="checkbox" name="expensechk[]"/></TD>
      <TD>
        <SELECT name="expensetype[]">
          <OPTION value="food">Food</OPTION>
          <OPTION value="clothing">Clothing and Accessories</OPTION>
          <OPTION value="shelter">Shelter</OPTION>
          <OPTION value="household">Household</OPTION>
          <OPTION value="tranport">Transportation</OPTION>
          <OPTION value="health">Health</OPTION>
          <OPTION value="loans">Loans</OPTION>
          <OPTION value="miscellaneous">Miscellaneous</OPTION>
          <OPTION value="tuition">Tuition</OPTION>
          <OPTION value="taxes">Taxes</OPTION>
          <OPTION value="vacation">Vacation</OPTION>
          <OPTION value="other">Other</OPTION>
        </SELECT>
      </TD>
      <TD><INPUT type="number" name="expensevalues[]"/></TD>
    </TR>
  </TABLE>
</fieldset>
      </p>
    </div>
    <div class="modal-footer">
      <h3><input type="submit" value ="SUBMIT" name="submit" >
  </h3></form>
    </div>
  </div>
</div>

<script>
// Get the modal
var modal2 = document.getElementById('expensemodal');
// Get the button that opens the modal
var btn2 = document.getElementById("sette");
// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[1];
// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}
</script>
</div>

</body>
</html>
