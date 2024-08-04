<?php
$cakeDescription = "タスカン";
$auth = $this->request->getSession()->read('Auth');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['index', 'original']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <a href="/" class="top-nav-title">
            タスカン
        </a>
        <div class="top-nav-links">
            <?php if ($auth): ?>
                <a href="/user">
                    <button class="btn">
                        プロフィール
                    </button>
                </a>
            <?php else: ?>
                <a href="/auth/login">
                    <button class="btn">
                        ログイン
                    </button>
                </a>
            <?php endif ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
