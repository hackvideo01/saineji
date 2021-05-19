
  //Maps setting
  let map;
  let markers = [];
  const local = { lat: 35.09610968675411, lng: 139.0747269981446 };

  /**
  * The CenterControl adds a control to the map that recenters the map on
  * Chicago.
  * This constructor takes the control DIV as an argument.
  * @constructor
  */
  function bigImg(x) {
  x.style.height = "64px";
  x.style.width = "64px";
}

function normalImg(x) {
  x.style.height = "32px";
  x.style.width = "32px";
}
  function CenterControl(controlDiv, map) {

    controlDiv.style.clear = "both";
  // Set CSS for the control border.
  // const controlUI = document.createElement("div");
  // controlUI.classList.add("main-menu");
  // controlUI.title = "クリックして現在地が戻る";
  // controlDiv.appendChild(controlUI);
  // Set CSS for the control interior.
  // var reload = '<i style="font-size:20px" class="fa">&#xf021;</i>';
  // const controlText = document.createElement("div");
  // controlText.style.color = "rgb(25,25,25)";
  // controlText.style.fontFamily = "Roboto,Arial,sans-serif";
  // controlText.style.fontSize = "20px";
  // controlText.style.lineHeight = "38px";
  // controlText.style.paddingLeft = "5px";
  // controlText.style.paddingRight = "5px";
  // controlText.innerHTML = "現在地 " + reload;
  // controlUI.appendChild(controlText);

  const drink = document.createElement("div");
  var iconDrink = '<img id = "iconDrink" src="./common/icon/drink.png"/>';
  drink.id = "drink";
  drink.classList.add("drink-menu");
  drink.title = "夜遊び";
  // onclick get data
  drink.addEventListener("click", () => {
     url = "./category_nightlife.php";
     // var allowClose = true;
          $.fancybox.open({
        src  : this.url,
        type : 'iframe',
        opts : {
        modal: true,
          afterShow : function( instance, current ) {
            // allowClose = false;
            console.info( 'done!' );
          }
        }
      });
      

      // setMarkers("drink");
      // document.getElementById("menu1").style.display = 'none';
       // document.getElementById("menu2").style.display = 'none';
       // document.getElementById("Categoly_nightlife").style.display = 'contents';
       // $(document).ready(function(){
       //    $( "#Categoly_nightlife" ).show( "slow" );
       //  });
       // document.getElementById("btn_event").style.display = 'none';
       // document.getElementById("banner").style.display = 'none';
       // $(function(){
       //   $('#map').css('height', function(index,value){
       //       return parseFloat( value ) + 270;
       //        });
       //    });
  });
  controlDiv.appendChild(drink);
  // Set CSS for the control interior.
  var drink_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  const controlText_drink = document.createElement("div");
  controlText_drink.style.color = "white";
  controlText_drink.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText_drink.style.fontSize = "20px";
  // controlText_eat.style.lineHeight = "38px";
  controlText_drink.style.marginTop = "10px";
  // controlText_touch.style.paddingLeft = "5px";
  // controlText_touch.style.paddingRight = "5px";
  controlText_drink.innerHTML = "　"+iconDrink+"夜遊び";

  drink.appendChild(controlText_drink);

  // const touch = document.createElement("div");
  // touch.id = "touch";
  // touch.classList.add("touch-menu");
  // touch.title = "TAP";
  
  // touch.style.marginRight = "25px";
  // touch.style.backgroundColor = "#BCB7BD";
  // touch.style.border = "0.1px solid #fff";
  // touch.style.borderRadius = "50%";
  // touch.style.boxShadow = "0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125)";
  // touch.style.cursor = "pointer";
  // // touch.style.marginBottom = "22px";
  // touch.style.zIndex = "-1";
  // touch.style.position = "absolute";
  // touch.style.textAlign = "center";
  // touch.style.height = "5em";
  // touch.style.width = "5em";
  // touch.style.top = "90px";
  // touch.title = "食べる";
  // controlDiv.appendChild(touch);
  // Set CSS for the control interior.
  // var touch_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  // const controlText_touch = document.createElement("div");
  // controlText_touch.style.color = "white";
  // controlText_touch.style.fontFamily = "Roboto,Arial,sans-serif";
  // controlText_touch.style.fontSize = "15px";
  // // controlText_touch.style.lineHeight = "38px";
  // controlText_touch.style.marginTop = "5px";
  // // controlText_touch.style.paddingLeft = "5px";
  // // controlText_touch.style.paddingRight = "5px";
  // controlText_touch.innerHTML = "TAP<br>"+touch_icon;
  // touch.appendChild(controlText_touch);


  const eat = document.createElement("div");
  var iconEat = '<img id = "iconEat" src="./common/icon/restaurant_iconmap.png"/>';
  eat.id = "eat";
  eat.classList.add("eat-menu");
  eat.title = "食べる";
   // onclick get data
  eat.addEventListener("click", () => {
      // setMarkers("eat");
      // $(document).ready(function(){
      //                 categoly();
      //           });
      // function categoly(){
      //     // document.getElementById("Categoly").style.display = 'contents';
      //     document.getElementById("btn_event").style.display = 'none';
      //     // document.getElementById("banner").style.display = 'none';
      //     $(document).ready(function(){
      //     $( "#Categoly" ).show( "slow" );
      //   });
      // };

      url = "./category_eat.php";
          $.fancybox.open({
        src  : this.url,
        type : 'iframe',
        iframe: {
      scrolling : 'auto',
      inline: true,
      ajax: true,
    },
        opts : {
        modal: true,
          afterShow : function( instance, current ) {
            console.info( 'done!' );
            
          }
        }
      });
  });
  controlDiv.appendChild(eat);
  // Set CSS for the control interior.
  var eat_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  const controlText_eat = document.createElement("div");
  controlText_eat.style.color = "white";
  controlText_eat.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText_eat.style.fontSize = "20px";
  // controlText_eat.style.lineHeight = "38px";
  controlText_eat.style.marginTop = "10px";
  // controlText_touch.style.paddingLeft = "5px";
  // controlText_touch.style.paddingRight = "5px";
  controlText_eat.innerHTML = "　"+iconEat+"食べる";
  eat.appendChild(controlText_eat);

  const news = document.createElement("div");
  var iconNews = '<img id = "iconNews" src="./common/icon/newsicon.png"/>';
  news.id = "news";
  news.classList.add("news-menu")
  news.title = "News";
  // onclick get data
  news.addEventListener("click", () => {
      setMarkers("news");
  });
  controlDiv.appendChild(news);
  // Set CSS for the control interior.
  // var eat_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  const controlText_news = document.createElement("div");
  controlText_news.style.color = "white";
  controlText_news.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText_news.style.fontSize = "20px";
  // controlText_eat.style.lineHeight = "38px";
  controlText_news.style.marginTop = "12px";
  // controlText_touch.style.paddingLeft = "5px";
  // controlText_touch.style.paddingRight = "5px";
  controlText_news.innerHTML = "　"+iconNews+"News";

  news.appendChild(controlText_news);

  const view = document.createElement("div");
  var iconView = '<img id = "iconView" src="./common/icon/tour_icon.png"/>';
  view.id = "view";
  view.classList.add("tour-menu");
  view.title = "観光";
  // onclick get data
  view.addEventListener("click", () => {
      setMarkers("tour");
  });
  controlDiv.appendChild(view);
  // Set CSS for the control interior.
  // var drink_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  const controlText_view = document.createElement("div");
  controlText_view.style.color = "white";
  controlText_view.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText_view.style.fontSize = "20px";
  // controlText_eat.style.lineHeight = "38px";
  controlText_view.style.marginTop = "10px";
  // controlText_touch.style.paddingLeft = "5px";
  // controlText_touch.style.paddingRight = "5px";
  controlText_view.innerHTML = iconView+"観光";
  view.appendChild(controlText_view);

  const homestay = document.createElement("div");
  var iconHomestay = '<img id = "iconHomestay" src="./common/icon/house-icon.png"/>';
  homestay.id = "homestay";
  homestay.classList.add("homestay-menu");

  homestay.title = "泊まる";
  // onclick get data
  homestay.addEventListener("click", () => {
      setMarkers("homestay");
  });
  controlDiv.appendChild(homestay);
  // Set CSS for the control interior.
  // var drink_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  const controlText_homestay = document.createElement("div");
  controlText_homestay.style.color = "white";
  controlText_homestay.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText_homestay.style.fontSize = "20px";
  // controlText_eat.style.lineHeight = "38px";
  controlText_homestay.style.marginTop = "10px";
  // controlText_touch.style.paddingLeft = "5px";
  // controlText_touch.style.paddingRight = "5px";
  controlText_homestay.innerHTML = "　"+iconHomestay+"泊まる";
  homestay.appendChild(controlText_homestay);

  //追加
  const time = document.createElement("div");
  var iconTime = '<img id = "iconTime" src="./common/icon/time.png"/>';
  time.id = "time";
  time.classList.add("time-menu");

  time.title = "　";
  // onclick get data
  time.addEventListener("click", () => {
      setMarkers("time",0);
  });
  controlDiv.appendChild(time);
  // Set CSS for the control interior.
  // var drink_icon = '<i style="font-size:20px;margin-top: 5px;" class="fa">&#xf25a;</i>';
  const controlText_time = document.createElement("div");
  controlText_time.style.color = "white";
  controlText_time.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText_time.style.fontSize = "20px";
  // controlText_eat.style.lineHeight = "38px";
  controlText_time.style.marginTop = "10px";
  // controlText_touch.style.paddingLeft = "5px";
  // controlText_touch.style.paddingRight = "5px";
  controlText_time.innerHTML = "　" + iconTime+"時刻表";
  time.appendChild(controlText_time);


  // Setup the click event listeners: simply set the map to Chicago.
  // controlUI.addEventListener("click", () => {
  //   map.setCenter(new google.maps.LatLng(35.08969903728947, 139.06380775082175));
  // });
  }
  function CenterControl1(controlDiv1, map) {

  // Set CSS for the control border.
  const controlUI = document.createElement("div");
  controlUI.classList.add("main-menu");
  controlUI.title = "クリックして現在地が戻る";
  controlDiv1.appendChild(controlUI);
  // Set CSS for the control interior.
  // var reload = '<i style="font-size:20px" class="fa">&#xf021;</i>';
  var iconLocal = '<img id = "iconLocal" src="./common/icon/local.png"/>'
  const controlText = document.createElement("div");
  controlText.style.color = "rgb(25,25,25)";
  controlText.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText.style.fontSize = "20px";
  controlText.style.lineHeight = "46px";
  // controlText.style.paddingLeft = "5px";
  // controlText.style.paddingRight = "5px";
  controlText.style.color = "white";
  controlText.innerHTML = iconLocal + "現在地を表示 ";
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to Chicago.
  controlUI.addEventListener("click", () => {
    map.setCenter(new google.maps.LatLng(35.09610968675411, 139.0747269981446));
  });
  }

  //Function define MAP
  const atami = {
    north: 35.150833,
    south: 35.024722,
    west:  139.027778,
    east:  139.176667,
  };

  const currentScript = document.currentScript;
      
  function initMap() {
    // infowindow = new google.maps.InfoWindow();
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 17,
      zoomControl: true,
      gestureHandling: 'greedy',
    // mapTypeId: google.maps.MapTypeId.TERRAIN,
      mapTypeId: google.maps.MapTypeId.ROADMAP, 
      styles: [ 
        { 
          "featureType": "poi", 
          "stylers": [ 
            { "visibility": "off" } 
          ] 
        } 
      ] ,
    center: new google.maps.LatLng(35.09610968675411, 139.0747269981446),
    clickableIcons: false,
    restriction: {
      latLngBounds: atami,
      strictBounds: false,
    },
    scaleControl: true,
    disableDefaultUI: true,

  });


    // Create the DIV to hold the control and call the CenterControl()
    // constructor passing in this DIV.
    const centerControlDiv = document.createElement("div");
    centerControlDiv.id = "btn_event"
    CenterControl(centerControlDiv, map);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(centerControlDiv);
    
    const centerControlDiv1 = document.createElement("div");
    CenterControl1(centerControlDiv1, map);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(centerControlDiv1);

    //Marked place
    const marker = new google.maps.Marker({
      position: local,
      map: map,
    });

    //塾海うまいもんMAP display in MAP
    // infoWindow = new google.maps.InfoWindow();
    // const locationButton = document.createElement("button");
    // locationButton.textContent = "熱海うまいもんMAP";
    // locationButton.style.backgroundColor = "#01B0EF";
    // locationButton.style.color = "white";
    // locationButton.style.padding = "5px";
    // locationButton.style.border = "0px solid white";
    // locationButton.classList.add("custom-map-control-button");
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(locationButton);

    // setMarkers();

    //set null time out screen = null
    let timeoutId = null;

    //auto reload Map per 20 minutes 
    // let timeout =
    //     (currentScript && Number(currentScript.getAttribute("timeout"))) ||
    //     2000000;

    //   function disable() {
    //     timeoutId && clearTimeout(timeoutId);
    //     timeoutId = setTimeout(initMap, timeout);
    //   }

    // disable();
      // document.addEventListener("touchstart", disable);
      // document.addEventListener("mousemove", disable);
      // document.addEventListener("keydown", disable);
      // document.addEventListener("scroll", disable);
  }
  function setMarkers(action,id) {
     for (let i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
    
    // if (action=="eat") {
    //   image = "./common/icon/restaurant_iconmap.png";
    //   url = "./restaurant_modal.php?id=";
    // }else 
    if(action=="homestay"){
      image = "./common/icon/house-icon.png";
      url = "./hotel_modal.php?id=";
    }else if(action=="tour"){
      image = "./common/icon/tour_icon.png";
      url = "./tour_modal.php?id=";
    }else if(action=="time"){
      url = "./time_modal.php";
          $.fancybox.open({
        src  : this.url,
        type : 'iframe',
        opts : {
          afterShow : function( instance, current ) {
            console.info( 'done!' );
          }
        }
      });
    }else if(action=="news"){
      url = "./news_modal.php";
          $.fancybox.open({
        src  : this.url,
        type : 'iframe',
        opts : {
          afterShow : function( instance, current ) {
            console.info( 'done!' );
          }
        }
      });
    }     
    
    $.ajax({
    url : "getdatamap.php",
    type: "POST",
    data : {
      id:id,
      vw_ctl:action
    },
    success: function(response){
     
      marker = [];
      var locations = [];
      if(response!=""){
        locations = JSON.parse(response);  
      }
      for (var i = 0; i < locations.length; i++) {
        var latitude = locations[i].lat;
        var longtude = locations[i].lng;
        var url_id   = locations[i].id;
        var name     = locations[i].name;

        var place = locations[i];
        var myLatLng = new google.maps.LatLng(latitude, longtude);
        const marker = new MarkerWithLabel({
          position: myLatLng,
          map: map,
          icon: image,
          labelContent: name,
          labelAnchor: new google.maps.Point(-28, -3),
          labelClass: "label",
          url: url + url_id,
          animation: google.maps.Animation.DROP,
        });
        // marker.setMap(map);
        markers.push(marker);
        // const contentString =
        // '<a style="color:blue;text-decoration: underline;" data-fancybox data-type="iframe" data-src="./restaurant_modal.php?id='+url_id+'""'+ 
 
        // 'href="javascript:;">'+
        // '飲食店詳細ページへ'+
        // '</a>';

    // '<a href="http://localhost/atami/restaurant.php?id='+url_id+'"'+ 
    // "data-fancybox data-options='{'type': 'iframe', 'iframe' : {'preload' : false, 'css' : {'width' : '600px'}}}'>das</a>";

    // const infowindow = new google.maps.InfoWindow({
    //   content: contentString,
    //   zIndex: 2,
    //   disableAutoPan: false,
    //   maxWidth:1300
    // });
    google.maps.event.addListener(marker, 'click', function() {

      // window.location.href = this.url;
      // infowindow.open(map, marker);
      // window.setContent = this.name;

     // infowindow.open(map, this);

      $.fancybox.open({
        src  : this.url,
        type : 'iframe',
         opts : {
          modal: true,
          afterShow : function( instance, current ) {
            console.info( 'done!' );
          }
        }
      });

    });
    }
    }
  });
}

$(document).bind("contextmenu",function(e){
  return false;
    });