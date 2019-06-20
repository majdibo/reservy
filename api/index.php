<?php
require './core/vendor/autoload.php';

Flight::route('GET /', function(){
    $url = Flight::request()->base;

    Flight::json([
        "_links" => [
            "clients"=> $url."/clients",
            "contacts" => $url."/contacts",
            "bills" => $url."/bills",
            "addresses" => $url."/addresses",
            "packages" => $url."/packages",
            "reservations" => $url."/reservations",
        ],
    ]);
});

Flight::start();
?>