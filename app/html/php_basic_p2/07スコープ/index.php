<?php

/**
 * スコープ
 * 変数が参照可能な範囲
 * 
 * - グローバルスコープ
 * - ローカルスコープ
 * - スーパーグローバル
 */

$a = 0;
echo $a;

function fn1() {
    $b = 1;
    echo $b;
}

function fn2() {
    global $a;
    // var_dump($_SERVER);

    echo $a;
}

fn2();