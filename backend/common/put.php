<?php

function put($classType, $buildResource){
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../../config/database.php';

$database = new Database();
$db = $database->getConnection();

$resource = new $classType($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty

if(true
   /* !empty($data->name) &&
    !empty($data->phone)*/
){

    // set resource property values
    $buildResource($resource, $data);


    // create the resource
    if($resource->create()){

        // set response code - 201 created
        http_response_code(201);

        // tell the user
        echo json_encode(array("message" => "Contact was created."));
    }

    // if unable to create the resource, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create contact."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create contact. Data is incomplete."));
}
}
?>