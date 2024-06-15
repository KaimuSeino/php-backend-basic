<?php

// 条件分岐の基本的な書き方
// AND(&&)条件, OR(||)条件

/**
 * 条件１:
 * 50点未満：不合格
 * 50点以上　70点未満：合格
 * 70点以上：優秀
 * 
 * 条件２：
 * 欠席日数
 * 5日以上：不合格
 */

$score = 80;
$kesseki = 4;

if ($score < 50 || $kesseki >= 5) {
  echo "不合格";
} else if ($score < 70) {
  echo "合格";
} else {
  echo "優秀";
}