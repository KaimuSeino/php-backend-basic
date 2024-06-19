<?php 
// 配列の操作に慣れる必要がある。
// 配列操作関数

$array = [
    ['table', 1000],
    ['chair', 100],
    ['desk', 100],
    ['light', 100],
    ['sofa', 10000],
    ['phone', 20000],
    ['bed', 10000],
];

// $array[1][1] = 500;
// array_shift($array);
// array_pop($array);
array_splice($array, 2, 2);


foreach($array as $val) {
    echo "{$val[0]}は{$val[1]}です。<br>";
}


// 