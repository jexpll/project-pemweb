const menu = document.querySelector(".menu-toggle"),
  nav = document.querySelector("nav");
if (menu && nav) menu.onclick = () => nav.classList.toggle("mobile-open");
const visual = document.querySelector("[data-tilt]");
if (visual && matchMedia("(pointer:fine)").matches) {
  visual.onmousemove = (e) => {
    const r = visual.getBoundingClientRect(),
      x = e.clientX / r.width - r.left / r.width,
      y = e.clientY / r.height - r.top / r.height;
    visual.style.transform = `perspective(900px) rotateY(${x * 5}deg) rotateX(${y * -5}deg)`;
  };
  visual.onmouseleave = () => (visual.style.transform = "");
}
// splash screen fade-out
document.addEventListener('DOMContentLoaded', () => {
  const splash = document.getElementById('splash');
  if (splash) setTimeout(() => splash.style.opacity = '0', 2000);
});
