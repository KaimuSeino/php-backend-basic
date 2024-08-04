<?php
/**
 * ルート設定
 *
 * このファイルは、コントローラーとそのアクションに対するルートを設定する。
 * ルートは、異なるURLを選択したコントローラーとそのアクション（関数）に自由に接続できる非常に重要なメカニズム。
 *
 * このファイルは、`Application::route()`メソッドコンテキスト内で読み込まれ
 * メソッドの引用として`RouteBuilder`インスタンス`$route`を受け取る。
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * このファイルは`Application`クラスのコンテキストで読み込まれる。
 * そのため、必要に応じて`$this`を使用してアプリケーションクラスのインスタンスを参照できる。
 */
return function (RouteBuilder $routes): void {
    /*
     * 全てのルートに使用するデフォルトクラス
     *
     * CakePHPには次のルートクラスが用意されており、デフォルトとして設定するのに適している。
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * `Router::defaultRouteClass()`が呼び出されていない場合、使用されるクラスは
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     * `Route`はURLに対してインフレクションを行わないため、`{plugin}`, `{controller}`, `{action}`マーカーを使用すると、不一致の大文字小文字のURLが生成される。
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $routes): void {
        /*
         * ここでは、'/'（ベースパス）を'Pages'というコントローラーの
         * 'display'というアクションに接続し、使用するビューファイルを選択する
         * パラメーターを渡している。この場合、templates/Pages/home.php
         */
        $routes->connect('/',
            ['controller' => 'Pages', 'action' => 'display', 'home'],
        );

        /*
         * そして、'Pages'コントローラーの他のURLを接続する
         */
        $routes->connect('/pages/*', 'Pages::display');
    });

    /*
    * 認証関連のルーティング設定
    */
    $routes->scope('/auth', function (RouteBuilder $routes): void {
        $routes->connect('/login', ['controller' => 'Auth', 'action' => 'login']);
        $routes->connect('/register', ['controller' => 'Auth', 'action' => 'register']);
    });

    $routes->connect('/user', ['controller' => 'Users', 'action' => 'index']);

    /*
     * 別のミドルウェアセットが必要な場合や、全く不要な場合は、新しいスコープを開いてそこでルートを定義する。
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // ここでは $builder->applyMiddleware()を使用しない。
     *
     *     // URLから指定された拡張子を解析する。
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // ここでAPIアクションを接続
     * });
     * ```
     */
};
