<?php
/**
 * 名前空間
 * 
 * コードの格納場所
 */

require_once 'lib.php';

use function lib\with_tax;
use const lib\sub\TAX_RATE;

$price = with_tax(1000, 0.08);
echo $price . "<br>";

echo TAX_RATE;

function my_echo() {
    echo "エコー";
}

class GlocalCls {}