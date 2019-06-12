<?php
include '../core/utils/header.php';

require './contact.php';

Flight::route('GET /', function(){get(Contact::class, array("id","name","phone") );});

Flight::route('GET /@id', function($id){get(Contact::class, array("id","name","phone"), $id);});

Flight::route('POST /', function(){
    post(Flight::request()->data, Contact::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->phone = $data->phone;
        }
    );
});

Flight::route('PUT /', function(){
    put(Flight::request()->data, Contact::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->phone = $data->phone;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Contact::class, $id);});

include '../core/utils/publish.php';