<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/core/utils/header.php';

require $_SERVER['DOCUMENT_ROOT'].'/api/bills/bill.php';

Flight::route('GET /', function(){get(Bill::class, array("id", "amount", "paid_amount") );});

Flight::route('GET /@id', function($id){get(Bill::class, array("id", "amount", "paid_amount"), $id);});

Flight::route('POST /', function(){
    post(json_decode(Flight::request()->getBody()), Bill::class, function($resource, $data){
            $resource->amount = $data->amount;
            $resource->paid_amount = $data->paid_amount;
        }
    );
});

Flight::route('PUT /', function(){
    put(json_decode(Flight::request()->getBody()), Bill::class, function($resource, $data){
            $resource->amount = $data->amount;
            $resource->paid_amount = $data->paid_amount;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Bill::class, $id);});

include '../core/utils/publish.php';