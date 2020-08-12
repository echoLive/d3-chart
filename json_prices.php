<?php
// connection to DB
include 'database.php';

//the SQL query to be executed
$pricequery =   "SELECT * FROM `prices` WHERE `act_contract` = 'act' AND `market_id`= '11' ORDER BY `prices`.`update_date` ASC";
           
//storing the result of the executed query
$priceresult = $connect->query($pricequery);

//initialize the array to store the processed data
$pricejsonArray = array();

//check if there is any data returned by the SQL Query
if ($priceresult->num_rows > 0) {

//Converting the results into an associative array
  while($row = $priceresult->fetch_assoc()) {
    $pricejsonArrayItem = array();
    $pricejsonArrayItem['TIMESTAMP'] = $row['update_date'];
    $pricejsonArrayItem['CONTRACT'] = $row['contract_id'];
    $pricejsonArrayItem['OPEN'] = $row['open'];
    $pricejsonArrayItem['HIGH'] = $row['high'];
    $pricejsonArrayItem['LOW'] = $row['low'];
    $pricejsonArrayItem['CLOSE'] = $row['sett'];
    $pricejsonArrayItem['TURNOVER'] = $row['est_volume'];

//append the above created object into the main array.
    array_push($pricejsonArray, $pricejsonArrayItem);
  }
}

//Closing the connection to DB
$connect->close();

//set the response content type as JSON
header('Content-type: application/json');

//output the return value of json encode using the echo function. 
echo json_encode($pricejsonArray);

?>