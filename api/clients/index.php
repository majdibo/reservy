<?php
include  $_SERVER['DOCUMENT_ROOT'].'/api/core/utils/header.php';
require  $_SERVER['DOCUMENT_ROOT'].'/api/clients/client.php';

Flight::route('GET /', function(){get(Client::class, array("id","name","type","contact_id") );});

Flight::route('GET /@id', function($id){get(Client::class, array("id","name","type","contact_id"), $id);});

Flight::route('POST /', function(){
    post(json_decode(Flight::request()->getBody()), Client::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->type = $data->type;
            $resource->contact_id = $data->contact_id;
        }
    );
});

Flight::route('PUT /', function(){
    put(json_decode(Flight::request()->getBody()), Client::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->type = $data->type;
            $resource->contact_id = $data->contact_id;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Client::class, $id);});

include '../core/utils/publish.php';