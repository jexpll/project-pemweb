/* ── Splash screen ── */
document.addEventListener('DOMContentLoaded', () => {
  const splash = document.getElementById('splash');
  if (!splash) return initPage();

  // Jika sedang memfilter di halaman lowongan (kategori.php dengan query param), skip splashscreen
  const isKategoriFilter = window.location.pathname.includes('kategori.php') &&
    (window.location.search.includes('q=') || window.location.search.includes('type=') || window.location.search.includes('kat='));

  if (isKategoriFilter) {
    splash.remove();
    initPage();
    return;
  }

  // Tampilkan animasi splashscreen
  setTimeout(() => {
    splash.classList.add('splash-out');
    setTimeout(() => {
      splash.remove();
      initPage();
    }, 500);
  }, 1000);
});

function initPage() {
  /* ── Topbar: mobile menu ── */
  const menu = document.querySelector('.menu-toggle');
  const nav = document.querySelector('nav');
  const mobilePanel = document.querySelector('.mobile-nav');
  if (menu) {
    menu.onclick = () => {
      const open = nav && nav.classList.toggle('mobile-open');
      if (mobilePanel) mobilePanel.classList.toggle('open');
      menu.setAttribute('aria-expanded', open ? 'true' : 'false');
    };
  }

  /* ── Topbar: shrink on scroll ── */
  const topbar = document.querySelector('.topbar');
  if (topbar) {
    window.addEventListener('scroll', () => {
      topbar.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });
  }

  /* ── Hero 3D tilt ── */
  const visual = document.querySelector('[data-tilt]');
  if (visual && matchMedia('(pointer:fine)').matches) {
    visual.onmousemove = (e) => {
      const r = visual.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - 0.5;
      const y = (e.clientY - r.top) / r.height - 0.5;
      visual.style.transform = `perspective(900px) rotateY(${x * 10}deg) rotateX(${y * -8}deg)`;
    };
    visual.onmouseleave = () => visual.style.transform = '';
  }

  /* ── Stats counter animate ── */
  const stats = document.querySelectorAll('.stat-num');
  if (stats.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        const el = e.target;
        const target = parseInt(el.dataset.target, 10);
        if (isNaN(target)) return;
        let n = 0;
        const step = Math.ceil(target / 60);
        const tick = setInterval(() => {
          n = Math.min(n + step, target);
          el.textContent = n.toLocaleString('id-ID');
          if (n >= target) clearInterval(tick);
        }, 18);
        io.unobserve(el);
      });
    }, { threshold: 0.5 });
    stats.forEach(el => io.observe(el));
  }

  /* ── Scroll reveal ── */
  const reveals = document.querySelectorAll('.reveal');
  if (reveals.length) {
    const ioReveal = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          ioReveal.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });
    reveals.forEach(el => ioReveal.observe(el));
  }

  /* ── Job cards stagger ── */
  document.querySelectorAll('.job-card').forEach((card, i) => {
    card.style.transitionDelay = `${i * 60}ms`;
    card.classList.add('reveal');
    setTimeout(() => card.classList.add('visible'), 100 + i * 60);
  });

  /* ── Category cards hover glow ── */
  document.querySelectorAll('.categories a').forEach(a => {
    a.onmouseenter = () => a.style.boxShadow = '0 8px 28px #15233120';
    a.onmouseleave = () => a.style.boxShadow = '';
  });

  /* ── FAQ accordion smooth ── */
  document.querySelectorAll('.faq-item').forEach(item => {
    item.addEventListener('toggle', () => {
      if (item.open) {
        document.querySelectorAll('.faq-item[open]').forEach(o => {
          if (o !== item) o.removeAttribute('open');
        });
      }
    });
  });

  /* ── Password toggle ── */
  document.querySelectorAll('.auth-toggle-pw').forEach(btn => {
    btn.addEventListener('click', () => {
      const wrap = btn.closest('.auth-input-wrap');
      const input = wrap && wrap.querySelector('input');
      if (!input) return;
      const show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      const eyeOn = btn.querySelector('.icon-eye');
      const eyeOff = btn.querySelector('.icon-eye-off');
      if (eyeOn) eyeOn.style.display = show ? 'none' : '';
      if (eyeOff) eyeOff.style.display = show ? '' : 'none';
    });
  });

  /* ── Cursor dot (desktop only) ── */
  if (matchMedia('(pointer:fine)').matches) {
    const dot = document.createElement('div');
    dot.className = 'cursor-dot';
    document.body.appendChild(dot);
    let mx = 0, my = 0, dx = 0, dy = 0;
    document.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
    const loop = () => {
      dx += (mx - dx) * 0.18;
      dy += (my - dy) * 0.18;
      dot.style.transform = `translate(${dx}px,${dy}px)`;
      requestAnimationFrame(loop);
    };
    loop();
    document.querySelectorAll('a,button,.job-card,.categories a').forEach(el => {
      el.addEventListener('mouseenter', () => dot.classList.add('big'));
      el.addEventListener('mouseleave', () => dot.classList.remove('big'));
    });
  }
}