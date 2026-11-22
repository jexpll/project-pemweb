<?php
require 'config.php';
$stmt = $pdo->query('SELECT * FROM jobs ORDER BY created_at DESC, id DESC LIMIT 6');
$jobs = $stmt->fetchAll();
$total  = (int) $pdo->query('SELECT COUNT(*) FROM jobs')->fetchColumn();
$intern = (int) $pdo->query("SELECT COUNT(*) FROM jobs WHERE type='Magang'")->fetchColumn();
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KARSA | Semua peluang kerja dan magang</title>
    <link rel="stylesheet" href="app.css">
    <script defer src="script.js"></script>
</head>
<body>

<!-- ── SPLASH ── -->
<div id="splash">
    <div class="splash-logo"><i>✳</i> KARSA</div>
    <div class="splash-tagline">Temukan peluangmu.</div>
    <div class="splash-bar"><div class="splash-bar-fill"></div></div>
</div>

<!-- ── TOPBAR ── -->
<header class="topbar">
    <a class="logo" href="index.php"><i>✳</i> KARSA</a>
    <nav>
        <a class="active" href="index.php">Beranda</a>
        <a href="kategori.php">Lowongan</a>
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

<!-- Mobile nav panel -->
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

<main>
    <!-- ── HERO ── -->
    <section class="hero compact">
        <div>
            <p class="eyebrow"><span></span> KARIER YANG LEBIH TERARAH</p>
            <h1>Cari peluang.<br><em>Mulai bergerak.</em></h1>
            <p class="lead">Semua lowongan kerja dan magang yang tersedia, dikumpulkan dalam satu ruang yang mudah dijelajahi.</p>
        </div>
        <div class="scene" data-tilt>
            <div class="grid3d"></div>
            <div class="orb"></div>
            <div class="scene-card">
                <small>CAREER MAP</small>
                <strong><span class="stat-num" data-target="<?= $total ?>"><?= number_format($total) ?></span><br><em>peluang aktif</em></strong>
                <span>Kerja dan magang untukmu</span>
            </div>
        </div>
    </section>

    <!-- ── STATS ── -->
    <section class="stats">
        <div>
            <b class="stat-num" data-target="<?= $total ?>"><?= number_format($total) ?></b>
            <span>total lowongan</span>
        </div>
        <div>
            <b class="stat-num" data-target="<?= $intern ?>"><?= number_format($intern) ?></b>
            <span>program magang</span>
        </div>
        <div>
            <b class="stat-num" data-target="<?= $total - $intern ?>"><?= number_format($total - $intern) ?></b>
            <span>posisi kerja</span>
        </div>
        <div>
            <b>∞</b>
            <span>kesempatan berkembang</span>
        </div>
    </section>

    <!-- ── REKOMENDASI LOWONGAN ── -->
    <section class="jobs" id="lowongan">
        <div class="jobs-heading">
            <div>
                <p class="eyebrow">DATABASE PELUANG</p>
                <h2>Rekomendasi<br><em>untuk langkahmu.</em></h2>
            </div>
            <strong><?= $total ?> total lowongan tersedia</strong>
        </div>
        <div class="all-jobs-intro">Peluang terbaru dari database KARSA</div>
        <div class="all-jobs">
            <?php if (!$jobs): ?>
                <div class="empty">
                    <h3>Data lowongan belum ditemukan</h3>
                    <p>Periksa tabel <code>jobs</code> atau hapus filter pencarian.</p>
                    <a href="index.php">Tampilkan semua</a>
                </div>
            <?php else: foreach ($jobs as $job): ?>
                <article class="job-card reveal">
                    <div class="job-top">
                        <span class="job-mark <?= $job['type'] === 'Magang' ? 'intern' : '' ?>"><?= e(strtoupper(substr($job['company'], 0, 1))) ?></span>
                        <div>
                            <span class="badge <?= $job['type'] === 'Magang' ? 'intern-badge' : '' ?>"><?= e($job['type']) ?></span>
                            <span class="place"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -1px; margin-right: 2px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg><?= e($job['location']) ?></span>
                        </div>
                        <a class="save" href="job.php?id=<?= $job['id'] ?>" aria-label="Detail lowongan">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg>
                        </a>
                    </div>
                    <h3><?= e($job['title']) ?></h3>
                    <p class="company"><?= e($job['company']) ?></p>
                    <p class="summary"><?= e(substr($job['description'], 0, 120)) ?><?= strlen($job['description']) > 120 ? '...' : '' ?></p>
                    <div class="job-foot">
                        <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -1px; margin-right: 2px;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?= e($job['deadline'] ? 'Deadline ' . date('d M Y', strtotime($job['deadline'])) : 'Terbuka') ?></span>
                        <a href="job.php?id=<?= $job['id'] ?>">Lihat detail <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align: -1px; margin-left: 2px;"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg></a>
                    </div>
                </article>
            <?php endforeach; endif; ?>
        </div>
        <?php if ($total > 6): ?>
        <div class="see-all-wrap">
            <a href="kategori.php" class="see-all-btn">Lihat semua <?= $total ?> lowongan <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align: -1px; margin-left: 2px;"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg></a>
        </div>
        <?php endif; ?>
    </section>

    <!-- ── JELAJAHI SESUAI MINAT ── -->
    <section class="section" id="kategori">
        <div class="section-head">
            <div>
                <p class="eyebrow">JELAJAHI SESUAI MINAT</p>
                <h2>Temukan bidang<br><em>yang cocok.</em></h2>
            </div>
            <p>Pilih bidang untuk menyaring peluang berdasarkan kemampuan dan arah kariermu.</p>
        </div>
        <div class="categories">
            <a href="kategori.php" class="reveal">Engineering &amp; Tech</a>
            <a href="kategori.php" class="reveal">Design &amp; Kreatif</a>
            <a href="kategori.php" class="reveal">Marketing &amp; Bisnis</a>
            <a href="kategori.php" class="reveal">Finance &amp; Operasional</a>
        </div>
    </section>

    <!-- ── CARA KERJA ── -->
    <section class="how" id="cara">
        <div>
            <p class="eyebrow">CARA KERJA</p>
            <h2>Temukan arah.<br><em>Ambil langkah.</em></h2>
            <p>Cari posisi, pelajari detailnya, lalu apply dengan profil yang kamu bangun.</p>
            <a href="panduan.php">Lihat panduan lengkap ↗</a>
        </div>
        <div class="steps">
            <div class="reveal"><b>01</b><strong>Cari</strong><span>Gunakan kata kunci dan filter.</span></div>
            <div class="reveal"><b>02</b><strong>Pelajari</strong><span>Baca kebutuhan dan deadline.</span></div>
            <div class="reveal"><b>03</b><strong>Daftar</strong><span>Kirim lamaran dan pantau progres.</span></div>
        </div>
    </section>
</main>

<footer>
    <a class="logo" href="index.php">✳ KARSA</a>
    <span>Kerja yang lebih bermakna.</span>
    <span>© 2026 Karsa</span>
</footer>

</body>
</html>
