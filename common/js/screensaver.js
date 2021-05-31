// (function() {
//   const currentScript = document.currentScript;
//   window.addEventListener(
//     "load",
  var time = {};
  const el = document.body.appendChild(document.createElement("div"));
   var settime;
  function tick () {
    // function() {
      // const id = `s${Date.now()}`;
     
      // el.id = id;
      el.style.position = "fixed";
      var d = new Date();
      h = time.hours = d.getHours(); 
      m = time.minutes = d.getMinutes();
      s = time.seconds = d.getSeconds();

      if ((1<=h)&(h<9)) {
        settime = 32400000-(h*3600000)-(m*60000)-(s*1000);
      }else if ((19<=h)&(h<=24)) {
        settime = 86400000-(h*3600000)-(m*60000)-(s*1000)+14400000;
      }else if ((9<=h)&(h<19)) {
        settime = 68400000-(h*3600000)-(m*60000)-(s*1000);
      }

      // return settime;

      // if ((h<19&m>=0)&(h>=9&m>=0)) {

        // var result1 = checkFileExist("./common/images/Screensaver/atami1.mp4");
       
        //   if (result1 == true) {
             path = `<div id="display">
                <video autoplay muted loop>
                <source src="./common/images/Screensaver/atami1.mp4" type="video/mp4" >
                </video>
                </div>`;
          // } else {
          //    path = `<div id="display">
          //     <video autoplay muted loop>
          //     <source src="./common/images/Screensaver/atami3.mp4" type="video/mp4" >
          //     </video>
          //     </div>`;  
          // }

       
      // }else if((h>=19&m>=0)||(h<9&m>=0)){
        
      // var result2 = checkFileExist("./common/images/Screensaver/atami2.mp4");
     
      //   if (result2 == true) {
           // path = `<div id="display">
           //            <video autoplay muted loop>
           //            <source src="./common/images/Screensaver/atami2.mp4" type="video/mp4" >
           //            </video>
           //            </div>`;
        // } else {
        //    path = `<div id="display">
        //               <video autoplay muted loop>
        //               <source src="./common/images/Screensaver/atami3.mp4" type="video/mp4" >
        //               </video>
        //               </div>`;  
        // }
      // }
      el.className = "Screensaver";
      el.innerHTML = path;

     // window.setTimeout(tick, settime);
     } // Note the parens here, we invoke these functions right away
    // { once: true }
  // );
// })();
tick();

      let timeoutId = null;
      // let timeout =
      //   (currentScript && Number(currentScript.getAttribute("timeout"))) ||
      //   3000;

      function disable() {
        el.style.display = "none";
        timeoutId && clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
          parent.jQuery.fancybox.close();
          el.style.display = "block";
        }, 60000);
      }
      disable();
      // window.parent.window.addEventListener('touchstart', disable);
      // window.parent.window.addEventListener('touchmove',disable);
      // window.parent.window.addEventListener('touchend', disable);
      // window.parent.window.addEventListener('touchcancel', disable);


      window.addEventListener('touchstart', disable);
      window.addEventListener('touchmove',disable);
      window.addEventListener('touchend', disable);
      window.addEventListener('touchcancel', disable);

      // window.addEventListener('touchstart', tick);

      // document.getElementById("html").addEventListener("touchstart", function() {
      //     alert("ok");
      //        function Screensaver() {
      //           $("body").addClass("Screensaver");
      //         }

      // });

      // document.addEventListener("mousemove", disable);
      window.parent.window.addEventListener("click", disable);
      window.parent.window.addEventListener("keydown", disable);
      // document.addEventListener("scroll", disable);
    // },

// function checkFileExist(urlToFile) {
//           var xhr = new XMLHttpRequest();
//           xhr.open('HEAD', urlToFile, false);
//           xhr.send();
           
//           if (xhr.status == "404") {
//               return false;
//           } else {
//               return true;
//           }
//       }
       
      // Calling function
      // set the path to check
      // var result = checkFileExist("./common/images/Screensaver/atami_degital.mp4");
       
      // if (result == true) {
      //     alert('yay, file exists!');
      // } else {
      //     alert('file does not exist!');
      // }