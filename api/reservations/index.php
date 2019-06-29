<?php
include $_SERVER['DOCUMENT_ROOT'].'/api/core/utils/header.php';

require $_SERVER['DOCUMENT_ROOT'].'/api/reservations/reservation.php';

Flight::route('GET /', function(){get(Reservation::class, array("id", "address_id", "client_id", "package_id", "bill_id", "status", "start_date", "end_date", "note") );});

Flight::route('GET /@id', function($id){get(Reservation::class, array("id", "address_id", "client_id", "package_id", "bill_id", "status", "start_date", "end_date", "note"), $id);});

Flight::route('POST /', function(){
    post(json_decode(Flight::request()->getBody()), Reservation::class, function($resource, $data){
            $resource->address_id = $data->address_id;
            $resource->client_id = $data->client_id;
            $resource->package_id = $data->package_id;
            $resource->bill_id = $data->bill_id;
            $resource->status = $data->status;
            $resource->start_date = $data->start_date;
            $resource->end_date = $data->end_date;
            $resource->note = $data->note;
        }
    );
});

Flight::route('PUT /', function(){
    put(json_decode(Flight::request()->getBody()), Reservation::class, function($resource, $data){
            $resource->address_id = $data->address_id;
            $resource->client_id = $data->client_id;
            $resource->package_id = $data->package_id;
            $resource->bill_id = $data->bill_id;
            $resource->status = $data->status;
            $resource->start_date = $data->start_date;
            $resource->end_date = $data->end_date;
            $resource->note = $data->note;
        }
    );
});

Flight::route('DELETE /@id', function($id){delete(Reservation::class, $id);});

include '../core/utils/publish.php';