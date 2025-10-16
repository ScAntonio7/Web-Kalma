async function postJSON(url, data){
  const res = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data)
  });
  return res.json();
}

document.getElementById('form-subscribe')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const email = new FormData(e.target).get('email');
  const out = document.getElementById('subs-msg');
  out.textContent = 'Enviando...';
  try {
    const r = await postJSON('/api/subscribe', { email });
    out.textContent = r.msg || (r.ok ? '¡Suscripción registrada!' : 'No se pudo suscribir.');
    if (r.ok) e.target.reset();
  } catch {
    out.textContent = 'Error de red.';
  }
});

document.getElementById('form-contact')?.addEventListener('submit', async (e)=>{
  e.preventDefault();
  const fd = new FormData(e.target);
  const data = Object.fromEntries(fd.entries());
  const out = document.getElementById('contact-msg');
  out.textContent = 'Enviando...';
  try {
    const r = await postJSON('/api/contact', data);
    out.textContent = r.msg || (r.ok ? '¡Mensaje enviado!' : 'No se pudo enviar.');
    if (r.ok) e.target.reset();
  } catch {
    out.textContent = 'Error de red.';
  }
});
