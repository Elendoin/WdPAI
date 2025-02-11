var now = new Date();
var datetime = now.toLocaleString();
var day = String(now.getDate()).padStart(2, '0');
var month = String(now.getMonth() + 1).padStart(2, '0');
var year = now.getFullYear();

var formattedDate = day + '.' + month + '.' + year;

document.getElementById("datetime").innerHTML = formattedDate;