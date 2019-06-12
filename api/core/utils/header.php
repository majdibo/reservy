<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE');
header("Content-Type: application/json; charset=UTF-8");

require '../core/vendor/autoload.php';

require '../core/common/get.php';
require '../core/common/post.php';
require '../core/common/put.php';
require '../core/common/delete.php';