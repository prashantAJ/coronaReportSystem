<html>
<head>
	<style type="text/css">
		table.dataTable thead .sorting:after,
		table.dataTable thead .sorting:before,
		table.dataTable thead .sorting_asc:after,
		table.dataTable thead .sorting_asc:before,
		table.dataTable thead .sorting_asc_disabled:after,
		table.dataTable thead .sorting_asc_disabled:before,
		table.dataTable thead .sorting_desc:after,
		table.dataTable thead .sorting_desc:before,
		table.dataTable thead .sorting_desc_disabled:after,
		table.dataTable thead .sorting_desc_disabled:before {
	    bottom: .5em;
		}

		#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
	</style>
	
	<script type="text/javascript">
		function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dtBasicExample");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
	</script>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body style="color:#379e94">
  <?php

    if($data=@file_get_contents('https://api.covid19api.com/summary') )
    {
      $details=json_decode($data,true);
    ?>
    <h1 style="color:#379e94"><b><center>Corona Report System</b></center></h1><br>
    
    <h3 style="color:#379e94"><b><center><?php echo $details['Countries'][0]['Date'] ?></b></center></h3><br>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for country.." title="Type in a name">
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Country
      </th>
      <th class="th-sm">New Cases
      </th>
      <th class="th-sm">Total Cases
      </th>
      <th class="th-sm">New Deaths
      </th>
      <th class="th-sm">Total Deaths
      </th>
      <th class="th-sm">New Recovered
      </th>
      <th class="th-sm">Total Recovered
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($details['Countries'] as $row) {
  ?>
	
  	
    <tr>
      <td><?php echo $row['Country'] ?></td>
      <td><?php echo $row['NewConfirmed'] ?></td>
      <td><?php echo $row['TotalConfirmed'] ?></td>
      <td><?php echo $row['NewDeaths'] ?></td>
      <td><?php echo $row['TotalDeaths'] ?></td>
      <td><?php echo $row['NewRecovered'] ?></td>
      <td><?php echo $row['TotalRecovered'] ?></td>
      
    </tr>
	<?php } }  
  else
    {
        die("Message: Problem in accessing data. Try again after sometime!");
    }
    ?>
  </tbody>
</table>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
</body>
</html>