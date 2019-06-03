<?php
function console($s){
    $fw = fopen("php://stdout", "w");
    fprintf($fw, "--------".$s."\r\n");
}

?>