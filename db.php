<?php
 $con = mysqli_connect("localhost","root","staf1993","Currency") or die("Unable to connect to MySQL");
 
 if ($con) {
    echo 'Connected successfully';
}



$sql3 = "TRUNCATE TABLE last_update";

 //check new record
	if (mysqli_query($con, $sql3)) {
    echo "New record created successfully";
	} 
	else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}



 //read the json file contents
    $jsondata1 = file_get_contents("http://dcoinvalue.com/api/currency.json");
	
	
	$json1=json_decode($jsondata1,true);
	foreach ($json1 as $value){
	
	$symbol=$value[symbol];
	$id=$value[id];
	$name=$value[name];	
   	$rank = $value[rank];
    $price_usd = $value[price_usd];
   	$price_btc = $value[price_btc];
   	$h24_volume_usd = $value['24h_volume_usd'];
   	$market_cap_usd = $value[market_cap_usd];
    $available_supply = $value[available_supply];
  	$total_supply = $value[total_supply];
    $percent_change_1h = $value[percent_change_1h];
   	$percent_change_24h = $value[percent_change_24h];
   	$percent_change_7d = $value[percent_change_7d];
    

	echo "<br>";

   //insert into mysql table
	$sql = "INSERT INTO Currencies (symbol,name,rank,price_usd,price_btc,24h_volume,market_cap,available_supply,total_supply,change_1h,change_24h,change_7d) 
   			VALUES ('$symbol','$name','$rank','$price_usd','$price_btc','$h24_volume_usd','$market_cap_usd','$available_supply','$total_supply','$percent_change_1h','$percent_change_24h','$percent_change_7d')";


    

	//check new record
	if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
	} 
	else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}


	

	
	$sql2 = "INSERT INTO last_update (symbol,name,rank,price_usd,price_btc,24h_volume,market_cap,available_supply,total_supply,change_1h,change_24h,change_7d) 
   			VALUES ('$symbol','$name','$rank','$price_usd','$price_btc','$h24_volume_usd','$market_cap_usd','$available_supply','$total_supply','$percent_change_1h','$percent_change_24h','$percent_change_7d')";

   			
   //check new record
	if (mysqli_query($con, $sql2)) {
    echo "New record created successfully";
	} 
	else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	}
	
	
	
	
	
	//read the json file contents
  	$jsondata2 = file_get_contents("http://dcoinvalue.com/api/global.json");
	
	
	$json2=json_decode($jsondata2,true);
	

	$total_market_cap=$json2[total_market_cap_usd];	
   	$total_24h_volume = $json2[total_24h_volume_usd];
    $bitcoin_domination = $json2[bitcoin_percentage_of_market_cap];
   	$active_currencies = $json2[active_currencies];
   	$active_assets = $json2[active_assets];
   	$active_markets = $json2[active_markets];
   
	
	echo "<br>";

   //insert into mysql table
	$sql1 = "INSERT INTO Global (total_market_cap_usd,total_24h_volume_usd,bitcoin_percentage_of_market_cap,active_currencies,active_assets,active_markets) 
   			VALUES ('$total_market_cap','$total_24h_volume','$bitcoin_domination','$active_currencies','$active_assets','$active_markets')";

	
	
	if (mysqli_query($con, $sql1)) {
    echo "New global record created successfully";
	} 
	else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
	
	
?>





