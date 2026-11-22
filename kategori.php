<?php
require 'config.php';

// Mapping kategori ke keyword pencarian
$kategoriMap = [
    'engineering' => ['engineer', 'developer', 'frontend', 'backend', 'fullstack', 'coding', 'programming', 'qa', 'tester', 'data', 'analyst', 'tech', 'teknologi', 'digital', 'software'],
    'design' => ['design', 'ui', 'ux', 'graphic', 'visual', 'brand', 'creative', 'kreatif', 'studio', 'rancang', 'figma', 'adobe'],
    'marketing' => ['marketing', 'content', 'social media', 'copywriter', 'campaign', 'seo', 'sem', 'digital marketing', 'brand strategist', 'media'],
    'finance' => ['finance', 'accounting', 'keuangan', 'akuntansi', 'finance', 'hr', 'people', 'operasional', 'operations', 'research', 'customer', 'product manager', 'assistant'],
];

$katLabel = [
    'engineering' => 'Engineering & Tech',
    'design' => 'Design & Kreatif',
    'marketing' => 'Marketing & Bisnis',
    'finance' => 'Finance & Operasional',
];

$search = trim($_GET['q'] ?? '');
$type = $_GET['type'] ?? '';     // Kerja | Magang | ''
$kat = $_GET['kat'] ?? '';      // engineering | design | marketing | finance | ''

// Build query
$where = [];
$params = [];

if ($search !== '') {
    $where[] = '(title LIKE ? OR company LIKE ? OR description LIKE ? OR location LIKE ?)';
    $like = "%{$search}%";
    $params = array_merge($params, [$like, $like, $like, $like]);
}
if ($type !== '' && in_array($type, ['Kerja', 'Magang'])) {
    $where[] = 'type = ?';
    $params[] = $type;
}
if ($kat !== '' && isset($kategoriMap[$kat])) {
    $kw = $kategoriMap[$kat];
    $sub = implode(' OR ', array_fill(0, count($kw), '(LOWER(title) LIKE ? OR LOWER(description) LIKE ?)'));
    $where[] = "($sub)";
    foreach ($kw as $k) {
        $params[] = "%{$k}%";
        $params[] = "%{$k}%";
    }
}

$sql = 'SELECT * FROM jobs';
if ($where)
    $sql .= ' WHERE ' . implode(' AND ', $where);
$sql .= ' ORDER BY created_at DESC, id DESC';

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$jobs = $stmt->fetchAll();

$total = (int) $pdo->query('SELECT COUNT(*) FROM jobs')->fetchColumn();
?><!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KARSA | Lowongan</title>
    <link rel="stylesheet" href="app.css">
    <script defer src="script.js"></script>
</head>

