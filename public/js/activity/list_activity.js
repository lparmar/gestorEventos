const activities = document.getElementById('activities');

const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
const days = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];

if(activities.value.length === 2)
{
    Swal.fire({
    title: 'Aún no se han creado actividades.',
    icon: 'error',
    confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
                window.location.href = "http://gestoreventos.test/dashboard";
        }
    })
}

const date_of_celebration = document.querySelectorAll('#date_of_celebration');
date_of_celebration.forEach(element => {
    var date = new Date(element.value);
    var newDate = days[date.getDay()]+", "+date.getDate()+" de "+months[date.getMonth()]+" de "+date.getFullYear();
    element.nextSibling.nextElementSibling.innerText = newDate
});

