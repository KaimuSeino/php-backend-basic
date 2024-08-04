<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('新しいアカウントを作成') ?></legend>
        <?= $this->Form->control('username', [
            'label' => 'ユーザー名'
        ]) ?>
        <?= $this->Form->control('email', [
            'label' => 'メールアドレス'
        ]) ?>
        <?= $this->Form->control('password', [
            'label' => 'パスワード'
        ]) ?>
    </fieldset>
    <?= $this->Form->button(__('登録')); ?>
    <?= $this->Form->end() ?>
</div>