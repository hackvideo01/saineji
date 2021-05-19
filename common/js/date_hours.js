  
  // //Get Hours and Date
  // var d = new Date();
  // var hour = document.getElementById("hours");
  // var date = document.getElementById("date");
  // var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  // var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  // //date and hours setting
  // hour.innerHTML = (d.getHours() < 10 ? '0' : '') + d.getHours() + ":" + (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
  // date.innerHTML = months[d.getMonth()] + "  " +d.getDate()+ "  " + days[d.getDay()];

  var time = {};

(function () {
  var hours = document.getElementById('hours');
  var date = document.getElementById("date");
  
  (function tick () {
    var minutes, d = new Date();
    var days = ["(日)", "(月)", "(火)", "(水)", "(木)", "(金)", "(土)"];
    var months = ["１月", "２月", "３月", "４月", "５月", "６月", "７月", "８月", "９月", "１０月", "１１月", "１２月"];

    time.weekday = d.getDay();
    time.day = d.getDate();
    time.month = d.getMonth(); //JS says jan = 0
    time.year = d.getFullYear();
    time.minutes = d.getMinutes();
    time.hours = d.getHours(); //eastern time zone
    time.seconds = d.getSeconds();
    time.ms = d.getMilliseconds();
    
    minutes = (time.minutes < 10 ? '0' + time.minutes : time.minutes);
    
    hours.innerHTML = time.hours + '：' + minutes　+ "";
    date.innerHTML =time.year + "年"　+ months[time.month] + "" + time.day + "日";

    window.setTimeout(tick, 1000);
  }()); // Note the parens here, we invoke these functions right away
}()); // This one keeps clock away from the global scope

console.log(time.ms); // We have access to all those properties via a single variable.