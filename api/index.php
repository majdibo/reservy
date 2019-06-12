<?php
require './core/vendor/autoload.php';

Flight::route('GET /', function(){
    $url = Flight::request()->base;

    Flight::json([
        "_links" => [
            "clients"=> $url."/clients",
            "contacts" => $url."/contacts"
        ],
    ]);
});

Flight::start();
?>