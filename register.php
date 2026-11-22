<?php require 'config.php';
if (user())
    go('index.php'); ?><!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar | KARSA</title>
    <link rel="stylesheet" href="app.css">
    <script defer src="script.js"></script>
</head>

<body class="auth-page">

    <div id="splash">
        <div class="splash-logo"><i>✳</i> KARSA</div>
        <div class="splash-tagline">Mulai Langkahmu</div>
        <div class="splash-bar">
            <div class="splash-bar-fill"></div>
        </div>
    </div>

    <main class="auth-wrap">
        <!-- Left panel / branding -->
        <div class="auth-brand">
            <a class="logo auth-logo" href="index.php"><i>✳</i> KARSA</a>
            <div class="auth-brand-body">
                <h2>Mulai langkah<br><em>kariermu hari ini.</em></h2>
                <p>Daftar gratis dan akses ratusan lowongan kerja dan magang dari berbagai perusahaan terpercaya.</p>
            </div>
            <div class="auth-brand-dots">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Right panel / form -->
        <div class="auth-form-panel">
            <div class="auth-form-inner">
                <p class="eyebrow">MULAI LANGKAHMU</p>
                <h1>Buat profil<br><em>pertamamu.</em></h1>

                <?php if (!empty($_SESSION['error'])):
                    echo '<div class="auth-alert">' . e($_SESSION['error']) . '</div>';
                    unset($_SESSION['error']);
                endif; ?>

                <form class="auth-form" method="post" action="auth.php?action=register">
                    <div class="auth-field">
                        <label for="name">Nama lengkap</label>
                        <div class="auth-input-wrap">
                            <span class="auth-input-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg></span>
                            <input id="name" type="text" name="name" placeholder="Nama kamu" required
                                autocomplete="name">
                        </div>
                    </div>
                    <div class="auth-field">
                        <label for="email">Email</label>
                        <div class="auth-input-wrap">
                            <span class="auth-input-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg></span>
                            <input id="email" type="email" name="email" placeholder="nama@email.com" required
                                autocomplete="email">
                        </div>
                    </div>
                    <div class="auth-field">
                        <label for="password">Password <small>(min. 8 karakter)</small></label>
                        <div class="auth-input-wrap">
                            <span class="auth-input-icon"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg></span>
                            <input id="password" type="password" name="password" placeholder="••••••••" minlength="8"
                                required autocomplete="new-password">
                            <button type="button" class="auth-toggle-pw" aria-label="Tampilkan password"
                                tabindex="-1"><svg class="icon-eye" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg><svg class="icon-eye-off" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" style="display:none">
                                    <path
                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg></button>
                        </div>
                    </div>
                    <button class="auth-submit" type="submit">Buat akun gratis <span><svg width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M7 17L17 7" />
                                <path d="M7 7h10v10" />
                            </svg></span></button>
                </form>

                <p class="auth-switch">Sudah punya akun? <a href="login.php">Masuk</a></p>
            </div>
        </div>
    </main>

</body>

</html>