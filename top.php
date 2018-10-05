<?php
include ("up.php");
?>

<style type="text/css">
	.table {
    border-radius: 5px;
    width: 80%;
    float: none;
}


</style>

<?php
	
	$jsondata = file_get_contents("https://api.coinmarketcap.com/v1/ticker/?limit=20");
	echo "<center>";
	echo "<h1>Top 20 digital currencies:</h1>";

	$json=json_decode($jsondata,true);
	echo "Last updated: ";
	echo date('d/m/Y H:i:s',time($json[last_updated]));

	echo "<br><br><br>";
	echo "<b><div class='table-responsive'>          
	 			 <table class='table'>
	   					 <thead>
	      					<tr class='info'>
	      					  <th>#</th>
                                <th>Name</th>
                                <th>Symbol</th>
                                 <th>Price</th>
                                <th>Volume(24h)</th>
                                <th>Change(24h)</th>
                               
	        
	     					 </tr>
	    				</thead>";
	foreach ($json as $value) {
		
		
    		echo  	"<tbody>
   						   <tr class='active'>";
        					
		
   			echo 			"<td>",$value[rank],"</td>
                             <td>",$value[name],"</td>
                             <td>",$value[symbol],"</td>
                             <td>",$value[price_usd],"</td>
                             <td>",$value['24h_volume_usd'],"</td>
                             <td>",$value[percent_change_24h],"%</td>";


	}
	
	 echo  	"				</tbody>
	 			 </table>
	  			</div>,<br>
	 	</center>";




?>

<?php
include ('down.php');
?>