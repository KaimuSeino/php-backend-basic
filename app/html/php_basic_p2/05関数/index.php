<?php

/**
 * 関数の制作
 */

$numbers = [1, 2, 3, 4];
$numbers2 = [8, 2, 1, 7];

function sum($nums) {
    $sum = 0;

    foreach($nums as $num) {
        $sum += $num;
    }

    return $sum;
}

$result = sum($numbers);
echo "合計：{$result}<br>";

$result2 = sum($numbers2);
echo "合計：{$result2}<br>";


$price = 1000;

function with_tax($base_price, $tax_rate = 0.1) {
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);

    return $sum_price;
}

$fn = "with_tax";
$price = $fn($price, 0.08);
echo $price;