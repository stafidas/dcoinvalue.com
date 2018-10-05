<?php
include ("up.php");
?>
<style type="text/css">
  .form-control { width: 150px; } 
</style>
<center>
<form method="post" class="form-inline" action="charts">
  <select class="form-control" name="taskOption">
   <?php
 //connect with the database
    $db =  mysqli_connect("localhost","root","staf1993","Currency") or die("Unable to connect to MySQL");
    
    
    //get matched data from skills table
    $query = $db->query("SELECT distinct name,rank,symbol FROM last_update ORDER BY rank");
    while ($row = $query->fetch_assoc()) {
        
    echo '<option value=' . $row[symbol] . '>' . $row[name] . '</option>';
  }


  
?>
  </select>
  <input type="submit" class="btn btn-primary btn-sm" value="Submit"/>
</form>

<?php
  
  $string="BTC";
  
  if(isset($_POST['taskOption'])){

    $string=$_POST['taskOption'];

  }

  echo '<div class="chart" >';

  echo '<script type="text/javascript">
          baseUrl = "https://widgets.cryptocompare.com/";
          var scripts = document.getElementsByTagName("script");
          var embedder = scripts[ scripts.length - 1 ];
          (function (){
          var appName = encodeURIComponent(window.location.hostname);
          if(appName==""){appName="local";}
          var s = document.createElement("script");
          s.type = "text/javascript";
          s.async = true;
          var theUrl = baseUrl+"serve/v2/coin/chart?fsym='.$string.'&tsym=USD&period=6M";
          s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
          embedder.parentNode.appendChild(s);})();
        </script>';
  echo "</div>";
include ("down.php");
?>
</center>

<style type="text/css">

.chart { 
      width: 70%;
      
    }


