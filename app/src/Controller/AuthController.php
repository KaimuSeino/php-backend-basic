<?php 
declare(strict_types=1);

namespace App\Controller;

/**
 * Auth Controller
 * 認証機能のコントローラ
 * 
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{
    /**
     * アクション前の処理
     * 
     * @param \Cake\Event\EventInterface $event — イベントインスタンス
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login', 'register']);
    }

    /**
     * ログインアクション
     * 
     * @return undefined 
     */
    public function login()
    {
        $result = $this->Authentication->getResult();
        
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/user';
            return $this->redirect($target);
        }
        if ($this->request->is('post')) {
            $this->Flash->error('Invalid username or password');
        }
    }

    /**
     * ログアウトアクション
     * 
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    /**
     * 新規登録アクション
     * 
     * @return \Cake\Http\Response|null|void 登録が成功した場合はリダイレクト, そうでない場合はviewをレンダリングする。
     */
    public function register()
    {
        // UsersTableクラスのインスタンスを取得
        $userTable = $this->fetchTable('Users');

        // Userのエンティティを取得
        $user = $userTable->newEmptyEntity();

        if ($this->request->is('post')) {

            // ユーザーエンティティにデータをセット
            $user = $userTable->patchEntity($user, $this->request->getData());
            if ($userTable->save($user)) {
                $this->Flash->success(__('登録が完了しました'));

                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            $this->Flash->error(__('エラーが発生しました'));
        }
        $this->set('user', $user);
    }
}