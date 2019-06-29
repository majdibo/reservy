<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/core/utils/header.php';

require $_SERVER['DOCUMENT_ROOT'].'/api/packages/package.php';

Flight::route('GET /', function(){get(Package::class, array("id", "name","description","prix") );});

Flight::route('GET /@id', function($id){get(Package::class, array("id", "name","description","prix"), $id);});

Flight::route('POST /', function(){
    post(json_decode(Flight::request()->getBody()), Package::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->description = $data->description;
            $resource->prix = $data->prix;
        }
    );
});

Flight::route('PUT /', function(){
    put(json_decode(Flight::request()->getBody()), Package::class, function($resource, $data){
            $resource->name = $data->name;
            $resource->description = $data->description;
            $resource->prix = $data->prix;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Package::class, $id);});

include '../core/utils/publish.php';