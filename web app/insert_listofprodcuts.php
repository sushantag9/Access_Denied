<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Creating Array for JSON response
$response = array();
 
// Check if we got the field from the user
if ( isset($_GET['product_name']) && isset($_GET['product_id']) && isset($_GET['product_price']) && isset($_GET['product_seller']) && isset($_GET['quantity'])   ) {
   
 
  
    $product_name = $_GET['product_name'];
    $product_id = $_GET['product_id'];
    $product_price = $_GET['product_price'];
    $product_seller = $_GET['product_seller'];
    $quantity = $_GET['quantity'];

    
    // Include data base connect class
    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // Connecting to database 
    $db = new DB_CONNECT();
 
    // Fire SQL query to insert data in weather
    $result = mysql_query("INSERT INTO manager_listofproducts(product_name, product_id, product_price, product_seller, quantity) VALUES('$product_name','$product_id','$product_price','$product_seller','$quantity' )");
 
    // Check for succesfull execution of query
    if ($result) {
        // successfully inserted 
        $response["success"] = 1;
        $response["message"] = "object successfully created.";
 
        // Show JSON response
        echo json_encode($response);
    } else {
        // Failed to insert data in database
        $response["success"] = 0;
        $response["message"] = "Something has been wrong";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // Show JSON response
    echo json_encode($response);
}
?>