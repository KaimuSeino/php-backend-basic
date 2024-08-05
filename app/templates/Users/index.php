<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users index content">
    <h3><?= __('ユーザー情報') ?></h3>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->username) ?></h3>
            <table>
                <tr>
                    <th><?= __('ユーザー名') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('メールアドレス') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
