## Comportamiento de claude
1. Piense Antes De Codificar

No asumas. No escondas la confusión. Compensaciones de superficie.

Los LLM a menudo eligen una interpretación en silencio y corren con ella. Este principio obliga al razonamiento explícito:

    Suposiciones estatales explícitamente: si no es incierto, pregunte en lugar de adivinar
    Presente múltiples interpretaciones: no elija en silencio cuando exista la ambigüedad
    Retroceda cuando esté justificado: si existe un enfoque más simple, dígalo
    Deténgase cuando esté confundido: nombre lo que no está claro y solicite aclaraciones

2. Simplicidad Primero

Código mínimo que soluciona el problema. Nada especulativo.

Combatir la tendencia hacia la sobreingeniería:

    No hay características más allá de lo que se preguntó
    No hay abstracciones para el código de un solo uso
    No se solicitó "flexibilidad" o "configurabilidad"
    No hay manejo de errores para escenarios imposibles
    Si 200 líneas pudieran ser 50, reescríbela

La prueba: ¿Diría un ingeniero senior que esto es demasiado complicado? En caso afirmativo, simplifica.
3. Cambios quirúrgicos

Toca solo lo que debas. Limpia solo tu propio desastre.

Al editar el código existente:

    No "mejore" el código, los comentarios o el formato adyacentes
    No refactorices las cosas que no están rotas
    Combina el estilo existente, incluso si lo hicieras de manera diferente
    Si nota un código muerto no relacionado, menciónelo, no lo elimine

Cuando los cambios crean huérfanos:

    Eliminar las importaciones/variables/funciones que SUS cambios hicieron sin usar
    No elimine el código de muerte preexistente a menos que se lo solicite

La prueba: Cada línea cambiada debe rastrear directamente a la solicitud del usuario.
4. Ejecución impulsada por objetivos

Definir criterios de éxito. Bucle hasta que se verifique.

Transformar las tareas imperativas en objetivos verificables:
En lugar de... 	Transformar a...
"Añadir validación" "Escribir pruebas para entradas no válidas, luego hacer que se aprueben"
"Arreglar el error" "Escribir una prueba que lo reproduzca, luego hacerlo pasar"
"Refactor X" "Asegurar que las pruebas pasen antes y después"

Para tareas de varios pasos, exponga un plan breve:

1. [Paso] → verificar: [check]
2. [Paso] → verificar: [check]
3. [Paso] → verificar: [check]

Los fuertes criterios de éxito permiten que el LLM se desplace de forma independiente. Los criterios débiles ("hacer que funcione") requieren una aclaración constante.

## Contexto del proyecto para Claude

Proyecto: RadiosWeb Chile — plataforma para escuchar radios chilenas en vivo.
Stack: HTML, CSS, JS vanilla en frontend. PHP + MySQL en backend.
Repositorio: https://github.com/Vito939/Radios-web
Servidor local: Laragon (www/radio_web → symlink a D:\Programacion\Personal\radio_web)
URL local: http://localhost/radio_web

### Estado actual
- Fase 1.1 ✅ — Dashboard con barra lateral
- Fase 1.2 ✅ — login.php y registro.php maquetados
- Fase 1.3 ✅ — Buscador en sidebar y faq.html
- Fase 2   ✅ — BD MySQL: tablas usuarios, emisoras, favoritos
- Fase 3.1 ✅ — conexion.php con PDO
- Fase 3.2 ✅ — Registro con password_hash
- Fase 3.3 ✅ — Login con sesiones
- Fase 3.4 ⚠️ — logout.php escrito, pendiente verificar en Laragon
- Fase 4, 5 — pendientes

### Decisiones tomadas
- Prefijo auth- para clases de autenticación
- Hero compacto en login/registro con clase .hero-compact
- Validación de contraseñas en frontend (JS) y backend (PHP)
- Campo oculto "accion" en formularios para distinguir login vs registro
- Variables CSS en :root para toda la paleta de colores
- index.html → index.php (session_start para mostrar nombre/logout)
- login.html → login.php, registro.html → registro.php
- PDO con ERRMODE_EXCEPTION, FETCH_ASSOC, EMULATE_PREPARES false
- Mismo mensaje de error en login (no revela si correo existe)
- session_destroy() en logout.php

### Próxima sesión — empezar aquí
1. Verificar flujo completo: registro → login → logout en Laragon
2. Si funciona: Fase 4.2 — get_radios.php devuelve emisoras en JSON,
   app.js consume ese endpoint en vez de stations.js
3. Luego: Fase 5 — botón favoritos + favoritos.php