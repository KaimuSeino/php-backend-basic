<?php 
// 配列（array）
$array = ['aaa', 'bbbb', 'ccccc'];

var_dump($array);
echo '<br>' . $array[0];

$array[1] = "hello";

echo '<br> $array[1]' . $array[1];

// 繰り返し処理

for($i = 0; $i < count($array); $i++) {
    echo "<div>" . $array[$i] . "</div>";
}

foreach($array as $i => $v) {
    echo "<div>", $i, $v, "</div>";
}