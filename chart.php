<?php
include 'database.php';
include 'makeCSV.php';

$sql_1 = "SELECT file_date FROM filedate WHERE file_name ='market_id'";
$fileTime_old = mysqli_query($connect, $sql_1);
$row_time = mysqli_fetch_row($fileTime_old);
$market_id = $row_time[0];

$csvFile = createCSV($market_id);

$sql_3 = "SELECT market FROM markets WHERE market_ID ='$market_id'";
$market_name_val = mysqli_query($connect, $sql_3);
$market_val = mysqli_fetch_row($market_name_val);
$market_name = $market_val[0];

?>
<html>
<head>    
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?php echo $market_name; ?></title>    
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
    <script src="csmain.js"></script>    
</head>
  <body>    
  <div id="navbox">
    <form method="post">        
      <input type="submit" name="search-button10" class="btn btn-default btn-xs <?php if($market_id == '10') echo 'btn-primary'; ?>" value="GC"/>
      <input type="submit" name="search-button11" class="btn btn-default btn-xs <?php if($market_id == '11') echo 'btn-primary'; ?>" value="SI"/>
      <input type="submit" name="search-button12" class="btn btn-default btn-xs <?php if($market_id == '12') echo 'btn-primary'; ?>" value="PL"/>
      <input type="submit" name="search-button13" class="btn btn-default btn-xs <?php if($market_id == '13') echo 'btn-primary'; ?>" value="PA"/>
      <input type="submit" name="search-button14" class="btn btn-default btn-xs <?php if($market_id == '14') echo 'btn-primary'; ?>" value="HG"/>
      <input type="submit" name="search-button15" class="btn btn-default btn-xs <?php if($market_id == '15') echo 'btn-primary'; ?>" value="CL"/>
      <input type="submit" name="search-button16" class="btn btn-default btn-xs <?php if($market_id == '16') echo 'btn-primary'; ?>" value="RB"/>
      <input type="submit" name="search-button17" class="btn btn-default btn-xs <?php if($market_id == '17') echo 'btn-primary'; ?>" value="HO"/>
      <input type="submit" name="search-button18" class="btn btn-default btn-xs <?php if($market_id == '18') echo 'btn-primary'; ?>" value="NG"/>
      <input type="submit" name="search-button19" class="btn btn-default btn-xs <?php if($market_id == '19') echo 'btn-primary'; ?>" value="ZC"/>
      <input type="submit" name="search-button20" class="btn btn-default btn-xs <?php if($market_id == '20') echo 'btn-primary'; ?>" value="ZW"/>
      <input type="submit" name="search-button21" class="btn btn-default btn-xs <?php if($market_id == '21') echo 'btn-primary'; ?>" value="ZR"/>
      <input type="submit" name="search-button22" class="btn btn-default btn-xs <?php if($market_id == '22') echo 'btn-primary'; ?>" value="ZO"/>
      <input type="submit" name="search-button23" class="btn btn-default btn-xs <?php if($market_id == '23') echo 'btn-primary'; ?>" value="ZS"/>
      <input type="submit" name="search-button24" class="btn btn-default btn-xs <?php if($market_id == '24') echo 'btn-primary'; ?>" value="ZM"/>
      <input type="submit" name="search-button25" class="btn btn-default btn-xs <?php if($market_id == '25') echo 'btn-primary'; ?>" value="ZL"/>
      <input type="submit" name="search-button26" class="btn btn-default btn-xs <?php if($market_id == '26') echo 'btn-primary'; ?>" value="CC"/>
      <input type="submit" name="search-button27" class="btn btn-default btn-xs <?php if($market_id == '27') echo 'btn-primary'; ?>" value="CT"/>
      <input type="submit" name="search-button28" class="btn btn-default btn-xs <?php if($market_id == '28') echo 'btn-primary'; ?>" value="OJ"/>
      <input type="submit" name="search-button29" class="btn btn-default btn-xs <?php if($market_id == '29') echo 'btn-primary'; ?>" value="KC"/>
      <input type="submit" name="search-button30" class="btn btn-default btn-xs <?php if($market_id == '30') echo 'btn-primary'; ?>" value="SB"/>
      <input type="submit" name="search-button31" class="btn btn-default btn-xs <?php if($market_id == '31') echo 'btn-primary'; ?>" value="LB"/>
      <input type="submit" name="search-button32" class="btn btn-default btn-xs <?php if($market_id == '32') echo 'btn-primary'; ?>" value="LE"/>
      <input type="submit" name="search-button33" class="btn btn-default btn-xs <?php if($market_id == '33') echo 'btn-primary'; ?>" value="GF"/>
      <input type="submit" name="search-button34" class="btn btn-default btn-xs <?php if($market_id == '34') echo 'btn-primary'; ?>" value="LH"/>
      <input type="submit" name="search-button35" class="btn btn-default btn-xs <?php if($market_id == '35') echo 'btn-primary'; ?>" value="DA"/>
    </form>

    <?php
        if(array_key_exists('search-button10', $_POST)) { 
          $sql_2 = "UPDATE filedate SET file_date = '10' WHERE file_name = 'market_id'";
          mysqli_query($connect, $sql_2);
          // createCSV(10);
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button11', $_POST)) { 
          $sql_2 = "UPDATE filedate SET file_date = '11' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2);
          // createCSV(11);
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button12', $_POST)) { 
          $sql_2 = "UPDATE filedate SET file_date = '12' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2);
          // createCSV(12);
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button13', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '13' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button14', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '14' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button15', $_POST)) { 
          $sql_2 = "UPDATE filedate SET file_date = '15' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2);
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button16', $_POST)) { 
          $sql_2 = "UPDATE filedate SET file_date = '16' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2);
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button17', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '17' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button18', $_POST)) { 
          $sql_2 = "UPDATE filedate SET file_date = '18' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2);
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button19', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '19' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button20', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '20' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button21', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '21' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button22', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '22' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button23', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '23' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button24', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '24' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button25', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '25' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button26', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '26' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button27', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '27' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button28', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '28' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button29', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '29' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button30', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '30' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button31', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '31' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button32', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '32' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button33', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '33' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button34', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '34' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        } else if(array_key_exists('search-button35', $_POST)) {
          $sql_2 = "UPDATE filedate SET file_date = '35' WHERE file_name = 'market_id'";
          $result_time = mysqli_query($connect, $sql_2); 
          $refreshAfter = 0;
          header('Refresh: ' . $refreshAfter);
        }
    ?> 
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
                $zr_last = scrape_between($scraped_page, "pid-13916-last>", "</td>");
                $zr_change_per = scrape_between($scraped_page, "pid-13916-pcp >", "</td>");
                echo $zr_last;
                                        ?>                     
                    <span style="color: <?php echo ($zr_change_per < 0 ? 'red' : 'green') ?>">&nbsp;
                        <?php echo $zr_change_per; ?>
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
  // set the dimensions and margins of the graph
  var margin = {top: 10, right: 60, bottom: 20, left: 2},
      width = 1062 - margin.left - margin.right,
      height = 120 - margin.top - margin.bottom;
  // parse the date / time
  var parseTime = d3.timeParse("%Y-%m-%d");
  // set the ranges
  var x = d3.scaleTime().range([0, width]);
  var y = d3.scaleLinear().range([0, height]);
  // define the line
  var valueline = d3.line()
      .x(function(d) { return x(d.date_cot); })
      .y(function(d) { return y(d.comshort); });
  // append the svg obgect to the body of the page
  // appends a 'group' element to 'svg'
  // moves the 'group' element to the top left margin
  var svg = d3.select("#cotbox").append("svg")
      .attr("width", width + margin.left + margin.right)
      .attr("height", height + margin.top + margin.bottom)
    .append("g")
      .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");
  var yAxisRight = d3.axisRight()
       .scale(y)
       .ticks(Math.floor(height/40));
                   
  // gridlines in y axis function
          function make_y_gridlines() {
          return d3.axisLeft(y)
              .ticks(2)
              .tickValues([3200, 6600])
          }
  // Get the data
  d3.json("cot.json").then(function(data) {
    // format the data
    data.forEach(function(d) {
        d.date_cot = parseTime(d.date_cot);
        d.comshort = +d.comshort;
    });
    // Scale the range of the data
    x.domain(d3.extent(data, function(d) { return d.date_cot; }));
    y.domain([2000, d3.max(data, function(d) { return d.comshort; })]);
    // Add the valueline path.
    svg.append("path")
        .data([data])
        .attr("class", "line")
        .attr("d", valueline);
    // Add the x Axis
    svg.append("g")
        .attr("transform", "translate(0," + height + ")")
        .call(d3.axisBottom(x));
    // Add the y Axis
    svg.append("g")
        .call(d3.axisLeft(y))
        .attr("class", "grid")
        .call(make_y_gridlines().tickSize(-width, 0, 0));
    svg.append("g")
        .attr("class", "axis yaxis")
        .attr("transform", "translate(" + width + ",0)")
        .call(yAxisRight.tickSizeOuter(3)
              .ticks(2)
              .tickValues([3200, 6600])
        );//right
    
  });
  </script>         
  </body>
</html>