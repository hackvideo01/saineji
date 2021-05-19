
      // window.document.addEventListener("touchstart", press);
      // window.document.addEventListener('touchmove',press);
      // window.document.addEventListener('touchend', press);
      // window.document.addEventListener('touchcancel', press);
      $(document).ready(function(){
        document.getElementById("body").addEventListener("touchstart", function() {
              $("body").trigger('click');

          $("html").click(function(e) {
          e.stopPropagation();
        });
        });
      });
        
