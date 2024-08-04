<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
    <label class="label-title"><?= __('新しいアカウントを作成') ?></label>
        <div>
            <?= $this->Form->control('email', [
                'label' => 'メールアドレス'
            ]) ?>
            <?= $this->Form->control('password', [
                'label' => 'パスワード'
            ]) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('ログイン'), ['class' => 'btn']); ?>
    <?= $this->Form->end() ?>
</div>