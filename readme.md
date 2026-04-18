# RadiosWeb Chile
 
> Plataforma centralizada para escuchar las principales radios chilenas en vivo, con sistema de usuarios y favoritos.
 
![Stack](https://img.shields.io/badge/Frontend-HTML%20%7C%20CSS%20%7C%20JS-blue)
![Stack](https://img.shields.io/badge/Backend-PHP%20%2B%20MySQL-8892BF)
![Estado](https://img.shields.io/badge/Estado-En%20desarrollo-yellow)
 
---
 
## Descripción
 
RadiosWeb Chile resuelve el problema de la fragmentación de emisoras en internet: en lugar de buscar cada radio por separado, esta plataforma las reúne todas en un solo lugar con una interfaz limpia tipo *dashboard*.
 
El proyecto combina un reproductor de audio con soporte HLS en el frontend con un sistema completo de autenticación de usuarios en el backend (registro, login, sesiones, logout), y una base de datos relacional para persistir favoritos e historial.
 
---

## Stack Tecnológico
 
| Capa | Tecnología |
|---|---|
| Frontend | HTML5, CSS3 (Variables, Flexbox/Grid), JavaScript ES6+ |
| Backend | PHP puro (sesiones, validación, PDO) |
| Base de datos | MySQL |
| Streaming | [hls.js](https://github.com/video-dev/hls.js/) (soporte `.m3u8`) |
| Servidor local | Laragon |
 
---
 
## Estado del Proyecto
 
### Completado
 
- **Frontend inicial** — Reproductor AAC/HLS, controles play/pause/volumen, indicador EN VIVO, grilla de emisoras.
- **Fase 1 — Estructura UI** — Dashboard con barra lateral, login/registro maquetados, buscador en vivo, FAQ.
- **Fase 2 — Base de datos** — Tablas `usuarios`, `emisoras`, `favoritos` diseñadas en MySQL.
- **Fase 3 — Autenticación** — Registro con `password_hash`, login con `$_SESSION`, logout con `session_destroy()`.
- **Fase 4 — Interactividad** — Buscador en tiempo real, carga dinámica de emisoras desde MySQL vía `get_radios.php`.
### En desarrollo
 
- **Fase 5 — Favoritos e historial** — Botón de favorito en cada tarjeta, registro de reproducciones.
---
 
## Estructura del Proyecto
 
```
/
├── index.php               # Vista principal (Dashboard + reproductor)
├── login.php               # Inicio de sesión
├── registro.php            # Creación de cuenta
├── favoritos.php           # Vista de favoritos del usuario
├── faq.php                 # Ayuda y preguntas frecuentes
│
├── css/
│   └── style.css           # Estilos globales con variables CSS
│
├── js/
│   ├── app.js              # Renderizado de emisoras, buscador en vivo
│   └── player.js           # Controlador de audio y HLS
│
├── server/
│   ├── conexion.php        # Conexión PDO a MySQL
│   ├── autenticacion.php   # Registro, login (acciones POST)
│   ├── logout.php          # Destrucción de sesión
│   ├── get_radios.php      # API interna → devuelve emisoras en JSON
│   └── favoritos.php       # Lógica de favoritos (en desarrollo)
│
├── database/
│   └── schema.sql          # Script de creación de BD
│
└── assets/
    ├── img/                # Logotipos de radios
    └── icons/              # Favicons y recursos UI
```
 
---
 
## Instalación y Configuración Local
 
### Requisitos
 
- [Laragon](https://laragon.org/) (o cualquier entorno LAMP/WAMP con PHP 8+ y MySQL)
- Navegador moderno (Chrome, Firefox, Edge)
### Pasos
 
1. **Clona el repositorio** en la carpeta raíz de tu servidor:
   ```bash
   git clone https://github.com/Vito939/Radios-web.git
   # Colocar en: C:\laragon\www\radio_web (o un symlink)
   ```
 
2. **Crea la base de datos** en phpMyAdmin o DBeaver:
   ```sql
   CREATE DATABASE radiosweb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
 
   Luego importa `database/schema.sql`.
3. **Configura la conexión** en `server/conexion.php` si tus credenciales MySQL son distintas:
   ```php
   define('DB_USER', 'root');
   define('DB_PASS', '');       // Contraseña de tu MySQL
   define('DB_NAME', 'radiosweb');
   ```
 
4. **Accede** en el navegador:
   ```
   http://localhost/radio_web
   ```
 
---
 
## Seguridad Implementada
 
| Medida | Detalle |
|---|---|
| Contraseñas | `password_hash()` con bcrypt — nunca en texto plano |
| Verificación | `password_verify()` en cada login |
| SQL Injection | Sentencias preparadas con PDO (`prepare` + `execute`) |
| Mensajes de error | Genéricos en login (no revela si el correo existe) |
| Sesiones | `session_destroy()` en logout — sesión eliminada completamente |
| Validación | Doble capa: frontend (JS) y backend (PHP) |
 
---
 
## Modelo de Base de Datos
 
```sql
usuarios
  id            INT PK AUTO_INCREMENT
  nombre        VARCHAR(50)
  correo        VARCHAR(100) UNIQUE
  password_hash VARCHAR(255)
  fecha_registro DATETIME DEFAULT NOW()
 
emisoras
  id            INT PK AUTO_INCREMENT
  nombre        VARCHAR(100)
  logo_url      VARCHAR(255)
  stream_url    VARCHAR(255)
  activa        TINYINT(1) DEFAULT 1
 
favoritos
  id            INT PK AUTO_INCREMENT
  usuario_id    INT FK → usuarios.id
  emisora_id    INT FK → emisoras.id
  fecha         DATETIME DEFAULT NOW()
```
 
---
 
## API Interna
 
### `GET /server/get_radios.php`
 
Devuelve todas las emisoras activas en formato JSON.
 
**Respuesta de ejemplo:**
 
```json
[
  {
    "id": 1,
    "nombre": "Radio Bío-Bío",
    "logo_url": "assets/img/biobio.png",
    "stream_url": "https://..."
  }
]
```
 
Consumido por `js/app.js` al cargar la página de inicio.
 
---
 
## Flujo de Autenticación
 
```
[registro.php] → POST → [server/autenticacion.php?accion=registro]
                             ↓ password_hash + INSERT usuarios
                             ↓ $_SESSION['usuario_id'] + $_SESSION['nombre']
                         → redirect → [index.php]
 
[login.php]    → POST → [server/autenticacion.php?accion=login]
                             ↓ SELECT + password_verify
                             ↓ $_SESSION['usuario_id'] + $_SESSION['nombre']
                         → redirect → [index.php]
 
[index.php]    → clic "Cerrar sesión" → [server/logout.php]
                             ↓ session_destroy()
                         → redirect → [login.php]
```
 
---
 
## Roadmap
 
- [x] Reproductor HLS/AAC con controles
- [x] Dashboard con barra lateral
- [x] Autenticación completa (registro, login, logout)
- [x] Emisoras cargadas desde MySQL
- [x] Buscador en tiempo real
- [ ] Botón de favorito en cada tarjeta
- [ ] Vista "Mis favoritos" personalizada
- [ ] Historial de reproducciones
- [ ] Recuperación de contraseña por correo
- [ ] Emisoras regionales y temáticas
---
 
## Historial de Versiones
 
| Versión | Descripción |
|---|---|
| v0.1 | Frontend inicial: reproductor AAC/HLS, controles, grilla de emisoras |
| v0.2 | Dashboard con barra lateral, login/registro maquetados, validación JS |
| v0.3 | Buscador en vivo, FAQ, BD MySQL, autenticación PHP completa con PDO y sesiones |
 
---
 
## Autor
 
Desarrollado por Victor Lobos [Vito939](https://github.com/Vito939) como proyecto de aprendizaje de desarrollo web full-stack.