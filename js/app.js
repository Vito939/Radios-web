document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('stations-container')

    if (typeof stations === 'undefined') {
        console.error('No se encontró la lista de estaciones')
        return;
    }

    container.innerHTML = '';

    stations.forEach(station => {
        const card = document.createElement('div');
        card.classList.add('station-card');

        card.onclick = () => {
            document.querySelectorAll('.station-card').forEach(c => {
                c.classList.remove('active');
            });
            card.classList.add('active');
            playRadio(station.stream, station.name, station.logo);
        };

        card.innerHTML = `
            <img src="${station.logo}" alt="${station.name}" class="station-logo">
            <div class="station-info">
                <h3>${station.name}</h3>
            </div>
        `;

        container.appendChild(card);
    });

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

