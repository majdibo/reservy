<?php
require '../core/vendor/autoload.php';
require '../core/common/get.php';
require '../core/common/post.php';
require '../core/common/put.php';
require '../core/common/delete.php';
require './client.php';

Flight::route('GET /', function(){get(Client::class, array("id","name","type","contact_id") );});

Flight::route('GET /@id', function($id){get(Client::class, array("id","name","type","contact_id"), $id);});

Flight::route('POST /', function(){
    post(Flight::request()->data, Client::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->type = $data->type;
            $resource->contact_id = $data->contact_id;
        }
    );
});

Flight::route('PUT /', function(){
    put(Flight::request()->data, Client::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->type = $data->type;
            $resource->contact_id = $data->contact_id;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Client::class, $id);});

Flight::start();