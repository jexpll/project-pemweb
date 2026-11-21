<?php require 'config.php'; ?><!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>KARSA — Cara Kerja</title>
<link rel="stylesheet" href="app.css">
<script defer src="script.js"></script>
</head>
<body>
<header class="topbar">
<a class="logo" href="index.php"><i>✳</i> KARSA</a>
<nav>
<a href="index.php">Lowongan</a>
<a href="kategori.php" class="<?=basename($_SERVER['PHP_SELF'])==='kategori.php'?'active':''?>">Kategori</a>
<a href="cara.php" class="<?=basename($_SERVER['PHP_SELF'])==='cara.php'?'active':''?>">Cara kerja</a>
</nav>
<div class="account"><?php if(user()):?><a href="dashboard.php">Halo, <?=e(user()['name'])?></a><a class="dark" href="auth.php?action=logout">Keluar</a><?php else:?><a href="login.php">Masuk</a><a class="dark" href="register.php">Daftar gratis</a><?php endif;?></div><button class="menu-toggle">☰</button>
</header>
<main>
<section class="how" id="cara">
<div>
<p class="eyebrow">CARA KERJA</p>
<h2>Temukan arah.<br><em>Ambil langkah.</em></h2>
<p>Cari posisi, pelajari detailnya, lalu apply dengan profil yang kamu bangun.</p>
<a href="register.php">Buat profil gratis ↗</a>
</div>
<div class="steps">
<div><b>01</b><strong>Cari</strong><span>Gunakan kata kunci dan filter.</span></div>
<div><b>02</b><strong>Pelajari</strong><span>Baca kebutuhan dan deadline.</span></div>
<div><b>03</b><strong>Daftar</strong><span>Kirim lamaran dan pantau progres.</span></div>
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