
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
  function CenterControl1(controlDiv1, map) {

  // Set CSS for the control border.
  const controlUI = document.createElement("div");
  controlUI.classList.add("main-menu");
  controlUI.title = "クリックして現在地が戻る";
  controlDiv1.appendChild(controlUI);
  // Set CSS for the control interior.
  var iconLocal = '<img id = "iconLocal" src="./common/icon/local.png"/>'
  const controlText = document.createElement("div");
  controlText.style.color = "rgb(25,25,25)";
  controlText.style.fontFamily = "Roboto,Arial,sans-serif";
  controlText.style.fontSize = "15px";
  // controlText.style.lineHeight = "38px";
  controlText.style.paddingLeft = "5px";
  controlText.style.paddingRight = "5px";
  controlText.style.color = "white";
  controlText.innerHTML = iconLocal + "現在地を表示";
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
    infowindow = new google.maps.InfoWindow();
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 17,
      zoomControl: true,
      gestureHandling: 'greedy',
    // mapTypeId: google.maps.MapTypeId.TERRAIN,
     mapTypeId: google.maps.MapTypeId.ROADMAP, 
     animation: google.maps.Animation.DROP,
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

    setMarkers();

  //    map.addListener('zoom_changed', function() {
  //   for (var i = 0; i < markers.length; i++) {
  //     if (map.getZoom() > 18) {
  //       // markers[i].setLabel(markers[i].getLabel());
  //       markers[i].setLabel(markers[i].getTitle());

  //     } else if (map.getZoom()<18) {
  //       markers[i].setLabel(null);
  //     }
  //   }
  // });

    //set null time out screen = null
    let timeoutId = null;

  }


  function setMarkers(action,id) {
     for (let i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
    
    if (action=="eat") {
      image = {
        url:"./common/icon/restaurant_iconmap.png",
      };
      url = "./restaurant_modal.php?id=";
    }else if(action=="drink"){
      image = "./common/icon/drink.png";
      url = "./nightlife_modal.php?id=";
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
          // title: name,
          // label:name,
          labelContent: name,
          labelAnchor: new google.maps.Point(-28, -6),
          labelClass: "label",
          url: url + url_id,
          animation: google.maps.Animation.DROP,
        });
        // marker.setMap(map);
        markers.push(marker);
      
    google.maps.event.addListener(marker, 'click', function() {
       // map.setZoom(18);
       $.fancybox.defaults.hideScrollbar = false;

      $.fancybox.open({
        src  : this.url,
        type : 'iframe',
         opts : {
          // toolbar : false,
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