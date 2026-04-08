document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('stations-container')

    //Se verifica que la lista de estaciones exista
    if (typeof stations === 'undefined') {
        console.error('No se encontró la lista de estaciones')
        return;
    }

    //Limpiamos el mensaje "cargando..."
    container.innerHTML = '';

    //Recorremos cada radio y creamos su tarjeta
    stations.forEach(station => {
        const card = document.createElement('div');
        card.classList.add('station-card');

        //Al hacer clic, llamamos a la funcion del reproductor
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

        //Agregamos la tarjeta al contenedor
        container.appendChild(card);
    })
})