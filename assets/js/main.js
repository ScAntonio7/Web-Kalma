// Toggle menú en móvil
document.addEventListener('click', (e) => {
  const burger = e.target.closest('.burger');
  if (!burger) return;
  const nav = document.querySelector('.top-nav');
  if (!nav) return;
  const open = nav.classList.toggle('open');
  burger.setAttribute('aria-expanded', open ? 'true' : 'false');
});

// Anclar activo en TOC
function setupTOCHighlight() {
  const tocLinks = document.querySelectorAll('.toc a');
  if (!tocLinks.length) return;
  const sections = [...tocLinks]
    .filter(a => a.getAttribute('href').startsWith('#'))
    .map(a => document.querySelector(a.getAttribute('href')))
    .filter(Boolean);

  const onScroll = () => {
    const y = window.scrollY + 140;
    let current = sections[0];
    for (const s of sections) if (s.offsetTop <= y) current = s;
    tocLinks.forEach(a => a.classList.toggle('active', a.getAttribute('href') === '#' + current.id));
  };
  document.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}

// Smooth scroll
document.addEventListener('click', (e) => {
  const a = e.target.closest('a[href^="#"]');
  if (!a) return;
  const id = a.getAttribute('href');
  const el = document.querySelector(id);
  if (!el) return;
  e.preventDefault();
  window.scrollTo({ top: el.offsetTop - 100, behavior: 'smooth' });
});

// Init after partials ready
document.addEventListener('partials:ready', () => {
  setupTOCHighlight();
});
