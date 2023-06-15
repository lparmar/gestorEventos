
const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

const date_of_celebration = document.getElementById('date_of_celebration');

    var date = new Date(date_of_celebration.textContent);
    let hour=(date.getHours()<10)? '0' +date.getHours():date.getHours();
    let min = (date.getMinutes()<10) ? '0' +date.getMinutes():date.getMinutes();
    var newDate = date.getDate()+" de "+months[date.getMonth()]+" de "+date.getFullYear()+", "+hour+":"+min+" h";
    date_of_celebration.textContent = newDate;


const userregister = document.getElementById('userregister');
const activity = document.getElementById('activity');
if (userregister.value === '1') {
    Swal.fire({
    title: 'Ya estás inscrito en esta actividad, por favor, confirma tu asistencia.',
    icon: 'success',
    confirmButtonText: 'Aceptar'
    }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "http://gestoreventos.test/activities-list-teacher/"+activity.value;
            }
        })
}
