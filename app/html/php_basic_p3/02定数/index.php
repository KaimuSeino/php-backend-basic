<?php
/**
 * 定数の使い方
 * 
 * - define, constでの定義方法
 * - constはif文や関数の中では使えない
 * - defineではグローバルスコープに値が保存される
 * - constは名前空間内に配置される
 */

if (!defined('TAX_RATE')) {
    define('TAX_RATE', 0.1);
}

function with_tax($base_price, $tax_rate = TAX_RATE) {
    $sum_price = $base_price + ($base_price * $tax_rate);
    $sum_price = round($sum_price);

    return $sum_price;
}

$price = with_tax(1000, 0.08);
echo $price;