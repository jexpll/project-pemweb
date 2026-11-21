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
    <title><?= e($job['title']) ?> — Karsa</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <header class="topbar"><a class="logo" href="index.php">✳ KARSA</a><a class="nav-cta"
            href="<?= user() ? 'dashboard.php' : 'login.php' ?>"><?= user() ? 'Dashboard' : 'Masuk' ?></a></header>
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