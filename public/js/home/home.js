const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
const days = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];

const date_of_celebration = document.querySelectorAll('#date_of_celebration');
date_of_celebration.forEach(element => {

    var date = new Date(element.textContent);
    let hour=(date.getHours()<10)? '0' +date.getHours():date.getHours();
    let min = (date.getMinutes()<10) ? '0' +date.getMinutes():date.getMinutes();
    var newDate = days[date.getDay()]+", "+date.getDate()+" de "+months[date.getMonth()]+" de "+date.getFullYear()+", "+hour+":"+min+" h";
    element.textContent = newDate;


});

