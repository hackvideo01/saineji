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
    center: new google.maps.LatLng(35.08969903728947, 139.06380775082175),
    scaleControl: true,
    disableDefaultUI: true,
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

    //icon restaurant
  //   const iconBase ="./icon/";
  //   const icons = {
  //     restaurant: {
  //       icon: iconBase + "icon_res3.png",
  //     },
  //   };

  //    const features = [

  //   {
  //     position: new google.maps.LatLng(35.08814509970136, 139.06491286828478),
  //     type: "restaurant",
  //   },
  //   {
  //     position: new google.maps.LatLng(35.08906229683497, 139.05944969030708),
  //     type: "restaurant",
  //   },
  //   {
  //     position: new google.maps.LatLng(35.09175739656551, 139.06469609126518),
  //     type: "restaurant",
  //   },
  //   {
  //     position: new google.maps.LatLng(35.08720113363249, 139.06559731351564),
  //     type: "restaurant",
  //   },
  //   {
  //     position: new google.maps.LatLng(35.09185396200399, 139.06155254222483),
  //     type: "restaurant",
  //   },
  // ];

  // // Create markers.
  // for (let i = 0; i < features.length; i++) {
  //   const marker = new google.maps.Marker({
  //     position: features[i].position,
  //     icon: icons[features[i].type].icon,
  //     map: map,
  //   });
  // }
setMarkers(map, points);
  }

  //image insert
  // var img = document.createElement("img");
  // img.src = "./images/anime1.png";
  // var src = document.getElementById("content");
  // src.appendChild(img);

  var points = [
  ['name1', 35.09185396200399, 139.06155254222483, 12, './restaurant.php'],
  ['name2', 35.08720113363249, 139.06559731351564, 11, './restaurant.php'],
  ['name3', 35.09175739656551, 139.06469609126518, 10, './restaurant.php']
];

function setMarkers(map, locations) {
  // var shape = {
  //   coord: [1, 1, 1, 20, 18, 20, 18 , 1],
  //   type: 'poly'
  // };
  var image = "./icon/icon_res3.png";

  for (var i = 0; i < locations.length; i++) {
    var place = locations[i];
    var myLatLng = new google.maps.LatLng(place[1], place[2]);
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
