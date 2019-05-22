<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../../config/database.php';
include_once './contact.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare resource object
$resource = new Contact($db);

// get resource id
if(isset($_GET['id'])){
    // set resource id to be deleted
    $resource->id = $_GET['id'];

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
?>