
const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

const date_of_celebration = document.getElementById('date_of_celebration');

    var date = new Date(date_of_celebration.textContent);
    let hour=(date.getHours()<10)? '0' +date.getHours():date.getHours();
    let min = (date.getMinutes()<10) ? '0' +date.getMinutes():date.getMinutes();
    var newDate = date.getDate()+" de "+months[date.getMonth()]+" de "+date.getFullYear()+", "+hour+":"+min+" h";
    date_of_celebration.textContent = newDate;
