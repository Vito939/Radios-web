<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Crear cuenta - RadioWeb Chile</title>
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
                <a href="favoritos.html">Mis favoritos</a>
                <a href="faq.html">Preguntas frecuentes</a>
            </nav>

            <div class="sidebar-auth">
                <a href="login.php" class="btn-login">Iniciar sesión</a>
            </div>
        </aside>

        <div class="main-content">
            <header class="hero-header hero-compact">
                <div class="hero-container">
                    <img src="assets/icons/chile-estaciones.jpg" alt="RadiosWeb Chile" class="hero-image">
                    <div class="hero-overlay"></div>
                </div>
            </header>

            <div class="auth-page">
                <div class="auth-card">
                    <div class="auth-header">
                        <h1>Crear cuenta</h1>
                        <p>Regístrate para guardar tus radios favoritas</p>
                    </div>

                    <form class="auth-form" action="server/autenticacion.php" method="POST" id="form-registro">
                        <input type="hidden" name="accion" value="registro">

                        <div class="form-group">
                            <label for="nombre">Nombre de usuario</label>
                            <input type="text" id="nombre" name="nombre" placeholder="¿Cómo te llamamos?" required minlength="3" maxlength="20" autocomplete="username">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" id="correo" name="correo" placeholder="Tu correo electrónico" autocomplete="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input-with-icon">
                                <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" minlength="8" autocomplete="new-password" required>
                                <button type="button" class="toggle-password" aria-label="Mostrar Contraseña">
                                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20" fill="currentColor">
                                        <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password2">Confirmar Contraseña</label>
                            <div class="input-with-icon">
                                <input type="password" id="password2" name="password2" placeholder="Confirma tu contraseña" minlength="8" autocomplete="new-password" required>
                            </div>
                            <span class="field-error hidden" id="error-password">Las contraseñas no coinciden</span>
                        </div>

                        <?php if (!empty($_SESSION['error'])): ?>
                            <div class="field-error" style="text-align:center; margin-bottom: 8px;">
                                <?= htmlspecialchars($_SESSION['error']) ?>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <button type="submit" class="btn-submit">Registrarse</button>
                    </form>

                    <div class="auth-footer">
                        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const toggleBtn = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');

        toggleBtn.addEventListener('click', () => {
            const esVisible = passwordInput.type === 'text';
            passwordInput.type = esVisible ? 'password' : 'text';
            toggleBtn.setAttribute('aria-label', esVisible ? 'Mostrar Contraseña' : 'Ocultar Contraseña');
        });

        const form = document.getElementById('form-registro');
        const password2 = document.getElementById('password2');
        const errorPassword = document.getElementById('error-password');

        form.addEventListener('submit', (e) => {
            if (passwordInput.value !== password2.value) {
                e.preventDefault();
                errorPassword.classList.remove('hidden');
                password2.focus();
            }
        });

        password2.addEventListener('input', () => {
            errorPassword.classList.add('hidden');
        });
    </script>

</body>
</html>