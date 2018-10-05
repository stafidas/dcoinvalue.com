<!DOCTYPE html>
<html lang="en">
<head>
<meta name="msvalidate.01" content="0BEB1624ADA0E3AB9B676F79E40DE1A4" />

<meta charset='utf-8'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Using jQuery with a CDN -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<meta name="description" content="Cryptocurrency and altcoin values. Bitcoin, Litecoin, Monero, Zcash, Dash, Ethereum "/>


<title>Digital Coin Value</title>


<style>

body {
	background-color:#f0f0f0;
	margin: 20px 100px 0px 100px  ;

}



#content {
  background: none repeat scroll 0 0 #FFFFFF; //making background white inside box
  overflow: hidden; //This will hide the content going out of your body

}








 /* On small screens, set height to 'auto' for sidenav and grid */
    @media (max-width: 1000px) {
      .sidenav {
        height: auto;
        padding: 0px;

      }
    body {
      margin:0;

    }
    
   
}







</style>


 
</head>


<body>






<div id=content >
<?php
	
	$db =  mysqli_connect("localhost","root","staf1993","Currency") or die("Unable to connect to MySQL");
    
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM Global ORDER BY last_updated DESC limit 1 ");
    while ($row = $query->fetch_assoc()) {
        
    
  
	echo	 "<div class='panel panel-default'>
 		 		<div class='text-center'>
 		 		<strong>"
 		 		,$row[active_currencies]," Currencies / "
 		 		,$row[active_assets]," Assets / "
 		 		,$row[active_markets]," Markets  
 		 		<div class='text-center'>
 		 		BTC Dominance: ",$row[bitcoin_percentage_of_market_cap],"% /
 		 		Market Cap: $",$row[total_market_cap_usd]," / 
 		 		24h Vol: $",$row[total_24h_volume_usd],"  
 		 		
 		 		</strong>
 		 		</div>
			</div>";
	}
?>

<div id=menu>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"><font size="5">dcoinvalue.com</font></a>
    </div>
    <ul class="nav navbar-nav">
    
	<li><a href='index'><font size="6">Home</font></a></li>

	<li><a href='market'><font size="6">Markets</font></a></li>

	
	 <li><a href="details"><font size="6">Details</font></a></li>
	
	<li><a href="charts"><font size="6">Charts</font></a></li>
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="">
		<font size="6">API<span class="caret"></span></font></a>
			<ul class="dropdown-menu">
	          	<li><a href="api/currency"><font size="4">Currencies</font></a></li>
	          	<li><a href="api/global"><font size="4">Global</font></a></li>
				
			</ul>
	</li>
	
	</ul>

	<form class="navbar-form navbar-right" action="http://www.dcoinvalue.com/details" method="post">
	      <div class="input-group">
	        <input type="text" class="form-control" placeholder="Search"  name="taskOption" id="searchbox">
	        <div class="input-group-btn" id="output">
	          <button class="btn btn-default" type="submit">
	            <i class="glyphicon glyphicon-search"></i>
	          </button>
	        </div>
	      </div>
	</form>


</div>
</nav>

<script>
$(function() {
    $( "#searchbox" ).autocomplete({
        source: 'search.php'
    });
});
</script>