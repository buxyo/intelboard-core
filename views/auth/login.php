<?php
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
$error = Flash::get('error');
?>
<div class="auth-page">
    <div class="container">
        <div class="auth-card">
            <h2><?= Lang::get('login.header') ?></h2>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="POST" action="/login">
                <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                <div class="form-group">
                    <label><?= Lang::get('login.email') ?></label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label><?= Lang::get('login.password') ?></label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">
                    <?= Lang::get('login.submit') ?>
                </button>
            </form>
        </div>
    </div>
</div>