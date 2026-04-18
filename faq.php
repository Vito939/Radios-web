<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ayuda y Guía de Uso - RadioWeb Chile</title>
    <link rel="icon" type="image/x-icon" href="assets/icons/radios.ico">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <h2>RadiosWeb</h2>
            </div>

            <nav class="sidebar-nav">
                <a href="index.php">Inicio</a>
                <a href="favoritos.php">Mis favoritos</a>
                <a href="faq.php" class="active">Ayuda</a>
            </nav>

            <div class="sidebar-auth">
                <?php if (!empty($_SESSION['usuario_id'])): ?>
                    <span style="color: var(--text-muted); font-size: 0.9rem;">
                        Hola, <?= htmlspecialchars($_SESSION['nombre']) ?>
                    </span>
                    <a href="server/logout.php" class="btn-login" style="margin-top: 10px;">Cerrar sesión</a>
                <?php else: ?>
                    <a href="registro.php" class="btn-login">Crear cuenta</a>
                    <a href="login.php" class="btn-login" style="margin-top: 8px;">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </aside>

        <div class="main-content">
            <header class="hero-header hero-compact">
                <div class="hero-container">
                    <img src="assets/icons/chile-estaciones.jpg" alt="RadiosWeb Chile" class="hero-image">
                    <div class="hero-overlay"></div>
                </div>
            </header>

            <div class="faq-page">
                <h1 class="faq-page-title">Ayuda y guía de uso</h1>
                <p class="faq-page-subtitle">Todo lo que necesitas saber para sacarle el máximo partido a RadioWeb Chile.</p>

                <!-- SECCIÓN 1: PRIMEROS PASOS -->
                <section class="faq-section">
                    <h2 class="faq-section-title">Primeros pasos</h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo escucho una radio?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Es muy sencillo. En la página de inicio verás las tarjetas de cada emisora disponible. Solo haz clic en cualquiera de ellas y la reproducción comenzará automáticamente en el reproductor que aparece en la parte inferior de la pantalla.</p>
                            <div class="tip-box"><strong>Tip:</strong> El indicador <em>EN VIVO</em> se ilumina en rojo cuando hay audio reproduciéndose. Si se apaga, la emisión está en pausa.</div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo controlo el volumen y pauso la radio?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>En el reproductor de la barra inferior encontrarás:</p>
                            <ul>
                                <li><strong>Botón Pausa / Play</strong> — detiene o reanuda la emisión.</li>
                                <li><strong>Control deslizante de volumen</strong> — muévelo hacia la izquierda para bajar y hacia la derecha para subir.</li>
                            </ul>
                            <p>Al pausar, el indicador EN VIVO desaparece. Al reanudar, vuelve a aparecer.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Necesito una cuenta para escuchar?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>No. Cualquier persona puede escuchar todas las radios disponibles sin registrarse. La cuenta solo es necesaria si quieres guardar tus emisoras favoritas y acceder a funciones personalizadas.</p>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 2: CUENTA Y SESIÓN -->
                <section class="faq-section">
                    <h2 class="faq-section-title">Cuenta y sesión</h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo creo una cuenta?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <ol>
                                <li>Haz clic en <a href="registro.php">Crear cuenta</a> en el menú lateral izquierdo.</li>
                                <li>Ingresa un nombre de usuario (entre 3 y 20 caracteres).</li>
                                <li>Escribe tu correo electrónico.</li>
                                <li>Elige una contraseña de al menos 8 caracteres y confírmala.</li>
                                <li>Presiona <strong>Registrarse</strong>. Si todo está correcto, iniciarás sesión automáticamente.</li>
                            </ol>
                            <div class="tip-box"><strong>Seguridad:</strong> Tu contraseña nunca se guarda en texto plano. Se encripta con <em>bcrypt</em> antes de almacenarse.</div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo inicio sesión?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <ol>
                                <li>Haz clic en <a href="login.php">Iniciar Sesión</a> en el menú lateral.</li>
                                <li>Ingresa el correo y la contraseña con los que te registraste.</li>
                                <li>Presiona <strong>Iniciar Sesión</strong>. Serás redirigido al inicio.</li>
                            </ol>
                            <p>Una vez dentro, el menú lateral mostrará tu nombre y la opción de <strong>Cerrar sesión</strong>.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            Olvidé mi contraseña. ¿Qué hago?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Por el momento no existe un sistema automático de recuperación de contraseña. Esta funcionalidad está planeada para una versión futura. <span class="badge-soon">Próximamente</span></p>
                            <p>Si olvidaste tu contraseña, la alternativa temporal es crear una cuenta nueva con otro correo.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo cierro sesión?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Cuando estés con sesión iniciada, en la barra lateral aparecerá el botón <strong>Cerrar sesión</strong>. Al hacer clic, tu sesión se elimina de forma segura y serás redirigido a la pantalla de inicio de sesión.</p>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 3: BUSCADOR Y NAVEGACIÓN -->
                <section class="faq-section">
                    <h2 class="faq-section-title">Buscador y navegación</h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo busco una emisora?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>En la barra lateral izquierda hay un campo de búsqueda que dice <em>"Buscar radio…"</em>. A medida que escribes el nombre de la emisora, la grilla de la página de inicio se filtra automáticamente en tiempo real mostrando solo las que coincidan.</p>
                            <div class="tip-box"><strong>Tip:</strong> No necesitas escribir el nombre completo. Con las primeras letras ya funciona el filtro.</div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Qué páginas tiene la plataforma?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <ul>
                                <li><strong>Inicio</strong> — Grilla de todas las radios disponibles y reproductor.</li>
                                <li><strong>Mis favoritos</strong> — Lista personalizada de tus emisoras guardadas (requiere cuenta). <span class="badge-soon">En desarrollo</span></li>
                                <li><strong>Ayuda</strong> — Esta página.</li>
                                <li><strong>Crear cuenta / Iniciar sesión</strong> — Acceso desde el menú lateral.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 4: RADIOS DISPONIBLES -->
                <section class="faq-section">
                    <h2 class="faq-section-title">Radios disponibles</h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Qué emisoras están disponibles actualmente?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>El catálogo inicial incluye las principales estaciones chilenas de cobertura nacional. Puedes verlas directamente en la <a href="index.php">página de inicio</a>. El listado exacto puede variar a medida que se añadan o actualicen emisoras.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Se agregarán más radios en el futuro?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Sí. El catálogo se irá ampliando con emisoras regionales y temáticas (música, noticias, deportes). Todas las radios se cargan desde la base de datos del servidor, por lo que añadir nuevas emisoras no requiere modificar el código del sitio.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Por qué una radio no suena o se corta?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>El streaming de audio depende del servidor externo de cada emisora. Las posibles causas son:</p>
                            <ul>
                                <li>La emisora tuvo un corte técnico temporario en su servidor de streaming.</li>
                                <li>Tu conexión a internet es inestable.</li>
                                <li>El formato del stream (HLS) no es compatible con tu navegador. Se recomienda usar Chrome, Firefox o Edge actualizados.</li>
                            </ul>
                            <div class="tip-box"><strong>Solución rápida:</strong> Haz clic en otra emisora y luego vuelve a la que falló. Esto reinicia la conexión.</div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Puedo escuchar desde el celular?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Sí. El diseño es responsivo: en pantallas pequeñas la barra lateral se mueve al tope de la página y la grilla de emisoras se adapta al ancho disponible. El reproductor sigue accesible en la parte inferior.</p>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 5: FAVORITOS E HISTORIAL -->
                <section class="faq-section">
                    <h2 class="faq-section-title">Favoritos e historial</h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Cómo guardo una radio como favorita?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Esta función está actualmente en desarrollo. <span class="badge-soon">Próximamente</span></p>
                            <p>Cuando esté disponible, cada tarjeta de radio tendrá un botón de corazón o estrella. Al hacer clic (con sesión iniciada), la emisora se guardará en tu lista personal de <strong>Mis favoritos</strong>.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Habrá historial de lo que escuché?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Sí, está planificado. <span class="badge-soon">Próximamente</span> Cada vez que reproduzcas una emisora con sesión activa, quedará registrada en tu historial de escucha, al que podrás acceder desde tu perfil.</p>
                        </div>
                    </div>
                </section>

                <!-- SECCIÓN 6: PRIVACIDAD Y SEGURIDAD -->
                <section class="faq-section">
                    <h2 class="faq-section-title">Privacidad y seguridad</h2>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Están seguros mis datos?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Sí. La plataforma implementa varias medidas de seguridad:</p>
                            <ul>
                                <li>Las contraseñas se cifran con <strong>bcrypt</strong> (password_hash de PHP). Nunca se almacenan en texto plano.</li>
                                <li>Todas las consultas a la base de datos usan <strong>sentencias preparadas con PDO</strong> para prevenir inyección SQL.</li>
                                <li>Los mensajes de error en el login son genéricos para no revelar si un correo existe o no.</li>
                                <li>Al cerrar sesión, la sesión PHP se destruye completamente.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            ¿Qué datos se guardan de mi cuenta?
                            <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        </button>
                        <div class="faq-answer">
                            <p>Solo se guardan los datos mínimos necesarios: tu nombre de usuario, correo electrónico, la contraseña encriptada y la fecha de registro. No se recopila ningún otro dato personal.</p>
                        </div>
                    </div>
                </section>

            </div><!-- /faq-page -->
        </div><!-- /main-content -->
    </div><!-- /app-container -->

    <script>
        document.querySelectorAll('.faq-question').forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const isOpen = item.classList.contains('open');

                // Cerrar todos
                document.querySelectorAll('.faq-item.open').forEach(el => {
                    el.classList.remove('open');
                    el.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
                });

                // Si no estaba abierto, abrirlo
                if (!isOpen) {
                    item.classList.add('open');
                    btn.setAttribute('aria-expanded', 'true');
                }
            });
        });
    </script>
</body>
</html>