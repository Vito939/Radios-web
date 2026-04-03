// Variables globales para controlar el audio desde cualquier parte
let currentHls = null;
const player = document.getElementById('radio-player');
const btnPlay = document.getElementById('btn-play');
const btnPause = document.getElementById('btn-pause');
const volumeSlider = document.getElementById('volume-slider');
const liveIndicator = document.getElementById('live-indicator');
const stationNameDisplay = document.getElementById('station-name');

// === 1. Función Principal: Reproducir una Radio ===
function playRadio(streamUrl, stationName) {
    // Actualizamos nombre y mostramos indicador EN VIVO
    stationNameDisplay.textContent = stationName;
    liveIndicator.classList.remove('hidden');
    
    // Habilitamos botones
    btnPlay.disabled = false;
    btnPause.disabled = false;

    // Detener HLS anterior si existe
    if (currentHls) {
        currentHls.destroy();
    }

    // Lógica de reproducción (HLS vs Estándar)
    if (streamUrl.includes('.m3u8')) {
        if (Hls.isSupported()) {
            currentHls = new Hls();
            currentHls.loadSource(streamUrl);
            currentHls.attachMedia(player);
            currentHls.on(Hls.Events.MANIFEST_PARSED, () => {
                player.play().catch(e => console.log("Esperando interacción del usuario"));
            });
        } else if (player.canPlayType('application/vnd.apple.mpegurl')) {
            player.src = streamUrl;
            player.play();
        }
    } else {
        player.src = streamUrl;
        player.play();
    }

    // Actualizar botones a estado "Reproduciendo"
    showPauseButton();
}

// === 2. Control de Botones (Play/Pause) ===
btnPause.addEventListener('click', () => {
    player.pause();
    showPlayButton();
    liveIndicator.classList.add('hidden'); // Ocultar "En Vivo" si pausa
});

btnPlay.addEventListener('click', () => {
    player.play();
    showPauseButton();
    liveIndicator.classList.remove('hidden');
});

// === 3. Control de Volumen ===
volumeSlider.addEventListener('input', (e) => {
    player.volume = e.target.value;
});

// === 4. Funciones Auxiliares de UI ===
function showPlayButton() {
    btnPlay.classList.remove('hidden');
    btnPause.classList.add('hidden');
}

function showPauseButton() {
    btnPlay.classList.add('hidden');
    btnPause.classList.remove('hidden');
}