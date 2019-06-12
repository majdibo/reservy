<?php

function get($classType, $items, $id =false){
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

// include database and object files
include_once '../core/config/database.php';

// instantiate database and resource object
$database = new Database();
$db = $database->getConnection();

// initialize object
$resource = new $classType($db);

// set ID property of record to read
if($id){
    $stmt = $resource->read($id);
} else {
    $stmt = $resource->readAll();
}

// query resources
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // resources array
    $resources_arr=array();
    $resources_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        $resource_item = array();

        foreach($items as $item){
            $resource_item["$item"] = $row["$item"];
        }

        array_push($resources_arr["records"], $resource_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show resources data in json format
    echo json_encode($resources_arr);
}else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no resources found
    echo json_encode(
        array("message" => "No resources found.")
    );
}
}
?>