<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="main-content">
    <h1>タスクを管理するためのアプリ</h1>
    <?php if ($auth): ?>
        <?= $this->Html->link(__('一覧'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'btn']) ?>
    <?php else: ?>
        <?= $this->Html->link(__('はじめる'), ['controller' => 'Auth', 'action' => 'login'], ['class' => 'btn']) ?>
    <?php endif ?>
</div>
<footer>
    フッター
</footer>
