<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/core/utils/header.php';

require $_SERVER['DOCUMENT_ROOT'].'/api/addresses/address.php';

Flight::route('GET /', function(){get(Address::class, array("id", "location") );});

Flight::route('GET /@id', function($id){get(Address::class, array("id", "location"), $id);});

Flight::route('POST /', function(){
    post(json_decode(Flight::request()->getBody()), Address::class, function($resource, $data){
            $resource->location = $data->location;
        }
    );
});

Flight::route('PUT /', function(){
    put(json_decode(Flight::request()->getBody()), Address::class, function($resource, $data){
            $resource->location = $data->location;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Address::class, $id);});

include '../core/utils/publish.php';