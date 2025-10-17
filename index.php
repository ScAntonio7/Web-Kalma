<?php include_once("conexion_pg.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Kalma – Bienestar emocional para jóvenes</title>
<link rel="icon" type="image/jpeg" href="img/mascota.jpg">

<style>
:root{
  --cream:#F9D7B4;
  --orange:#0a0705;
  --terracotta:#BC421D;
  --clay:#dd6747;
  --brown:#a07661;
  --ink:#101826;
  --muted:#6b7280;
  --ring: rgba(228,103,39,.35);
  --wrap:1120px;
}
*{box-sizing:border-box}
html,body{margin:0;padding:0}
body{font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;color:#1f2937;background:linear-gradient(180deg,#fff,#fff7f2 40%,#fff)}
.wrap{max-width:var(--wrap);margin:0 auto;padding:0 16px}

/* Header */
.site-header.surface{background:linear-gradient(90deg,var(--brown), var(--clay));color:#fff}
.header-inner,.footer-inner{display:flex;align-items:center;justify-content:space-between;padding:14px 0}
.brand{display:flex;align-items:center;gap:12px;text-decoration:none;color:inherit}
.logo-svg{height:50px;width:auto;display:block}
.brand-text{font-weight:800;letter-spacing:.2px;font-size:1.1rem}

/* Nav */
.top-nav{display:flex;align-items:center;gap:16px;position:static}
.top-nav a{color:#fff;text-decoration:none;opacity:.95}
.top-nav a:hover{opacity:1;text-decoration:underline}
.btn{display:inline-block;border-radius:12px;padding:9px 14px;background:var(--orange);color:#fff;text-decoration:none;font-weight:700;box-shadow:0 6px 14px rgba(228,103,39,.25)}
.btn:hover{transform:translateY(-1px)}
.btn-ghost{background:transparent;border:1px solid rgba(255,255,255,.35)}
.btn-light{background:#fff;color:var(--brown)}
.btn-contrast{background:var(--terracotta)}
.burger{display:none;background:transparent;border:0;color:#fff;font-size:22px}
@media(max-width:900px){
  .burger{display:inline-block}
  .top-nav{position:absolute;right:16px;top:58px;background:var(--brown);padding:10px;border-radius:12px;display:none}
  .top-nav.open{display:block}
  .top-nav a{display:block;margin:8px 0}
}

/* Hero */
.hero{background:
  radial-gradient(1200px 600px at 10% -10%, var(--cream), transparent),
  radial-gradient(900px 500px at 90% -20%, rgba(188,66,29,.22), transparent);
  padding:64px 0 48px}
.hero-inner{display:flex;align-items:center;min-height:220px}
.hero h1{font-size:2.2rem;line-height:1.2;margin:0 0 8px;color:var(--brown)}
.lead{font-size:1.1rem;color:#374151;max-width:760px}
.hero-actions{margin-top:16px;display:flex;gap:12px;flex-wrap:wrap}

/* Layout */
.content{display:grid;grid-template-columns:300px 1fr;gap:24px;padding:28px 0}
@media(max-width:900px){.content{grid-template-columns:1fr}.toc{order:2}}
.card{background:#fff;border:1px solid #f0e7e2;border-radius:16px;padding:18px 18px 6px;box-shadow:0 6px 20px rgba(121,64,35,.06)}
.doc-section{margin-bottom:22px}
.h-section{display:flex;align-items:center;gap:10px;margin:0 0 10px;font-size:1.5rem;color:var(--clay)}
.h-section::after{content:"";flex:1;height:1px;background:linear-gradient(90deg,var(--orange),transparent)}

/* Accordion */
.toc-card{position:sticky;top:90px}
.toc-accordion summary{cursor:pointer;list-style:none;padding:10px;font-weight:700;color:var(--brown)}
.toc-accordion details[open]{background:#fffdfb;box-shadow:inset 0 0 0 1px #f5e7df}
.toc-accordion a{display:block;padding:7px 12px;text-decoration:none;color:#374151;border-radius:8px}
.toc-accordion a:hover{background:#fff6f0}
.toc-accordion a.active{background:#fff3ea;font-weight:700;border:1px solid #ffd8bf}

/* Forms */
.k-form{display:grid;gap:10px;max-width:560px}
.k-input,.k-textarea{width:100%;padding:12px;border:1px solid #e7e1dc;border-radius:10px;outline:none}
.k-input:focus,.k-textarea:focus{border-color:var(--orange);box-shadow:0 0 0 4px var(--ring)}
.k-textarea{min-height:120px;resize:vertical}
.k-actions{display:flex;align-items:center;gap:12px}
.disclaimer{color:#6b7280;font-size:.95rem}
.thanks{font-weight:800;color:var(--brown)}
</style>
</head>
<body>

<header class="site-header surface">
  <div class="wrap header-inner">
    <a class="brand" href="#">
      <img src="img/mascota sin fondo.png" alt="Kalma logo" class="logo-svg">
      <span class="brand-text">Kalma</span>
    </a>

    <nav id="top-nav" class="top-nav">
      <a href="#agradecimientos">Agradecimientos</a>
      <a href="#introduccion">Introducción</a>
      <a href="#objetivos">Objetivos</a>
      <a href="#sobre-kalma">Info App</a>
      <a href="#contacto" class="btn btn-ghost">Contacto</a>
      <a class="btn" href="#">Descargar App</a>
    </nav>
    <button class="burger" aria-label="Abrir menú">☰</button>
  </div>
</header>

<section class="hero">
  <div class="wrap hero-inner">
    <div class="hero-copy">
      <h1>Kalma: Bienestar Emocional para Jóvenes</h1>
      <p class="lead">Una iniciativa que integra psicología, mindfulness y tecnología para acompañar a adolescentes en su autocuidado emocional. Explora el proyecto, conoce la app y descubre cómo cuidarte un día a la vez.</p>
      <div class="hero-actions">
        <a href="#introduccion" class="btn btn-contrast">Conoce el proyecto</a>
        <a href="#sobre-kalma" class="btn btn-light">Acerca de la App</a>
      </div>
    </div>
  </div>
</section>

<main class="wrap content">
  <aside class="toc">
    <div class="toc-card card">
      <strong class="overline">ÍNDICE</strong>
      <nav class="toc-accordion">
        <details open>
          <summary>Proyecto</summary>
          <a href="#agradecimientos">Agradecimientos</a>
          <a href="#introduccion">Introducción</a>
          <a href="#objetivos">Objetivos</a>
          <a href="#justificacion">Justificación</a>
          <a href="#desarrollo">Desarrollo</a>
        </details>
        <details>
          <summary>App & Privacidad</summary>
          <a href="#sobre-kalma">Sobre Kalma</a>
          <a href="#contacto">Contacto</a>
        </details>
      </nav>
    </div>
  </aside>
  <!-- CONTENIDO PRINCIPAL -->
  <article class="doc">

    <!-- Agradecimientos -->
    <section id="agradecimientos" class="doc-section card">
      <h2 class="h-section">Agradecimientos</h2>
      <p>Queremos expresar nuestro más sincero agradecimiento a todas las personas e instituciones que hicieron posible el desarrollo de este proyecto. A nuestros docentes, compañeros y familias por su constante apoyo y motivación.</p>
      <p class="thanks">¡A todos ustedes, muchas gracias!</p>
    </section>

    <!-- Introducción -->
    <section id="introduccion" class="doc-section card">
      <h2 class="h-section">Introducción</h2>
      <p><strong>Kalma</strong> es una aplicación móvil diseñada para acompañar a jóvenes en la gestión de sus emociones mediante ejercicios de relajación, registro de estado de ánimo y prácticas de autocuidado basadas en psicología positiva.</p>
    </section>

    <!-- Objetivos -->
    <section id="objetivos" class="doc-section card">
      <h2 class="h-section">Objetivos</h2>
      <h3 class="pill">Objetivo general</h3>
      <p>Atender las necesidades emocionales de los jóvenes proporcionando herramientas digitales interactivas que contribuyan a disminuir la ansiedad, favorecer el autocuidado y mejorar la regulación emocional.</p>

      <h3 class="pill">Objetivos específicos</h3>
      <ul class="checklist">
        <li>Promover el autocuidado emocional mediante rutinas guiadas.</li>
        <li>Ofrecer recursos digitales para reducir el estrés y la ansiedad.</li>
        <li>Fomentar hábitos saludables y el reconocimiento emocional consciente.</li>
      </ul>
    </section>

    <!-- Justificación -->
    <section id="justificacion" class="doc-section card">
      <h2 class="h-section">Justificación</h2>
      <p>El diseño de <strong>Kalma</strong> se fundamenta en teorías y enfoques de la psicología positiva, la terapia cognitivo-conductual y las prácticas de <em>mindfulness</em>. Estas perspectivas sugieren que el registro de emociones, la autorreflexión y la práctica de técnicas de relajación contribuyen a una mejor autorregulación emocional.</p>
    </section>

    <!-- Desarrollo -->
    <section id="desarrollo" class="doc-section card">
      <h2 class="h-section">Desarrollo</h2>
      <ul class="feature-list">
        <li><strong>Pantalla de bienvenida y registro sencillo:</strong> correo o Google, con opción de modo invitado.</li>
        <li><strong>Registro del estado de ánimo:</strong> mediante íconos/emojis y notas breves.</li>
        <li><strong>Recursos básicos:</strong> ejercicios de respiración, lista de autocuidado y registro de emociones.</li>
        <li><strong>Notificaciones motivacionales:</strong> mensajes breves y positivos.</li>
        <li><strong>Visualización de progreso:</strong> gráfico semanal simple.</li>
      </ul>
    </section>

    <!-- Sobre Kalma -->
    <section id="sobre-kalma" class="doc-section card">
      <h2 class="h-section">Sobre Kalma</h2>
      <p><strong>Kalma</strong> combina tecnología y bienestar. En su primera versión ofrece ejercicios breves, registro de emociones y recomendaciones de autocuidado. No recopila datos sensibles ni utiliza publicidad.</p>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="doc-section card">
      <h2 class="h-section">Contacto</h2>
      <p>Para preguntas sobre privacidad o soporte técnico:</p>
      <ul>
        <li><strong>Email:</strong> soporte@kalma.app</li>
      </ul>
      <hr />
      <h3>Suscríbete a novedades</h3>
      <form class="k-form" method="POST" action="guardar.php">
        <input type="hidden" name="tipo" value="suscripcion">
        <input class="k-input" type="email" name="correo" placeholder="Tu correo" required>
        <div class="k-actions">
          <button class="btn" type="submit">Suscribirme</button>
        </div>
      </form>

      <h3 style="margin-top:18px;">Envíanos un mensaje</h3>
      <form class="k-form" method="POST" action="guardar.php">
        <input type="hidden" name="tipo" value="contacto">
        <input class="k-input" type="text" name="nombre" placeholder="Nombre" required>
        <input class="k-input" type="email" name="correo" placeholder="Correo" required>
        <textarea class="k-textarea" name="mensaje" placeholder="Tu mensaje" required></textarea>
        <div class="k-actions">
          <button class="btn" type="submit">Enviar</button>
        </div>
      </form>

      <p class="disclaimer">Esta página resume aspectos clave. La versión completa de la política será publicada dentro de la app.</p>
    </section>

  </article>
</main>

<footer class="site-footer surface" style="background:linear-gradient(90deg,var(--brown), var(--ink));">
  <div class="wrap footer-inner">
    <span>© Kalma · Bienestar emocional</span>
    <nav class="footer-links">
      <a href="#sobre-kalma">Acerca</a>
      <a href="#contacto">Contacto</a>
    </nav>
  </div>
</footer>

<script>
// menú móvil
const burger=document.querySelector('.burger');
const nav=document.querySelector('.top-nav');
burger.addEventListener('click',()=>{
  const open=nav.classList.toggle('open');
  burger.setAttribute('aria-expanded',open?'true':'false');
});

// acordeón activo
const tocLinks=[...document.querySelectorAll('.toc-accordion a')];
const sections=tocLinks.map(a=>document.querySelector(a.getAttribute('href'))).filter(Boolean);
function onScrollTOC(){
  const y=window.scrollY+140;
  let current=sections[0];
  for(const s of sections) if(s.offsetTop<=y) current=s;
  tocLinks.forEach(a=>a.classList.toggle('active',a.getAttribute('href')==='#'+current.id));
}
document.addEventListener('scroll',onScrollTOC,{passive:true});
</script>
</body>
</html>

