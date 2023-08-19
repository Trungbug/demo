var date = new Date();
var year = date.getFullYear();
var month = date.getMonth() + 1;
var todayDate = String(date.getDate()).padStart(2, '0');
var datePattern = todayDate + '/' + month + '/' + year;
document.getElementById("check-in").value  = datePattern;