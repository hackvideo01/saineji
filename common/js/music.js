
    var time = {};

  function tick () {
   
      const el = document.body.appendChild(document.createElement("div"));

      el.style.position = "fixed";

      var settime;
      var d = new Date();
      h = time.hours = d.getHours(); 
      m = time.minutes = d.getMinutes();
      s = time.seconds = d.getSeconds();

      if ((1<=h)&(h<9)) {
        settime = 32400000-(h*3600000)-(m*60000)-(s*1000);
      }else if ((17<=h)&(h<=24)) {
        settime = 86400000-(h*3600000)-(m*60000)-(s*1000)+14400000;
      }else if ((9<=h)&(h<19)) {
        settime = 68400000-(h*3600000)-(m*60000)-(s*1000);
      }

      // return settime;

      if ((h<19&m>=0)&(h>=9&m>=0)) {

        path = `<audio preload="auto" autoplay="true" loop>
                  <source src="./common/music/sound.mp3">
                </audio>`;
      }else if((h>=19&m>=0)||(h<9&m>=0)){
        path = `<audio preload="auto" autoplay="true" loop muted="muted">
                  <source src="./common/music/sound1.mp3">
                </audio>`;
      }
      el.className = "Music";
      el.innerHTML = path;

      
      let timeoutId = null;
      

     window.setTimeout(tick, settime);
     } // Note the parens here, we invoke these functions right away

tick();

