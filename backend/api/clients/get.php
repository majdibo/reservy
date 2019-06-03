<?php
include_once './client.php';
include_once '../../common/get.php';

get(Client::class, array("id","name","type","contact_id") );

?>