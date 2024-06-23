<?php
/**
 * パスの書き方
 * 
 * - 相対パスと絶対パス
 * - マジック定数 __DIR__, __FILE__を使ってみよう
 * - dirnameの使い方
 * - \と/の使い分け
 * - "と'の使い分け
 */

echo dirname(__FILE__); // /var/app/html/php_basic_p3/04パスの設定
echo "<br>";
echo dirname(__DIR__); // /var/app/html/php_basic_p3

echo "<br>";

require_once __DIR__ . '/sub/file2.php';
require_once __DIR__ . '/file1.php';