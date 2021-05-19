<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather app</title>
    <!-- <link rel="stylesheet" href="styles.css" /> -->
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,700;1,600&display=swap" rel="stylesheet">
</head>
<style type="text/css">
	* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'Lora', serif;
}
.container {
  height: 100vh;
  width: 100vw;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background: rgb(251, 242, 133);
  background: radial-gradient(
    circle,
    rgba(251, 242, 133, 0.6334908963585435) 0%,
    rgba(224, 196, 91, 0.8407738095238095) 35%,
    rgba(230, 224, 113, 1) 100%
  );
}
.weather {
  display: flex; 
  align-items: center;
  margin: 15px 0;
  font-size: 1.5rem;
}
#location {
  font-size: 3rem;
  font-weight: 800;
  font-style: italic;
}
.desc {
  font-size: 1.25rem;
  text-transform: capitalize;
}
.circle {
  background-color: black;
  border-radius: 50px;
  height: 15px;
  width: 15px;
  margin: 0 15px;
}
</style>
<body>
    <div class="container">
        <img src="" alt="" srcset="" id="weather-icon">
        <div id="location">Unable to Fetch Weather</div>
        <div class="desc">No Information Available.</div>
        <div class="weather">
            <div class="c">Error</div>
            <div class="circle"></div>
            <div class="f">Error</div>
        </div>
        <div class="info">
            <h4>Sunrise: <span class="sunrise">No Information Available</span></h4>
            <h4>Sunset: <span class="sunset">No Information Available</span></h4>
        </div>

    </div>
    <script src="./common/js/weather.js"></script>
</body>

</html>