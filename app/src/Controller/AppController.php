<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * 以下のクラスにアプリケーションで使用するメソッドを追加する
 * これらは全て継承される
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * 初期化フックメソッド
     *
     * このメソッドを使用して、コンポーネントの読み込みなどの共通の初期化コードを追加する
     *
     * 例 `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * 推奨されるCakePHPフレームワーク保護設定のために以下のコンポーネントを有効化する
         * https://book.cakephp.org/4/en/controllers/components/form-protection.html 参照
         */
        //$this->loadComponent('FormProtection');
    }
}
