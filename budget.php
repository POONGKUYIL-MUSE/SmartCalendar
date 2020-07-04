<HTML>
<HEAD>
	<TITLE> Add/Remove dynamic rows in HTML table </TITLE>
	<SCRIPT language="javascript">
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var colCount = table.rows[0].cells.length;

			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

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
</HEAD>
<BODY>
<form action='test.php' method='POST'>
	<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />

	<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />

	<TABLE id="dataTable" width="350px" border="1">
		<TR>
			<TD><INPUT type="checkbox" name="chk[]"/></TD>
			
			<TD>
				<SELECT name="country[]">
					<OPTION value="travel">Travel Allowance</OPTION>
					<OPTION value="medical">Medical Allowance</OPTION>
					<OPTION value="daily">Daily Allowance</OPTION>
					<OPTION value="restaurant">Restaurant Allowance</OPTION>
					<OPTION value="car">Car Payments</OPTION>
					<OPTION value="cable">Cable Bill</OPTION>
					<OPTION value="car">Electric Bills</OPTION>
					<OPTION value="car">Car Payments</OPTION>
					<OPTION value="car">Car Payments</OPTION>
					<OPTION value="car">Car Payments</OPTION>
					<OPTION value="car">Car Payments</OPTION>
					<OPTION value="car">Car Payments</OPTION>
					<OPTION value="car">Car Payments</OPTION>





				</SELECT>
			</TD>
			<TD><INPUT type="number" name="txt[]"/></TD>
		</TR>
	</TABLE>

	<input type="submit" value = "SUBMIT">
	</form>
</BODY>
</HTML>