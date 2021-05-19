 //Maps setting
  let map;

  const local = { lat: 35.08969903728947, lng: 139.06380775082175 };

  /**
   * The CenterControl adds a control to the map that recenters the map on
   * Chicago.
   * This constructor takes the control DIV as an argument.
   * @constructor
   */
  function CenterControl(controlDiv, map) {
    // Set CSS for the control border.
    const controlUI = document.createElement("div");
    controlUI.style.marginRight = "25px";
    controlUI.style.backgroundColor = "#fff";
    controlUI.style.border = "2px solid #fff";
    controlUI.style.borderRadius = "3px";
    controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
    controlUI.style.cursor = "pointer";
    controlUI.style.marginBottom = "22px";
    controlUI.style.textAlign = "center";
    controlUI.title = "Click to recenter the map";
    controlDiv.appendChild(controlUI);
    // Set CSS for the control interior.
    var reload = '<i style="font-size:20px" class="fa">&#xf021;</i>';
    const controlText = document.createElement("div");
    controlText.style.color = "rgb(25,25,25)";
    controlText.style.fontFamily = "Roboto,Arial,sans-serif";
    controlText.style.fontSize = "20px";
    controlText.style.lineHeight = "38px";
    controlText.style.paddingLeft = "5px";
    controlText.style.paddingRight = "5px";
    controlText.innerHTML = "現在地 " + reload;
    controlUI.appendChild(controlText);
    // Setup the click event listeners: simply set the map to Chicago.
    controlUI.addEventListener("click", () => {
      map.setCenter(new google.maps.LatLng(35.08969903728947, 139.06380775082175));
    });
  }

  //Function define MAP
  function initMap() {
    infowindow = new google.maps.InfoWindow();
    map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(35.08969903728947, 139.06380775082175),
    scaleControl: true,
    disableDefaultUI: true,
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
    },
    navigationControl: true,
    navigationControlOptions: {
        style: google.maps.NavigationControlStyle.ZOOM_PAN
    }
    });


    // Create the DIV to hold the control and call the CenterControl()
    // constructor passing in this DIV.
    const centerControlDiv = document.createElement("div");
    CenterControl(centerControlDiv, map);
    map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(centerControlDiv);

    //Marked place
    const marker = new google.maps.Marker({
      position: local,
      map: map,
    });

    //塾海うまいもんMAP display in MAP
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "塾海うまいもんMAP";
    locationButton.style.backgroundColor = "#01B0EF";
    locationButton.style.color = "white";
    locationButton.style.padding = "5px";
    locationButton.style.border = "0px solid white";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(locationButton);

  
setMarkers(map, points);
  }


  var points = [
  ['name1', 35.09185396200399, 139.06155254222483, 12, './index.php'],
  ['name2', 35.08720113363249, 139.06559731351564, 11, './index.php'],
  ['name3', 35.09175739656551, 139.06469609126518, 10, './index.php']
];

var bounds = new google.maps.LatLngBounds();

function setMarkers(map, locations) {
var pt = new google.maps.LatLng(lat, lng);
    bounds.extend(pt);
  var image = "./icon/icon_res3.png";

  for (var i = 0; i < locations.length; i++) {
    var place = locations[i];
    var myLatLng = new google.maps.LatLng(lat, lng);
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image,
      title: place[0],
      zIndex: place[3],
      url: place[4]
    });
    google.maps.event.addListener(marker, 'click', function() {
      window.location.href = this.url;
    });
  }
}
