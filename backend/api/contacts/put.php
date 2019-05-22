<?php
include_once './contact.php';
include_once '../../common/put.php';

put(Contact::class, function($resource, $data){
    $resource->name = $data->name;
    $resource->phone = $data->phone;
} );

?>