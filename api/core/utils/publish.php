<?php
Flight::route('OPTIONS /*', function() {
        Flight::json('ACCEPT CORS');
});

Flight::start();