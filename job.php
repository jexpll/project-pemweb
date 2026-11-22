<?php require 'config.php';
$s = $pdo->prepare('SELECT * FROM jobs WHERE id=?');
$s->execute([(int) ($_GET['id'] ?? 0)]);
$job = $s->fetch();
if (!$job) {
    http_response_code(404);
    $requestedId = (int)($_GET['id'] ?? 0);
    die('<!doctype html><meta charset="utf-8"><link rel="stylesheet" href="app.css"><main class="empty"><h1>Lowongan tidak ditemukan</h1><p>ID lowongan: '.e($requestedId).'. Pastikan data ada di tabel <code>jobs</code>.</p><a class="button" href="index.php">Kembali ke semua lowongan</a></main>');
}
$applied = false;
if (user()) {
    $x = $pdo->prepare('SELECT id FROM applications WHERE user_id=? AND job_id=?');
    $x->execute([user()['id'], $job['id']]);
    $applied = (bool) $x->fetch();
} ?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= e($job['title']) ?> | Karsa</title>
    <link rel="stylesheet" href="app.css">
    <script defer src="script.js"></script>
</head>

<body>
    <header class="topbar">
        <a class="logo" href="index.php"><i>✳</i> KARSA</a>
        <nav>
            <a href="index.php">Beranda</a>
            <a class="active" href="kategori.php">Lowongan</a>
            <a href="panduan.php">Panduan</a>
        </nav>
        <div class="account">
            <?php if (user()): ?>
                <a href="dashboard.php" class="btn-user">Halo, <?= e(user()['name']) ?></a>
                <a class="btn-logout" href="auth.php?action=logout">Keluar</a>
            <?php else: ?>
                <a class="btn-masuk" href="login.php">Masuk</a>
                <a class="btn-daftar" href="register.php">Daftar gratis</a>
            <?php endif; ?>
        </div>
        <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
    </header>

    <div class="mobile-nav">
        <a href="index.php">Beranda</a>
        <a href="kategori.php">Lowongan</a>
        <a href="panduan.php">Panduan</a>
        <div class="mobile-nav-sep"></div>
        <?php if (user()): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="auth.php?action=logout">Keluar</a>
        <?php else: ?>
            <a href="login.php">Masuk</a>
            <a href="register.php" class="btn-daftar">Daftar gratis</a>
        <?php endif; ?>
    </div>
    <main class="detail">
        <p class="eyebrow"><?= e($job['type']) ?> · <?= e($job['location']) ?></p>
        <h1><?= e($job['title']) ?></h1>
        <h2><?= e($job['company']) ?></h2>
        <div class="detail-grid">
            <article>
                <h3>Tentang peran ini</h3>
                <p><?= nl2br(e($job['description'])) ?></p>
                <h3>Yang kami cari</h3>
                <p><?= nl2br(e($job['requirements'])) ?></p>
            </article>
            <aside>
                <p class="muted">BATAS PENDAFTARAN</p>
                <strong><?= e($job['deadline'] ?: 'Terbuka') ?></strong><?php if ($applied): ?>
                    <div class="alert">Lamaran sudah terkirim.</div><?php elseif (user()): ?>
                    <form method="post" action="apply.php"><input type="hidden" name="job_id"
                            value="<?= $job['id'] ?>"><label>Pesan singkat<textarea name="cover_letter" required
                                placeholder="Ceritakan alasan kamu cocok..."></textarea></label><button class="button">Kirim
                            lamaran ↗</button></form><?php else: ?><a class="button block" href="login.php">Masuk untuk
                        melamar ↗</a><?php endif; ?>
            </aside>
        </div>
    </main>
</body>

</html>