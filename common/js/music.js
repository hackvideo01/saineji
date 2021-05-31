// (function() {
//   const currentScript = document.currentScript;
//   window.addEventListener(
//     "load",
  var time = {};
  const music = document.body.appendChild(document.createElement("div"));
   var settime;
  function timeMusic() {
    // function() {
      // const id = `s${Date.now()}`;
     
      // el.id = id;
      music.style.position = "fixed";
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

      if ((h<19&m>=0)&(h>=9&m>=0)) {

        // var result1 = checkFileExist("./common/images/Screensaver/atami1.mp4");
       
        //   if (result1 == true) {
             path = `<audio preload="auto" loop autoplay="true">
                  <source src="./common/music/sound1.mp3">
                </audio>`;
          // } else {
          //    path = `<div id="display">
          //     <video autoplay muted loop>
          //     <source src="./common/images/Screensaver/atami3.mp4" type="video/mp4" >
          //     </video>
          //     </div>`;  
          // }

       
      }else if((h>=19&m>=0)||(h<9&m>=0)){
        
      // var result2 = checkFileExist("./common/images/Screensaver/atami2.mp4");
     
      //   if (result2 == true) {
           path = `<audio preload="auto" loop autoplay="true" muted="muted">
                  <source src="./common/music/sound2.mp3">
                </audio>`;
        // } else {
        //    path = `<div id="display">
        //               <video autoplay muted loop>
        //               <source src="./common/images/Screensaver/atami3.mp4" type="video/mp4" >
        //               </video>
        //               </div>`;  
        // }
      }
      music.className = "music";
      music.innerHTML = path;

     window.setTimeout(timeMusic, settime);
     } // Note the parens here, we invoke these functions right away
    // { once: true }
  // );
// })();
timeMusic();
