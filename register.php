<?php require 'config.php';
if (user())
    go('index.php'); ?><!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar — Karsa</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <main class="auth"><a class="logo" href="index.php">✳ KARSA</a>
        <div class="panel">
            <p class="eyebrow">MULAI LANGKAHMU</p>
            <h1>Buat profil<br><em>pertamamu.</em></h1>
            <?php if (!empty($_SESSION['error'])) {
                echo '<div class="alert">' . e($_SESSION['error']) . '</div>';
                unset($_SESSION['error']);
            } ?>
            <form method="post" action="auth.php?action=register"><label>Nama lengkap<input name="name"
                        required></label><label>Email<input type="email" name="email" required></label><label>Password
                    <small>(min. 8 karakter)</small><input type="password" name="password" minlength="8"
                        required></label><button class="button">Daftar akun ↗</button></form>
            <p class="muted">Sudah punya akun? <a href="login.php">Masuk</a></p>
        </div>
    </main>
</body>

</html>