<?php
include ("up.php");
?>

<style type="text/css">
	.table {
    border-radius: 5px;
    width: 80%;
    float: none;
}

.form-control { width: 150px; } 
</style>

<center>
<form method="post" class="form-inline" action="market">
  <select class="form-control" name="taskOption">
    	<option value="btc">BitCoin</option>
		<option value="ltc">Litecoin</option>
		<option value="eth">Ethereum</option>
		<option value="etc">Ethereum Classic</option>
		<option value="xmr">Monero</option>
		<option value="zec">Zcash</option>
		<option value="xrp">Ripple</option>
		<option value="dash">Dash</option>
		<option value="rep">Augur</option>
		<option value="doge">Dogecoin</option>

  </select>
  
		<input type="submit" class="btn btn-primary btn-sm" value="Submit"/>

</form>

<?php
	
	$string="btc";
	
	if(isset($_POST['taskOption'])){

		$string=$_POST['taskOption'];

	}


	

	$jsondata = file_get_contents("https://api.cryptonator.com/api/full/".$string."-usd");
	
	

	$json=json_decode($jsondata,true);
	echo "Last updated: ";
	echo date('d/m/Y H:i:s',time($json[timestamp]));

	echo "<div class='table-responsive'>          
 			 <table class='table table-bordered table-hover'>
   					 <thead>
      					<tr class='info'>
      							<th>Market</th>
      							 <th>Price(USD)</th>
      							 <th>Volume</th>
      					 </tr>
    				</thead>
    				<tbody>";



	foreach ($json as $value) {
		echo "<strong>",$value[base],"</strong>";


		foreach ($value[markets] as $value1) {
		

        
     			
   					echo 	"<tr >
	   						   	<td>",$value1[market],"</td>
	        					<td>",$value1[price],"</td>
	        					<td>",$value1[volume],"</td>
   							</tr>";
 			 
   				
		}
			

}
			echo "</tbody>
					</table>
		  			</div>";	

?>
</center>
<?php
include ('down.php');
?>

