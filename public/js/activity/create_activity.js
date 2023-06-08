const dateCelebration = document.getElementById('dateCelebration');
const dateToday = new Date();

let min = (dateToday.getMinutes()<10) ? '0'+dateToday.getMinutes():dateToday.getMinutes();
let afterMonth = dateToday.getMonth()+1;
let month = (afterMonth<10) ? '0'+afterMonth:afterMonth;
let date = (dateToday.getDate()<10) ? '0'+dateToday.getDate():dateToday.getDate();
let hour = (dateToday.getHours()<10) ? '0'+dateToday.getHours():dateToday.getHours();

let dateMin = dateToday.getFullYear()+"-"+month+"-"+date+"T"+hour+":"+min;

console.log(dateMin);
dateCelebration.setAttribute('min',dateMin);
