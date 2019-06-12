<?php

function delete($classType, $id){

// include database and object file
include_once '../core/config/database.php';


// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare resource object
$resource = new $classType($db);

// get resource id
if(isset($id)){
    // set resource id to be deleted
    $resource->id = $id;

    // delete the resource
    if($resource->delete()){

        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "resource was deleted."));
    }

    // if unable to delete the resource
    else{

        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to delete resource."));
    }

} else{
// set response code - 404 Not found
    http_response_code(404);

    // tell the user no resources found
    echo json_encode(
        array("message" => "resource not found.")
    );
}
}
?>