document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('stations-container')


    //se piden las radios al servidor en vez del array esstatico
    fetch('sserver/get_radios.php')
        .then(res=> res.json())
        .then(stations => renderStations(stations))
        .catch(err => {
            console.error('Error al cargar las emisoras:', err);
            container.innerHTML = '<p>Error al cargar las emisoras. Por favor, inténtalo de nuevo más tarde.</p>';
        });
    
    function renderStations(stations) {
        container.innerHTML = '';

        stations.forEach(station => {
            const card = document.createElement('div');
            card.classList.add('station-card');

            card.onclick = () => {
                document.querySelectorAll('.station-card').forEach(c => c.classList.remove('active'));
            card.classList.add('active');
            
            playRadio(station.stream_url, station.nombre, station.logo_url);
            };
        });
    }

    const buscador = document.getElementById('buscador');
    if (!buscador) return;

    buscador.addEventListener('input', () => {
        const texto = buscador.value.toLowerCase().trim();
        const tarjetas = document.querySelectorAll('.station-card');

            tarjetas.forEach(tarjeta => {
                const nombre = tarjeta.querySelector('h3').textContent.toLowerCase();
                const coincide = nombre.includes(texto);
                tarjeta.classList.toggle('hidden', !coincide);
            });
    });
})
