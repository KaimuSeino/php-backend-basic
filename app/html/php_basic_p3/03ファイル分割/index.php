<?php
/**
 * ファイル分割の方法
 * 
 * - require, includeの違い
 * - require, require_onceの使い方
 */
$array = [
    'num' => 0
];

/**
 * require_once
 * 同じファイルを複数読み込もうとした場合、2回目以降はキャンセルされる。
 */
require_once('file2.php');
require_once('file2.php');
// require('file2.php');
// include 'file1.php';

// require('file1.php');
// require('file1.php');

echo $array['num'];
// fn1();