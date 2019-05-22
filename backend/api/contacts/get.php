<?php
include_once './contact.php';
include_once '../../common/get.php';

get(Contact::class, array("id","name","phone") );

?>
