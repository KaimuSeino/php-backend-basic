<?php

// 連想配列だー!
$array = [
    'name' => 'kaimu',
    'age' => 12,
    'sports' => ['basketball', 'swimming']
];
unset($array['name']); // nullにしてるってこと？

if(isset($array['name'])) {
    echo $array['name'];
} else {
    echo '$array["name"]はnullです';
}

$array['age'] += 22;

echo $array['age'];
echo $array['sports'][1];
