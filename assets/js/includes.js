// Carga de parciales estáticos (sin servidor)
document.addEventListener('DOMContentLoaded', () => {
  const nodes = document.querySelectorAll('[data-include]');
  const promises = [];
  nodes.forEach(el => {
    const url = el.getAttribute('data-include');
    const p = fetch(url).then(r => r.text()).then(html => { el.outerHTML = html; });
    promises.push(p);
  });
  Promise.all(promises).then(() => {
    document.dispatchEvent(new Event('partials:ready'));
  });
});
