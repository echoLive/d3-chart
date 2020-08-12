<?php
include 'database.php';
$market_id = '30';
$cotquery =   "SELECT * from `cot-data` WHERE `market_id`= '$market_id' ORDER BY `cot-data`.`update_date` ASC";
$cotresult = $connect->query($cotquery);
$cotjsonArray = array();
if ($cotresult->num_rows > 0) {
  while($row = $cotresult->fetch_assoc()) {
    $cotjsonArrayItem = array();
    $cotjsonArrayItem['date_cot'] = $row['update_date'];
    $cotjsonArrayItem['comshort'] = $row['comshort'];
    $cotjsonArrayItem['comlong'] = $row['comlong'];
    array_push($cotjsonArray, $cotjsonArrayItem);
  }
}
$fp2 = fopen('cot.json', 'w');
fwrite($fp2, json_encode($cotjsonArray));
fclose($fp2);

$query =   "SELECT * FROM `prices` WHERE `act_contract` = 'act' AND `market_id`= '$market_id' ORDER BY `prices`.`update_date` ASC";
           
$result = $connect->query($query);

$jsonArray = array();

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    $jsonArrayItem = array();
    $jsonArrayItem['TIMESTAMP'] = $row['update_date'];
    $jsonArrayItem['CONTRACT'] = $row['contract_id'];
    if($row['multiplier'] != '') {
        $jsonArrayItem['OPEN'] = round($row['open'] * $row['multiplier'], 3);
        $jsonArrayItem['HIGH'] = round($row['high'] * $row['multiplier'], 3);
        $jsonArrayItem['LOW'] = round($row['low'] * $row['multiplier'], 3);
        $jsonArrayItem['CLOSE'] = round($row['sett'] * $row['multiplier'], 3);
    } else {
        $jsonArrayItem['OPEN'] = $row['open'];
        $jsonArrayItem['HIGH'] = $row['high'];
        $jsonArrayItem['LOW'] = $row['low'];
        $jsonArrayItem['CLOSE'] = $row['sett'];
    }
    $jsonArrayItem['TURNOVER'] = $row['est_volume'];

    array_push($jsonArray, $jsonArrayItem);
  }
}

$connect->close();

$header = ['TIMESTAMP', 'CONTRACT', 'OPEN', 'HIGH', 'LOW', 'CLOSE', 'TURNOVER'];
$fp = fopen('quotes.csv', 'wb');
fputcsv($fp, $header);
foreach($jsonArray as $content){
    fputcsv($fp, $content);
}
fclose($fp);
?>
<html>
    <head>    
        <meta charset="utf-8">    
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Sugar
        </title>    
        <link rel="stylesheet" href="cschart.css">    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">    
<script src="d3.v5.min.js" charset="utf-8"></script>        
<script src="d3-queue.v3.min.js"></script>          
<script src="topojson.v1.min.js"></script>          
<script src="cschart.js"></script>          
<script src="csbars.js"></script>          
<script src="cslines.js"></script>          
<script src="csheader.js"></script>          
<script src="csdataprep.js"></script>          
<script src="csmain2.js"></script>    
    </head>
    <body>    
        <div id="navbox">        
            <a href="10.php" class="btn btn-default btn-xs" role="button">GC</a>        
            <a href="11.php" class="btn btn-default btn-xs" role="button">SI</a>        
            <a href="12.php" class="btn btn-default btn-xs" role="button">PL</a>        
            <a href="13.php" class="btn btn-default btn-xs" role="button">PA</a>        
            <a href="14.php" class="btn btn-default btn-xs" role="button">HG</a>        
            <a href="15.php" class="btn btn-default btn-xs" role="button">CL</a>        
            <a href="16.php" class="btn btn-default btn-xs" role="button">RB</a>        
            <a href="17.php" class="btn btn-default btn-xs" role="button">HO</a>        
            <a href="18.php" class="btn btn-default btn-xs" role="button">NG</a>        
            <a href="19.php" class="btn btn-default btn-xs" role="button">ZC</a>        
            <a href="20.php" class="btn btn-default btn-xs" role="button">ZW</a>        
            <a href="21.php" class="btn btn-default btn-xs" role="button">ZR</a>        
            <a href="22.php" class="btn btn-default btn-xs" role="button">ZO</a>        
            <a href="23.php" class="btn btn-default btn-xs" role="button">ZS</a>        
            <a href="24.php" class="btn btn-default btn-xs" role="button">ZM</a>        
            <a href="25.php" class="btn btn-default btn-xs" role="button">ZL</a>        
            <a href="26.php" class="btn btn-default btn-xs" role="button">CC</a>        
            <a href="27.php" class="btn btn-default btn-xs" role="button">CT</a>        
            <a href="28.php" class="btn btn-default btn-xs" role="button">OJ</a>        
            <a href="29.php" class="btn btn-default btn-xs" role="button">KC</a>        
            <a href="30.php" class="btn btn-primary btn-xs" role="button">SB</a>        
            <a href="31.php" class="btn btn-default btn-xs" role="button">LB</a>        
            <a href="32.php" class="btn btn-default btn-xs" role="button">LE</a>        
            <a href="33.php" class="btn btn-default btn-xs" role="button">GF</a>        
            <a href="34.php" class="btn btn-default btn-xs" role="button">HE</a>        
            <a href="35.php" class="btn btn-default btn-xs" role="button">DA</a>    
        </div>    
        <div id="demobox">        
            <div id="csbox">            
                <div id="option">                
                    <input id="sixM" name="6M" type="button" value="6 Months" />                
                    <input id="oneY" name="1Y" type="button" value="1 Year" />                
                    <input id="fourY" name="4Y" type="button" value="4 Years" />            
                </div>            
                <div id="infobar">                
                    <div id="infodate" class="infohead">
                    </div>                
                    <div id="infoopen" class="infobox">
                    </div>                
                    <div id="infohigh" class="infobox">
                    </div>                
                    <div id="infolow" class="infobox">
                    </div>                
                    <div id="infoclose" class="infobox">
                    </div>                
                    <div id="infovolume" class="infovol">
                    </div>                
                    <div id="infocontract" class="infotail">
                    </div>                
                    <div>Today:                      
<?php include 'curl_investing.php';
                        $sb_last = scrape_between($scraped_page, "pid-8869-last", "</td>");
                        $sb_change_per = scrape_between($scraped_page, "pid-8869-pcp", "</td>");
                        $sb_last = substr($sb_last, 2);
                        $sb_change_per = substr($sb_change_per, 3);
                        echo $sb_last; ?>                     
                        <span style="color: <?php echo ($sb_change_per < 0 ? 'red' : 'green') ?>">&nbsp;
                            <?php echo $sb_change_per; ?>
                        </span>                
                    </div>            
                </div>                
                <div id="chart1">                                                                           
                </div>                                                                    
            </div>                         
            <!-- csbox -->                                                  
        </div>                                             
        <div id="cotbox">                          
        </div>
<script>
var tick1 = 380000;
var tick2 = 650000;
var ydomain = 200000;
</script>
<script src="cot.js"></script>     
    </body>
</html>