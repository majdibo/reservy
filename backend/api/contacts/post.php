<?php
include_once './contact.php';
include_once '../../common/post.php';

post(Contact::class, function($resource, $data){
    $resource->name = $data->name;
    $resource->phone = $data->phone;
} );

?>
