  
  //Get Hours and Date
  var d = new Date();
  var hour = document.getElementById("hours");
  var date = document.getElementById("date");
  var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  //date and hours setting
  hour.innerHTML = (d.getHours() < 10 ? '0' : '') + d.getHours() + ":" + (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
  date.innerHTML = months[d.getMonth()] + "  " +d.getDate()+ "  " + days[d.getDay()];