<?php

function put($data, $classType, $buildResource){

// get database connection
include_once '../core/config/database.php';

$database = new Database();
$db = $database->getConnection();

$resource = new $classType($db);

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
        echo json_encode(array("message" => "Resource was created."));
    }

    // if unable to create the resource, tell the user
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create resource."));
    }
}

// tell the user data is incomplete
else{

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Unable to create resource. Data is incomplete."));
}
}
?>