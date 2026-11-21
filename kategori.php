<?php require 'config.php'; ?><!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>KARSA — Kategori</title>
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
<section class="kategori">
<div class="section-head">
<div><p class="eyebrow">JELAJAHI SESUAI MINAT</p><h2>Temukan bidang<br><em>yang cocok.</em></h2></div>
<p>Pilih bidang untuk menyaring peluang berdasarkan kemampuan dan arah kariermu.</p>
</div>
<div class="categories">
<a href="#lowongan">Engineering & Tech</a>
<a href="#lowongan">Design & Kreatif</a>
<a href="#lowongan">Marketing & Bisnis</a>
<a href="#lowongan">Finance & Operasional</a>
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