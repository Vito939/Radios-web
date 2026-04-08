## Contexto del proyecto para Claude

Proyecto: RadiosWeb Chile — plataforma para escuchar radios chilenas en vivo.
Stack: HTML, CSS, JS vanilla en frontend. PHP + MySQL en backend (pendiente).
Repositorio: https://github.com/Vito939/Radios-web

### Estado actual
- Fase 1.1 ✅ — Dashboard con barra lateral implementado
- Fase 1.2 ✅ — login.html y registro.html maquetados
- Fase 1.3 ⏳ — Buscador y faq.html pendiente
- Fases 2, 3, 4, 5 — pendientes (BD, PHP, favoritos)

### Decisiones tomadas
- Prefijo auth- para clases de autenticación
- Hero compacto en login/registro con clase .hero-compact
- Validación de contraseñas en frontend (JS) y pendiente en backend (PHP)
- Campo oculto "accion" en formularios para distinguir login vs registro en PHP
- Variables CSS en :root para toda la paleta de colores

### Próximo paso
Fase 1.3: buscador en vivo + faq.html
Fase 3: escribir autenticacion.php con PHP y password_hash()