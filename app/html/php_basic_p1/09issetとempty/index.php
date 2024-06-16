<?php
/*
- isset
変数が定義されていて、null以外の時にtrueを返す。

- empty
issetがfalse、または値がfalsyな時にtureを返す。

プログラムで説明すると
!isset($val) || $val == false

*/

$num_str = "0";
$num_int = 1;

var_dump($num_str == false);

if (!isset($num_str) || $num_str == false) {
  echo 'true';
} else {
  echo 'false';
}
