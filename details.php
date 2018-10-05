<?php
include ('up.php');
?>

<style type="text/css">
	.form-control { width: 150px; } 

  .table {
    border-radius: 5px;
    width: 80%;
    float: none;
}
</style>




<center>

<form method="post" class="form-inline" action="details">
<select class="form-control" name="taskOption">
<?php
	
	 $db =  mysqli_connect("localhost","root","staf1993","Currency") or die("Unable to connect to MySQL");
    
    
    //get matched data from skills table
    $query = $db->query("SELECT distinct name,rank FROM last_update ORDER BY rank ");
    while ($row = $query->fetch_assoc()) {
	
		echo '<option value=' . $row[name] . '>' . $row[name] . '</option>';
	

}
	
?>
</select>
  <input type="submit" class="btn btn-primary btn-sm" value="Submit"/>
</form>


<?php
	
	$string="bitcoin";

	
	if(isset($_POST['taskOption'])){

		$string=$_POST['taskOption'];

	}
	echo "<center>";
	 	

		$query = $db->query("SELECT distinct * FROM last_update WHERE name = '$string' ");

	    while ($row = $query->fetch_assoc()) {
        echo "Last updated: ",$row[last_updated];
		echo " <div class='table-responsive'>          
  					<table class='table table-bordered table-hover'>
    					<thead>
      						<tr class='info'>
      						<th colspan='2'><center>",$row[name],"(",$row[symbol],")","</center></th>
							</tr>
						 </thead>
						 <tbody>
     					 
        					<tr ><td>Rank</td> 				<td>",$row[rank],"</td></tr>
        					<tr ><td>Price(USD)</td>			<td>",$row[price_usd],"</td></tr>
        					<tr ><td>Price(BTC)</td>			<td>",$row[price_btc],"</td></tr>
        					<tr ><td>24h volume(USD)</td>		<td>",$row['24h_volume'],"</td></tr>
        					<tr ><td>Market cap(USD)</td>		<td>",$row[market_cap],"</td></tr>
        					<tr ><td>Available supply</td> 	<td>",$row[available_supply],"</td></tr>
        					<tr ><td>Total supply</td> 		<td>",$row[total_supply],"</td></tr>
        					<tr ><td>percent change(1h)</td>	 <td>",$row[change_1h],"%</td></tr>
        					<tr ><td> percent change(24h)</td> <td>",$row[change_24h],"%</td></tr>
        					<tr ><td>percent change(7d)</td>  <td>",$row[change_7d],"%</td></tr>
							
    					</tbody>
  					</table>
  				</div></strong>";



	}
	
	echo "</center>";
include ('down.php');
?>


       					
        					
        					
        					
        					