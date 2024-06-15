<?php
// ==と===の違い

/*
falsyな値:
""（空文字）
0（数値、文字列）
NULL
FALSE
*/

$var = "";

if (!null) {
  echo 'true';
} else {
  echo 'false';
}
