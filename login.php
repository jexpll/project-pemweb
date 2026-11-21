<?php require 'config.php';
if (user())
    go('index.php'); ?><!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Masuk — Karsa</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <main class="auth"><a class="logo" href="index.php">✳ KARSA</a>
        <div class="panel">
            <p class="eyebrow">AKSES TALENTA</p>
            <h1>Selamat datang<br><em>kembali.</em></h1>
            <?php if (!empty($_SESSION['error'])) {
                echo '<div class="alert">' . e($_SESSION['error']) . '</div>';
                unset($_SESSION['error']);
            } ?>
            <form method="post" action="auth.php?action=login"><label>Email<input type="email" name="email"
                        required></label><label>Password<input type="password" name="password" required></label><button
                    class="button">Masuk ↗</button></form>
            <p class="muted">Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
        </div>
    </main>
</body>

</html>