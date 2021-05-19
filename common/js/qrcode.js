function onReadyRestaurant(){
var qrcode1 = document.getElementById("qrcode_restaurant1");
if(qrcode1!=null){
	qrcode1 = qrcode1.value;
}else{
	qrcode1 = "https://www.city.atami.lg.jp";
}
var qrcode2 = document.getElementById("qrcode_restaurant2");
if(qrcode2!=null){
	qrcode2 = qrcode2.value;
}else{
	qrcode2 = "https://www.city.atami.lg.jp";
}
// var qrcode2 = document.getElementById("qrcode").value;
// alert(qrcode1);
var qrcode1 = new QRCode("qr_restaurant1", {
	text:qrcode1,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});

var qrcode2 = new QRCode("qr_restaurant2", {
	text:qrcode2,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}


function onReadyHotel(){

var qrcode = document.getElementById("qrcode_hotel").value;
// alert(qrcode1);
var qrcode = new QRCode("qr_hotel", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}

function onReadyTour(){

var qrcode = document.getElementById("qrcode_tour").value;
// alert(qrcode1);
var qrcode = new QRCode("qr_tour", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}

function onReadyTime(){

var qrcode = document.getElementById("qrcode_time").value;
// alert(qrcode1);
var qrcode = new QRCode("qr_time", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}

function onReadyPhone(){

var qrcode = document.getElementById("qrcode_phone").value;
// alert(qrcode1);
var qrcode = new QRCode("qr_phone", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}

function onReadyNewsRight(){

var qrcode = document.getElementById("qrcode_spa").value;
// alert(qrcode1);
var qrcode = new QRCode("qr_spa", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});

var qrcode = document.getElementById("qrcode_tour").value;
var qrcode = new QRCode("qr_tour", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}

function onReadyNewsLeft(){

var qrcode = document.getElementById("qrcode_news").value;
    qrcode = new QRCode("qr_news", {
	text:qrcode,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}