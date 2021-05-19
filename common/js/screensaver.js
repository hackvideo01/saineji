// (function() {
//   const currentScript = document.currentScript;
//   window.addEventListener(
//     "load",
    var time = {};

  function tick () {
    // function() {
      // const id = `s${Date.now()}`;
      const el = document.body.appendChild(document.createElement("div"));
      // el.id = id;
      el.style.position = "fixed";

      var settime;
      var d = new Date();
      h = time.hours = d.getHours(); 
      m = time.minutes = d.getMinutes();
      s = time.seconds = d.getSeconds();

      if ((1<=h)&(h<4)) {
        settime = 14400000-(h*3600000)-(m*60000)-(s*1000);
      }else if ((19<=h)&(h<=24)) {
        settime = 86400000-(h*3600000)-(m*60000)-(s*1000)+14400000;
      }else if ((4<=h)&(h<19)) {
        settime = 68400000-(h*3600000)-(m*60000)-(s*1000);
      }

      // return settime;

      if ((h<19&m>=0)&(h>=4&m>=0)) {

        path = `<div id="display">
                      <video autoplay muted loop>
                      <source src="./common/images/Screensaver/atami_degital.mp4" type="video/mp4" >
                      </video>
                      </div>`;
      }else if((h>=19&m>=0)||(h<4&m>=0)){
        path = `<div id="display">
                      <video autoplay muted loop>
                      <source src="./common/images/Screensaver/atami.mp4" type="video/mp4" >
                      </video>
                      </div>`;
      }
      el.className = "Screensaver";
      el.innerHTML = path;

      
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
        }, 6000);
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

     window.setTimeout(tick, settime);
     } // Note the parens here, we invoke these functions right away
    // { once: true }
  // );
// })();

tick();

