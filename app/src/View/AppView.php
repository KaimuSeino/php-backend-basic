<?php
declare(strict_types=1);

namespace App\View;

use Cake\View\View;

/**
 * アプリケーションビュー
 *
 * アプリケーションのデフォルトビュークラス
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * 初期化フックメソッド
     *
     * ヘルパーの読み込みなど、共通の初期化コードを追加するためにこのメソッドを使用する。
     *
     * 例: `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
    }
}
