<?php
include_once './client.php';
include_once '../../common/post.php';

post(Client::class, function($resource, $data){
    $resource->name = $data->name;
    $resource->type = $data->type;
    $resource->contact_id = $data->contact_id;
} );

?>
