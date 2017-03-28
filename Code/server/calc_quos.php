<?php
function calc_quos($img, $size){
    $max = max([imagesx($img), imagesy($img)]);
    return ($size / $max);
}
?>