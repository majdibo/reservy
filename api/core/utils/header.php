<?php
// required headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE');
header("Content-Type: application/json; charset=UTF-8");

require $_SERVER['DOCUMENT_ROOT'].'/api/core/vendor/autoload.php';

require  $_SERVER['DOCUMENT_ROOT'].'/api/core/common/get.php';
require  $_SERVER['DOCUMENT_ROOT'].'/api/core/common/post.php';
require  $_SERVER['DOCUMENT_ROOT'].'/api/core/common/put.php';
require  $_SERVER['DOCUMENT_ROOT'].'/api/core/common/delete.php';