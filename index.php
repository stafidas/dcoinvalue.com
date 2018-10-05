<?php
include ("up.php");
?>

<div id=main>


<script type="text/javascript" src="https://www.cryptonator.com/ui/js/widget/calc_widget.js"></script>





<script type="text/javascript">
baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByTagName("script");
var embedder = scripts[ scripts.length - 1 ];
(function (){
var appName = encodeURIComponent(window.location.hostname);
if(appName==""){appName="local";}
var s = document.createElement("script");
s.type = "text/javascript";
s.async = true;
var theUrl = baseUrl+'serve/v1/coin/multi?fsyms=BTC,DASH,STRAT,ZEC,ETH,XMR,XRP,LTC,ETC,ETC,XEM,MAID,ICN&tsyms=USD,EUR,CNY,GBP';
s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
embedder.parentNode.appendChild(s);
})();
</script>






</div>


<?php
include ('down.php');
?>