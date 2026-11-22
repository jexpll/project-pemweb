<?php require 'config.php';
require_login();
$s = $pdo->prepare('SELECT a.*,j.title,j.company,j.location,j.type FROM applications a JOIN jobs j ON j.id=a.job_id WHERE a.user_id=? ORDER BY a.created_at DESC');
$s->execute([user()['id']]);
$apps = $s->fetchAll(); ?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard | Karsa</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <header class="topbar"><a class="logo" href="index.php">✳ KARSA</a>
        <nav><a href="index.php">Jelajahi lowongan</a></nav><a class="nav-cta" href="auth.php?action=logout">Keluar</a>
    </header>
    <main class="dashboard">
        <p class="eyebrow">RUANG PRIBADIMU</p>
        <h1>Hai, <?= e(user()['name']) ?>.</h1>
        <p class="intro">Pantau semua langkahmu menuju peluang berikutnya.</p>
        <h2>Lamaran saya</h2>
        <div class="application-list"><?php foreach ($apps as $a): ?>
                <article>
                    <div><span class="type"><?= e($a['type']) ?></span>
                        <h3><?= e($a['title']) ?></h3>
                        <p><?= e($a['company']) ?> · <?= e($a['location']) ?></p>
                    </div><strong class="status"><?= e($a['status']) ?></strong>
                </article><?php endforeach;
        if (!$apps): ?>
                <article>Belum ada lamaran. <a href="index.php">Jelajahi peluang ↗</a></article><?php endif; ?>
        </div>
    </main>
</body>

</html>