<body>

    <div id="splash">
        <div class="splash-logo"><i>✳</i> KARSA</div>
        <div class="splash-tagline">Jelajahi Lowongan</div>
        <div class="splash-bar">
            <div class="splash-bar-fill"></div>
        </div>
    </div>

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
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
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

    <main>
        <!-- PAGE HEADER -->
        <section class="lowongan-header">
            <div class="lowongan-header-inner">
                <p class="eyebrow">DATABASE PELUANG</p>
                <h1>Semua lowongan<br><em>untuk langkahmu.</em></h1>
                <p class="lead"><?= $total ?> peluang tersedia, temukan yang paling cocok untukmu.</p>
            </div>
        </section>

        <!-- FILTER BAR -->
        <section class="lowongan-filter-wrap">
            <form class="lowongan-filter" method="get" action="kategori.php">
                <div class="lf-search">
                    <span class="lf-icon"><svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg></span>
                    <input type="text" name="q" placeholder="Cari posisi, perusahaan, atau kota…"
                        value="<?= e($search) ?>">
                    <?php if ($search): ?><a href="?<?= http_build_query(['type' => $type, 'kat' => $kat]) ?>"
                            class="lf-clear" title="Hapus pencarian">✕</a><?php endif; ?>
                </div>
                <div class="lf-selects">
                    <select name="type" onchange="this.form.submit()">
                        <option value="" <?= $type === '' ? 'selected' : '' ?>>Semua jenis</option>
                        <option value="Kerja" <?= $type === 'Kerja' ? 'selected' : '' ?>>Kerja</option>
                        <option value="Magang" <?= $type === 'Magang' ? 'selected' : '' ?>>Magang</option>
                    </select>
                    <button type="submit" class="lf-btn">Cari</button>
                    <?php if ($search || $type || $kat): ?>
                        <a href="kategori.php" class="lf-reset">Reset</a>
                    <?php endif; ?>
                </div>
            </form>

            <!-- Kategori chips -->
            <div class="kat-chips">
                <a href="kategori.php?<?= http_build_query(['q' => $search, 'type' => $type]) ?>"
                    class="kat-chip <?= $kat === '' ? 'active' : '' ?>">Semua</a>
                <?php foreach ($katLabel as $k => $label): ?>
                    <a href="kategori.php?<?= http_build_query(['q' => $search, 'type' => $type, 'kat' => $k]) ?>"
                        class="kat-chip <?= $kat === $k ? 'active' : '' ?>"><?= e($label) ?></a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- RESULTS -->
        <section class="lowongan-list-wrap">
            <div class="lowongan-result-info">
                <?php if ($kat && isset($katLabel[$kat])): ?>
                    <span class="kat-active-badge"><?= e($katLabel[$kat]) ?></span>
                <?php endif; ?>
                <span><?= count($jobs) ?> lowongan
                    ditemukan<?= $search ? ' untuk "<strong>' . e($search) . '</strong>"' : '' ?></span>
            </div>

            <?php if (!$jobs): ?>
                <div class="lowongan-empty">
                    <div class="lowongan-empty-icon">
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#687783" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </div>
                    <h3>Lowongan tidak ditemukan</h3>
                    <p>Coba ubah kata kunci atau pilih kategori yang berbeda.</p>
                    <a href="kategori.php" class="btn-daftar">Lihat semua lowongan</a>
                </div>
            <?php else: ?>
                <div class="all-jobs lowongan-grid">
                    <?php foreach ($jobs as $job): ?>
                        <article class="job-card reveal">
                            <div class="job-top">
                                <span
                                    class="job-mark <?= $job['type'] === 'Magang' ? 'intern' : '' ?>"><?= e(strtoupper(substr($job['company'], 0, 1))) ?></span>
                                <div>
                                    <span
                                        class="badge <?= $job['type'] === 'Magang' ? 'intern-badge' : '' ?>"><?= e($job['type']) ?></span>
                                    <span class="place"><svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2"
                                            style="vertical-align: -1px; margin-right: 2px;">
                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                            <circle cx="12" cy="10" r="3" />
                                        </svg><?= e($job['location']) ?></span>
                                </div>
                                <a class="save" href="job.php?id=<?= $job['id'] ?>" aria-label="Detail lowongan">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path d="M7 17L17 7" />
                                        <path d="M7 7h10v10" />
                                    </svg>
                                </a>
                            </div>
                            <h3><?= e($job['title']) ?></h3>
                            <p class="company"><?= e($job['company']) ?></p>
                            <p class="summary">
                                <?= e(substr($job['description'], 0, 120)) ?>        <?= strlen($job['description']) > 120 ? '...' : '' ?>
                            </p>
                            <div class="job-foot">
                                <span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" style="vertical-align: -1px; margin-right: 2px;">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg><?= e($job['deadline'] ? 'Deadline ' . date('d M Y', strtotime($job['deadline'])) : 'Terbuka') ?></span>
                                <a href="job.php?id=<?= $job['id'] ?>">Lihat detail <svg width="12" height="12"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                        style="vertical-align: -1px; margin-left: 2px;">
                                        <path d="M7 17L17 7" />
                                        <path d="M7 7h10v10" />
                                    </svg></a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <a class="logo" href="index.php">✳ KARSA</a>
        <span>Kerja yang lebih bermakna.</span>
        <span>© 2026 Karsa</span>
    </footer>

</body>

</html>