# Radios Web Chile - Plataforma Centralizada

## Descripcion del Proyecto
Plataforma web diseñada para sintonizar las principales estaciones de radio de Chile en tiempo real, resolviendo el problema de la fragmentación de emisoras en internet. El proyecto integra una interfaz visual moderna (Dashboard) orientada a la usabilidad, respaldada por un sistema de gestión de usuarios con base de datos relacional para guardar las preferencias de los oyentes de manera persistente.

## Proposito y Objetivos
El objetivo principal es proveer una plataforma unificada, libre de distracciones visuales, que permita una navegación eficiente y la personalización de la experiencia de audio.
- Objetivo Tecnico: Implementar una arquitectura cliente-servidor robusta, combinando un reproductor de audio avanzado en el frontend con procesamiento de sesiones y validación en el backend.
- Objetivo de UX: Simular la experiencia de una aplicación nativa, ofreciendo la creación de cuentas e inicio de sesión fluido para organizar radios favoritas.

## Stack Tecnologico
- Frontend: HTML5, CSS3 (Variables, Flexbox/Grid), JavaScript (ES6+).
- Backend: PHP puro (Gestión de sesiones, validación de formularios y conexión a BD).
- Base de Datos: MySQL (Modelo relacional para perfiles de usuario, favoritos e historial).
- Librerias Externas: hls.js para soporte de streaming avanzado (.m3u8).

---

## Roadmap y Checklist de Desarrollo

### Fase Inicial: Frontend (Completado)
- [x] Listado visual de emisoras con logotipos.
- [x] Reproducción de streaming en formatos AAC y HLS.
- [x] Controles básicos: Play, Pause, Volumen.
- [x] Indicador visual de "En Vivo".
- [x] Diseño responsivo básico de la grilla.

### Fase 1: Estructura y Navegacion (Frontend UI)
- [x] 1.1 Reestructurar index.html: Implementar arquitectura de barra lateral (Dashboard).
- [ ] 1.2 Vistas de Auth: Maquetar login.html y registro.html (HTML/CSS).
- [ ] 1.3 Interfaz UX: Añadir campo de buscador en UI y crear faq.html.

### Fase 2: Base de Datos (MySQL)
- [ ] 2.1 Diseño MER: Definir modelo entidad-relación.
- [ ] 2.2 Tabla usuarios: ID, correo, password (hash), fecha_registro.
- [ ] 2.3 Tabla emisoras: Migrar catálogo estático a BD.
- [ ] 2.4 Tablas intermedias: Crear favoritos e historial.

### Fase 3: Autenticacion y Sesiones (PHP)
- [ ] 3.1 conexion.php: Conexión segura a MySQL vía PDO o MySQLi.
- [ ] 3.2 Registro: Script PHP para encriptar contraseñas y crear usuarios.
- [ ] 3.3 Login: Validación de credenciales e inicio de $_SESSION.
- [ ] 3.4 Logout: Destrucción de sesión y redirección.

### Fase 4: Interactividad y Buscador (JavaScript)
- [ ] 4.1 Busqueda en vivo: Filtrado dinámico del DOM al escribir.
- [ ] 4.2 Carga dinamica: Consumir lista de radios desde MySQL (vía PHP) reemplazando el JSON estático.

### Fase 5: Favoritos e Historial (Full Stack)
- [ ] 5.1 Boton "Me Gusta": Lógica UI en las tarjetas de radio.
- [ ] 5.2 Fetch API: Enviar likes a PHP de forma asíncrona.
- [ ] 5.3 Vista Favoritos: Renderizar listado personalizado por usuario.
- [ ] 5.4 Historial: Registro silencioso de reproducciones en BD.

---

## Estructura del Proyecto (Proyectada)
/
├── index.html          # Vista principal (Dashboard y reproductor)
├── login.html          # Interfaz de inicio de sesión
├── registro.html       # Interfaz de creación de cuentas
├── faq.html            # Preguntas frecuentes
├── README.md           # Documentación
├── css/
│   └── style.css       # Estilos globales y componentes
├── js/
│   ├── app.js          # Lógica de renderizado e interactividad
│   ├── player.js       # Controlador de audio y HLS
│   └── stations.js     # [A DEPRECAR] Catálogo temporal de emisoras
├── server/             # Backend PHP
│   ├── conexion.php    # Conexión a MySQL
│   ├── auth.php        # Procesamiento de login y registro
│   ├── get_radios.php  # API interna para cargar radios desde BD
│   └── favoritos.php   # Manejo de likes e historial
└── assets/
    ├── img/            # Logotipos de radios
    └── icons/          # Favicons y recursos UI