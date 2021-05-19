
//Get baner News

function getbanerNews() {
		var action = "news";
		$.ajax({
		    url : "./getbanerNews.php",
		    type: "POST",
		    data : {
		      vw_ctl:action
		    },
		    success: function(response){
		    	if(response!=""){
		        	var  news = JSON.parse(response);  
		        }else{
		        	return;
		        }
		        for(var i=0; i<news.length ; i+=2){
		        	const div = document.createElement("div");
					// div.className="news"
		            var innerHTML =  `<div style="display: flex; width: 100%;">
              								<img id="baner" onclick="setnews(`+news[i].id+`)" src="`+news[i].b+`" >`;
              			
              								if ((i+1)<news.length) {
              			innerHTML +=	    `<img id="baner" onclick="setnews(`+news[i+1].id+`)" src="`+news[i+1].b+`" >`;
              			
              								}else{
              			innerHTML +=	    ``;
              								
              								}
		            
		            	innerHTML += `</div>`;
		            div.innerHTML = innerHTML;
  					document.getElementById('newsLeft').appendChild(div);
		    }
		}
	});
}
getbanerNews();