<?php require 'config.php'; ?><!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KARSA | Panduan</title>
    <link rel="stylesheet" href="app.css">
    <script defer src="script.js"></script>
</head>
<body>

<div id="splash"><div class="splash-logo"><i>✳</i> KARSA</div><div class="splash-bar"><div class="splash-bar-fill"></div></div></div>

<header class="topbar">
    <a class="logo" href="index.php"><i>✳</i> KARSA</a>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="kategori.php">Lowongan</a>
        <a class="active" href="cara.php">Panduan</a>
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
    <a href="cara.php">Panduan</a>
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
    <section class="how how-page">
        <div>
            <p class="eyebrow">CARA KERJA</p>
            <h2>Temukan arah.<br><em>Ambil langkah.</em></h2>
            <p>KARSA membantumu menemukan peluang kerja dan magang, memahami kebutuhan perusahaan, hingga mengirim lamaran.</p>
            <a href="kategori.php">Mulai jelajahi lowongan <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="vertical-align: -1px; margin-left: 2px;"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg></a>
        </div>
        <div class="steps">
            <div class="reveal"><b>01</b><strong>Cari peluang</strong><span>Jelajahi lowongan berdasarkan posisi, jenis, atau kategori.</span></div>
            <div class="reveal"><b>02</b><strong>Pelajari detail</strong><span>Baca deskripsi pekerjaan, lokasi, persyaratan, dan deadline.</span></div>
            <div class="reveal"><b>03</b><strong>Kirim lamaran</strong><span>Masuk atau buat akun, lalu kirim lamaran dan pantau progresnya.</span></div>
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
