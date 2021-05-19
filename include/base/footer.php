<script src="./common/js/lightbox.js"></script>

<script>
// $(function(){
// 	$("#datepicker").datepicker();
// 	$('.monthpicker').MonthPicker({ Button: false });
// });
//ページング初期表示
var urlHash = location.hash;
if(urlHash) {
	showFirst(urlHash);
}
//ページング表示切替
function show(pageNumber){
	var page="#page-"+pageNumber;
	$('.selection').hide()
	$(page).show()
}
function showFirst(pageNumber){
	var page=pageNumber;
	$('.selection').hide()
	$(page).show()
}

</script>
</body>
</html>
<?

include("./template/inc/footer.html");

?>