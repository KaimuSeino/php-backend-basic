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
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

// Authenticationミドルウェア用のインポートを追加
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\AbstractIdentifier;
use Authentication\Identifier\IdentifierInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

/**
 * アプリケーションの設定クラス
 *
 * アプリケーションで使用するブートストラップロジックとミドルウェアレイヤーが定義される
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    /**
     * 全てのアプリケーション設定とブートストラップロジックを読み込む
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // ファイルからブートストラップを読み込むために親を呼び出す。
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        } else {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        /*
         * 開発者モードでのみDebugKitを読み込もうとする。
         * DebugKitは本番システムにはインストールしない
         */
        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }

        // Authenticationプラグインの追加
        $this->addPlugin('Authentication');
    }

    /**
     * アプリケーションが使用するミドルウェアキューを設定する
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue 設定するミドルウェアキュー
     * @return \Cake\Http\MiddlewareQueue 更新されたミドルウェアキュー
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
            // 下層の例外をキャッチし、エラーページ/レスポンスを作成する
            ->add(new ErrorHandlerMiddleware(Configure::read('Error'), $this))

            // CakePHPが通常行うようにプラグイン/テーマアセットを処理する
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime'),
            ]))

            // ルーティングのミドルウェアを追加する
            // 多くのルートを接続している場合、本番環境でルートキャッシングをオンにするとパフォーマンスが向上する可能性がある
            // 詳細は https://github.com/CakeDC/cakephp-cached-routing を確認する
            ->add(new RoutingMiddleware($this))

            // さまざまな種類のエンコードされたリクエストボディを解析し、それらを配列として利用できるようにする
            // https://book.cakephp.org/4/en/controllers/middleware.html#body-parser-middleware を参照
            ->add(new BodyParserMiddleware())

            // クロスサイトリクエストフォージェリ(CSRF)保護ミドルウェア
            // https://book.cakephp.org/4/en/security/csrf.html#cross-site-request-forgery-csrf-middleware を参照
            ->add(new CsrfProtectionMiddleware([
                'httponly' => true,
            ]))

            // Authenticationミドルウェア
            ->add(new AuthenticationMiddleware($this));

        return $middlewareQueue;
    }

    /**
     * アプリケーションのコンテナサービスを登録する
     *
     * @param \Cake\Core\ContainerInterface $container 更新するコンテナ
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
    }

    /**
     * CLIアプリケーションのブートストラップ
     *
     * これはコマンドを実行する際に使用する
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        $this->addOptionalPlugin('Bake');

        $this->addPlugin('Migrations');

        // ここに他のプラグインが必要であれば読み込みを行う
    }

    /**
     * 認証サービスプロバイダー
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @return \Authentication\AuthenticationServiceInterface
     */
    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        // Define where users should be redirected to when they are not authenticated
        $service->setConfig([
            'unauthenticatedRedirect' => Router::url([
                    'prefix' => false,
                    'plugin' => null,
                    'controller' => 'Users',
                    'action' => 'login',
            ]),
            'queryParam' => 'redirect',
        ]);

        $fields = [
            AbstractIdentifier::CREDENTIAL_USERNAME => 'email',
            AbstractIdentifier::CREDENTIAL_PASSWORD => 'password'
        ];
        // Load the authenticators. Session should be first.
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => Router::url([
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
        ]);

        // Load identifiers
        $service->loadIdentifier('Authentication.Password', compact('fields'));

        return $service;
    }
}
