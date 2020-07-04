<!DOCTYPE html>
<html>
<head>
  <script>
    $(document).ready(function() { 
      $('#clickAll').on('click', function() {
    $('input[type="submit"]').trigger('click');
    });
    });
  </script>
  
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>



</head>
<body>

<h2>Your Budget</h2>
<p>set your budget</p>
<!-- Panel one - Monthly Expenses -->
<button class="accordion">Monthly Expenses</button>
<div class="panel">
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
  <form action='budgettest.php' method='POST' name='monthlyform'>
  <INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />

  <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

  <TABLE id="dataTable" width="350px" border="1">
    <TR>
      <TD><INPUT type="checkbox" name="monthlychk[]"/></TD>
      
      <TD>
        <SELECT name="monthlycountry[]">
          <OPTION value="travel">Travel Allowance</OPTION>
          <OPTION value="medical">Medical Allowance</OPTION>
          <OPTION value="daily">Daily Allowance</OPTION>
          <OPTION value="restaurant">Restaurant Allowance</OPTION>
          <OPTION value="car">Car Payments</OPTION>
          <OPTION value="cable">Cable Bill</OPTION>
          <OPTION value="car">Electric Bills</OPTION>
        </SELECT>
      </TD>
      <TD><INPUT type="number" name="monthlytxt[]"/></TD>
    </TR>
  </TABLE>
  <input type="submit" value = "SUBMIT" name="submit" >
  </form>
</div>
<!-- Annual Expenses -->
<button class="accordion">Annual Expenses</button>
<div class="panel">
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
  <form action='budgettest.php' method='POST' name='annualform'>
  <INPUT type="button" value="Add Row" onclick="addRow('annualTable')" />

  <INPUT type="button" value="Delete Row" onclick="deleteRow('annualTable')" />

  <TABLE id="annualTable" width="350px" border="1">
    <TR>
      <TD><INPUT type="checkbox" name="annualchk[]"/></TD>
      
      <TD>
        <SELECT name="annualcountry[]">
          <OPTION value="travel">Travel Allowance</OPTION>
          <OPTION value="medical">Medical Allowance</OPTION>
          <OPTION value="daily">Daily Allowance</OPTION>
          <OPTION value="restaurant">Restaurant Allowance</OPTION>
          <OPTION value="car">Car Payments</OPTION>
          <OPTION value="cable">Cable Bill</OPTION>
          <OPTION value="car">Electric Bills</OPTION>
        </SELECT>
      </TD>
      <TD><INPUT type="number" name="annualtxt[]"/></TD>
    </TR>
  </TABLE>
  
  <input type="submit" value = "SUBMIT" name="submit" >
  </form>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<div>
  <button id='clickAll'>Submit All</button>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>