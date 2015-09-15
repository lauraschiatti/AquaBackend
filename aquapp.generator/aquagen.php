#!/usr/bin/php -q

<?php

function frand($min, $max, $decimals = 0) {
    $scale = pow(10, $decimals);
    return mt_rand($min * $scale, $max * $scale) / $scale;
}

$nodes = array("dDaE4CFD", "8C2Ab5fA", "99f80D47");

for($i = 0; $i < 3; $i++){
    //$aux = rand(0, 2);
    $node_id  = $nodes[$i];
    switch($i){
        case 0:
            $MAX_COLUMNAS = 5;
            break;
        case 1:
            $MAX_COLUMNAS = 4;
            break;
        case 2:
            $MAX_COLUMNAS = 4;
            break;
    }
    $TEMP = 25.0;
    $stamp = date('YmdHis');
    $file =  dirname(__FILE__).'/spool/'.$node_id.'-'.$stamp .'.txt';
    $handle = fopen($file, 'a') or die('Cannot open file:  '.$file);
    $data = "" . $node_id."\t". $stamp;
    $value = 0;

    for ($j = 0; $j < $MAX_COLUMNAS; $j++){
        $value = $TEMP + frand(-10, 10, 6);
        $data = $data . "\t" . $value;
    }
    fwrite($handle, $data);
}
