<?php

// 正規表現を使ってみよう！
// 正規表現とは文字列のパターンを表現するための方法

/**
 * よく使う表現
 * . 任意の一文字
 * * 0回以上の繰り返し
 * + 0回以上の繰り返し
 * {n} n回の繰り返し
 * [] 文字クラスの作成
 * [abc] aまたはbまたはc
 * [^abc] aまたはbまたはc以外
 * [0-9] 0~9まで
 * [a-z] a~zまで
 * $ 終端一致
 * ^ 先頭一致
 * \w 半角英数字とアンダースコア
 * \d 数値
 * \ エスケープ
 * () 文字列の抜き出し
 */

$char = '<h2>1zohosdhDKukk_Doccs</h2>';

echo $char;

if (preg_match('/[as]/', $char, $result)) {
    echo '検索成功 <br>';
    print_r($result);
} else {
    echo '検索失敗 <br>';
}

/**
 * 郵便番号
 * 
 * 001-0012 -> OK
 * 001-001 -> NG
 * 2.2-3042 -> NG
 * wd3-2132 -> NG
 * 124-56789 -> NG
 */
$zipcode = '121-5678';
echo '<br>' . $zipcode . '<br>';
if (preg_match('/^\d{3}-\d{4}$/', $zipcode, $result)) {
    echo "<div>郵便番号が正しいです</div>";
    print_r($result) . '<br>';
} else {
    echo '<div>郵便番号が不正です</div>';
}

/**
 * メールアドレス関連の正規表現
 * . _ - と半角英数字が可能
 * 
 * example000@gmail.com -> OK
 * example-0.00@gmail.com -> OK
 * example-0.00@ex.co.jp -> OK
 * example/0.00@ex.co.jp -> NG
 */
$email = 'example0.00@ex.co.jp';
echo "<div>{$email}</div>";
if (preg_match('/^[\w.\-]+@[\w\-]+\.[\w\.\-]+$/', $email, $result)) {
    echo 'メールが正しいです';
} else {
    echo 'メールが不正です';
}

/**
 * HTMLを消して文字だけ抽出
 * 見出しタグ(h1~h6)の中身のみを取得してみよう。
 */
$html = '<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h1>見出し１</h1>    
    <h2>見出し２</h2>    
    <h3>見出し３</h3>    
    <header>ヘッダー</header>
</body>
</html>';

if (preg_match_all('/<h[1-6](.+)<\/h[1-6]>/', $html, $result)) {
    echo "<br>";
    var_dump($result[count($result) - 1]);
}