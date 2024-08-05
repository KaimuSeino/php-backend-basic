<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div>
    <div>
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <label class="label-title"><?= __('ユーザー編集') ?></label>
                <div>
                    <?php
                        echo $this->Form->control('username', [
                            'label' => 'ユーザー名'
                        ]);
                        echo $this->Form->control('email', [
                            'label' => 'メールアドレス'
                        ]);
                    ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('更新'), ['class' => 'btn']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
