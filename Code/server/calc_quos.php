<?php
function calc_quos($img){
    $max = max([imagesx($img), imagesy($img)]);
    $aside_width = 100;
    return (100 / $max);
}
?>