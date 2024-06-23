<?php
/**
 * 条件分岐の省略形
 * 
 * - 三項演算子の使い方
 * - null合体演算子
 */

$array = [
    // 'key' => 10,
];


$array['key'] = $array['key'] ?? 1;
echo $array['key'];

