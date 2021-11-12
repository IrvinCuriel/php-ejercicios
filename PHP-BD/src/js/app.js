
let pagina = 1;

const cita = {
    nombre: '',
    fecha: '',
    hora: '',
    servicios: []
}
document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

async function mostrarServicios() {
    try {

        const url = 'http://localhost:3000/servicios.php';

        const resultado = await fetch(url);
  
        const db = await resultado.json();
        console.log(db);

        // const { servicios} = db;

        db.forEach( servicio => {

            const { id, nombre, precio } = servicio;

            const nombreServicio = document.createElement('P');
            nombreServicio.classList.add('nombre-servicio');
            nombreServicio.textContent = nombre;

            const precioServicio = document.createElement('P');
            precioServicio.classList.add('precio-servicio');
            precioServicio.innerHTML = `$ ${precio}`;
            
            const servicioDiv = document.createElement('DIV');
            servicioDiv.classList.add('servicio');
            servicioDiv.dataset.idServicio = id;
            servicioDiv.onclick = seleccionarServicio;

            // Inyectar a ServicioDiv
            servicioDiv.appendChild(nombreServicio);
            servicioDiv.appendChild(precioServicio);

            document.querySelector('#servicios').appendChild(servicioDiv)
        });

        
    } catch (error) {
        console.log(error)
    }
}
