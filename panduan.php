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

    <div id="splash">
        <div class="splash-logo"><i>✳</i> KARSA</div>
        <div class="splash-tagline">Panduan Lengkap</div>
        <div class="splash-bar">
            <div class="splash-bar-fill"></div>
        </div>
    </div>

    <header class="topbar">
        <a class="logo" href="index.php"><i>✳</i> KARSA</a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="kategori.php">Lowongan</a>
            <a class="active" href="panduan.php">Panduan</a>
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
        <!-- Hero -->
        <section class="panduan-hero">
            <div class="panduan-hero-inner">
                <p class="eyebrow">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                    </svg>
                    PANDUAN KARSA
                </p>
                <h1>Mulai dari sini.<br><em>Langkah demi langkah.</em></h1>
                <p class="lead">Temukan cara menggunakan KARSA secara maksimal dari pencarian lowongan hingga mengirim
                    lamaran pertamamu.</p>
            </div>
        </section>

        <!-- Steps -->
        <section class="panduan-steps">
            <div class="panduan-steps-grid">

                <div class="pstep reveal">
                    <div class="pstep-num">01</div>
                    <div class="pstep-body">
                        <div class="pstep-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <h3>Buat Akun Gratis</h3>
                        <p>Daftarkan dirimu dengan nama, email, dan password. Akun KARSA gratis selamanya dan memberimu
                            akses ke semua fitur platform.</p>
                        <a href="register.php" class="pstep-link">
                            Daftar sekarang
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M7 17L17 7" />
                                <path d="M7 7h10v10" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="pstep reveal">
                    <div class="pstep-num">02</div>
                    <div class="pstep-body">
                        <div class="pstep-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                        </div>
                        <h3>Jelajahi Lowongan</h3>
                        <p>Gunakan filter kategori, jenis pekerjaan, dan kata kunci untuk menemukan lowongan yang paling
                            relevan dengan minat dan kemampuanmu.</p>
                        <a href="kategori.php" class="pstep-link">
                            Lihat lowongan
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M7 17L17 7" />
                                <path d="M7 7h10v10" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="pstep reveal">
                    <div class="pstep-num">03</div>
                    <div class="pstep-body">
                        <div class="pstep-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" y1="13" x2="8" y2="13" />
                                <line x1="16" y1="17" x2="8" y2="17" />
                                <polyline points="10 9 9 9 8 9" />
                            </svg>
                        </div>
                        <h3>Pelajari Detail Lowongan</h3>
                        <p>Baca deskripsi pekerjaan, persyaratan, lokasi, dan deadline secara lengkap. Pastikan kamu
                            memenuhi kualifikasi sebelum melamar.</p>
                    </div>
                </div>

                <div class="pstep reveal">
                    <div class="pstep-num">04</div>
                    <div class="pstep-body">
                        <div class="pstep-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <line x1="22" y1="2" x2="11" y2="13" />
                                <polygon points="22 2 15 22 11 13 2 9 22 2" />
                            </svg>
                        </div>
                        <h3>Kirim Lamaran</h3>
                        <p>Klik tombol "Lamar Sekarang" di halaman detail lowongan. Sistem akan menyimpan lamaranmu dan
                            kamu bisa memantau statusnya di dashboard.</p>
                        <a href="login.php" class="pstep-link">
                            Masuk untuk melamar
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M7 17L17 7" />
                                <path d="M7 7h10v10" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="pstep reveal">
                    <div class="pstep-num">05</div>
                    <div class="pstep-body">
                        <div class="pstep-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                <line x1="3" y1="9" x2="21" y2="9" />
                                <line x1="9" y1="21" x2="9" y2="9" />
                            </svg>
                        </div>
                        <h3>Pantau Progres</h3>
                        <p>Di dashboard pribadimu, kamu bisa melihat semua lamaran yang sudah dikirim beserta statusnya.
                            Tetap update dan siapkan diri untuk proses selanjutnya.</p>
                        <a href="dashboard.php" class="pstep-link">
                            Buka dashboard
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5">
                                <path d="M7 17L17 7" />
                                <path d="M7 7h10v10" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <!-- FAQ -->
        <section class="faq-section">
            <div class="faq-inner">
                <p class="eyebrow">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                    PERTANYAAN UMUM
                </p>
                <h2>Ada yang ingin<br><em>kamu tanyakan?</em></h2>

                <div class="faq-list">
                    <details class="faq-item reveal">
                        <summary>Apakah KARSA gratis digunakan?</summary>
                        <p>Ya, seluruh fitur KARSA termasuk pendaftaran akun, pencarian lowongan, dan pengiriman lamaran
                            sepenuhnya gratis.</p>
                    </details>
                    <details class="faq-item reveal">
                        <summary>Siapa yang bisa mendaftar di KARSA?</summary>
                        <p>Siapa saja! KARSA terbuka untuk mahasiswa, fresh graduate, maupun profesional yang sedang
                            mencari kesempatan kerja atau magang.</p>
                    </details>
                    <details class="faq-item reveal">
                        <summary>Bagaimana cara melacak lamaran saya?</summary>
                        <p>Setelah login, buka halaman Dashboard. Di sana kamu bisa melihat semua lamaran beserta status
                            terkininya.</p>
                    </details>
                    <details class="faq-item reveal">
                        <summary>Apakah saya bisa melamar lebih dari satu lowongan?</summary>
                        <p>Tentu! Kamu bisa melamar sebanyak lowongan yang kamu inginkan. Kelola semuanya dari satu
                            dashboard yang mudah dipahami.</p>
                    </details>
                    <details class="faq-item reveal">
                        <summary>Bagaimana jika saya lupa password?</summary>
                        <p>Saat ini fitur reset password sedang dalam pengembangan. Hubungi admin melalui email untuk
                            bantuan lebih lanjut.</p>
                    </details>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="panduan-cta">
            <div class="panduan-cta-inner">
                <h2>Sudah siap memulai?</h2>
                <p>Bergabunglah dengan ribuan pencari kerja yang sudah menggunakan KARSA.</p>
                <div class="cta-btns">
                    <a href="register.php" class="btn-daftar">Daftar gratis</a>
                    <a href="kategori.php" class="btn-masuk">Jelajahi lowongan</a>
                </div>
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