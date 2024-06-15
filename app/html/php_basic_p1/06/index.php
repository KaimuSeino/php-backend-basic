<?php
// データ型とは？
$int = 1;
$boolean = true;
$string = 'hello';

// データ型の確認方法 var_dump
echo '$intの型は: ';
var_dump($int);
echo '$booleanの型は: ';
var_dump($boolean);
echo '$intの型は: ';
var_dump($string);

// 異なる型は自動的に変換される
echo $boolean + $int;

// 明示的な変換
echo (int) $boolean; // 1が表示

// 型の取り扱いの注意
var_dump($int === "1");
