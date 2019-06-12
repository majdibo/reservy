<?php
function post($data, $classType, $buildResource){
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../core/config/database.php';

// get database connection
$database = new Database();
$db = $database->getConnection();


// prepare resource object
$resource = new $classType($db);

// set resource property values
$buildResource($resource, $data);

// update the resource
if($data->id){
    // set ID property of resource to be edited
    $resource->id = $data->id;

    if($resource->update()){

        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "resource was updated."));
    }

    // if unable to update the resource, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to update resource $resource->id."));
    }
} else {
    if($resource->create()){

        // set response code - 200 ok
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "resource was created."));
    }

    // if unable to update the resource, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create resource."));
    }
}
}
?>