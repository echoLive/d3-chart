<?php
// code from https://www.fusioncharts.com/dev/using-with-server-side-languages/tutorials/php-mysql-charts
// createCSV(21);
function createCSV($market_id) {
    // connection to DB
    include 'database.php';

    //the SQL query to be executed
    $query =   "SELECT *,
                (select comshort from `cot-data` where market_id=prices.market_id and update_date=prices.update_date) cs,
                (select comlong from `cot-data` where market_id=prices.market_id and update_date=prices.update_date) cl
                FROM `prices` WHERE `act_contract` = 'act' AND `market_id`= '$market_id' ORDER BY `prices`.`update_date` ASC
                ";
               
    //storing the result of the executed query
    $result = $connect->query($query);

    //initialize the array to store the processed data
    $jsonArray = array();

    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {

    //Converting the results into an associative array
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
        $jsonArrayItem['COMSHORT'] = $row['cs'];
        $jsonArrayItem['COMLONG'] = $row['cl'];

    //append the above created object into the main array.
        array_push($jsonArray, $jsonArrayItem);
      }
    }

    //Closing the connection to DB
    // $connect->close();

    //set the response content type as JSON
    // header('Content-type: application/json');

    //output the return value of json encode using the echo function. 
    // echo json_encode($jsonArray);

    // write array into csv-file
    $header = ['TIMESTAMP', 'CONTRACT', 'OPEN', 'HIGH', 'LOW', 'CLOSE', 'TURNOVER', 'COMSHORT','COMLONG'];
    $fp = fopen('mainData.csv', 'wb');
    fputcsv($fp, $header);
    foreach($jsonArray as $content){
        fputcsv($fp, $content);
    }
    fclose($fp);

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
    // $connect->close();
    return 0;
}

?>