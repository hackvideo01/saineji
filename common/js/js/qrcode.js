function onReady(){
var qrcode1 = document.getElementById("qrcode1").value;
var qrcode2 = document.getElementById("qrcode2");
// alert(qrcode1);
var qrcode = new QRCode("qr1", {
	text:qrcode1,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});

var qrcode = new QRCode("qr2", {
	text:qrcode2,
	width:150,
	height:150,
	colorDark:"#000000",
	colorLight:"#ffffff",
	correctLevel:QRCode.CorrectLevel.H
});
}