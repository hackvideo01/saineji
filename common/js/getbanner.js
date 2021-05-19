function getbanner() {
		var action = "restaurant";
		$.ajax({
		    url : "./getbanner.php",
		    type: "POST",
		    data : {
		      vw_ctl:action
		    },
		    success: function(response){
	    	    if(response!=""){
		        	var  restaurant = JSON.parse(response);  
		        }else{
		        	return;
		        }
		        for(var i=0; i<restaurant.length ; i+=6){
		        	const div = document.createElement("div");
					div.className="swiper-slide"
					var innerHTML =`<div class="swiper-child">
						              	<div class="containerbn">
							              	<img src="`+restaurant[i].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_restaurant(`+restaurant[i].id+`)">
												<p id="text">`+restaurant[i].name+`</p>
										</div>
		              					`;
		              if((i+1)<restaurant.length){
		              	innerHTML +=  `
						              	<div class="containerbn">
							              	<img src="`+restaurant[i+1].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_restaurant(`+restaurant[i+1].id+`)">
												<p id="text">`+restaurant[i+1].name+`</p>
										</div>
						              	`;
		              }else{
		              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
							              	<div class="containerbn">
							              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_restaurant(`+nightobj.id+`)">
													<p id="text">`+nightobj.name+`</p>
											</div>	
							              		`;
		              }
		            innerHTML += `</div>`;
		            innerHTML += `<div class="swiper-child">`;
						if((i+2)<restaurant.length){
		              		innerHTML +=  `
							              	<div class="containerbn">
								              	<img src="`+restaurant[i+2].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_restaurant(`+restaurant[i+2].id+`)">
													<p id="text">`+restaurant[i+2].name+`</p>
											</div>
							              	`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
							              	<div class="containerbn">
							              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_restaurant(`+nightobj.id+`)">
													<p id="text">`+nightobj.name+`</p>
											</div>	
							              		`;
			            }
			            if((i+3)<restaurant.length){
		              		innerHTML +=  `
							              	<div class="containerbn">
								              	<img src="`+restaurant[i+3].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_restaurant(`+restaurant[i+3].id+`)">
													<p id="text">`+restaurant[i+3].name+`</p>
											</div>
							              	`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
							              	<div class="containerbn">
							              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_restaurant(`+nightobj.id+`)">
													<p id="text">`+nightobj.name+`</p>
											</div>	
							              		`;
			            }
		            innerHTML += `</div>`;
		            innerHTML += `<div class="swiper-child">`;
						if((i+4)<restaurant.length){
		              		innerHTML +=  `
							              	<div class="containerbn">
								              	<img src="`+restaurant[i+4].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_restaurant(`+restaurant[i+4].id+`)">
													<p id="text">`+restaurant[i+4].name+`</p>
											</div>
							              	`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
							              	<div class="containerbn">
							              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_restaurant(`+nightobj.id+`)">
													<p id="text">`+nightobj.name+`</p>
											</div>	
							              		`;
			            }
			            if((i+5)<restaurant.length){
		              		innerHTML +=  `
							              	<div class="containerbn">
								              	<img src="`+restaurant[i+5].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_restaurant(`+restaurant[i+5].id+`)">
													<p id="text">`+restaurant[i+5].name+`</p>
											</div>
							              	`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
							              	<div class="containerbn">
							              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_restaurant(`+nightobj.id+`)">
													<p id="text">`+nightobj.name+`</p>
											</div>	
		              					    `;
			            }
		            innerHTML += `</div>`;
		            div.innerHTML = innerHTML;
  					document.getElementById('restaurant').appendChild(div);
		        }
		        // $("#firtnightlife").remove();
		        // document.getElementById('firtnightlife').remove();
		        // $.getScript('./common/js/slide_image-touch.js');

		    }
		});
		var action1 = "nightlife";
		$.ajax({
		    url : "./getbanner.php",
		    type: "POST",
		    data : {
		      vw_ctl:action1
		    },
		    success: function(response){
		    	if(response!=""){
		        	var  restaurant = JSON.parse(response);  

		        }else{
		        	return;
		        }
		        for(var i=0; i<restaurant.length ; i+=6){
		        	const div = document.createElement("div");
					div.className="swiper-slide"
					var innerHTML =`<div class="swiper-child">
						<div class="containerbn">
			              	<img src="`+restaurant[i].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_nightlife(`+restaurant[i].id+`)">
								<p id="text">`+restaurant[i].name+`</p>
						</div>
		              	`;
		              if((i+1)<restaurant.length){
		              	innerHTML +=  `
		              	<div class="containerbn">	
		              		<img src="`+restaurant[i+1].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_nightlife(`+restaurant[i+1].id+`)">
								<p id="text">`+restaurant[i+1].name+`</p>
						</div>	
		              		`;
		              }else{
		              	var nightobj = randomProperty(restaurant)
		              	innerHTML +=  `
		              	<div class="containerbn">
		              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_nightlife(`+nightobj.id+`)">
								<p id="text">`+nightobj.name+`</p>
						</div>	
		              		`;
		              }
		            innerHTML += `</div>`;
		            innerHTML += `<div class="swiper-child">`;
						if((i+2)<restaurant.length){
		              		innerHTML +=  `
		              		<div class="containerbn">	
		              		<img src="`+restaurant[i+2].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_nightlife(`+restaurant[i+2].id+`)">
								<p id="text">`+restaurant[i+2].name+`</p>
						</div>	
		              		`;
			            }else{
			              		var nightobj = randomProperty(restaurant)
		              	innerHTML +=  `
		              	<div class="containerbn">
		              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_nightlife(`+nightobj.id+`)">
								<p id="text">`+nightobj.name+`</p>
						</div>	
		              		`;
			            }
			            if((i+3)<restaurant.length){
		              		innerHTML +=  `
		              		<div class="containerbn">	
		              		<img src="`+restaurant[i+3].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_nightlife(`+restaurant[i+3].id+`)">
								<p id="text">`+restaurant[i+3].name+`</p>
						</div>	
		              		`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
		              		<div class="containerbn">
		              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_nightlife(`+nightobj.id+`)">
								<p id="text">`+nightobj.name+`</p>
						</div>	
		              		`;
			            }
		            innerHTML += `</div>`;
		            innerHTML += `<div class="swiper-child">`;
						if((i+4)<restaurant.length){
		              		innerHTML +=  `
		              	<div class="containerbn">	
		              		<img src="`+restaurant[i+4].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_nightlife(`+restaurant[i+4].id+`)">
								<p id="text">`+restaurant[i+4].name+`</p>
						</div>	
		              		`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
		              	<div class="containerbn">
		              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_nightlife(`+nightobj.id+`)">
								<p id="text">`+nightobj.name+`</p>
						</div>	
		              		`;
			            }
			            if((i+5)<restaurant.length){
		              		innerHTML +=  `
		              	<div class="containerbn">	
		              		<img src="`+restaurant[i+5].p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;" onclick="get_nightlife(`+restaurant[i+5].id+`)">
								<p id="text">`+restaurant[i+5].name+`</p>
						</div>	
		              		`;
			            }else{
			              	var nightobj = randomProperty(restaurant)
		              		innerHTML +=  `
		              	<div class="containerbn">
		              		<img src="`+nightobj.p+`" style="width:88%; height: 125px;margin-top: 10px;border-radius: 10px;"  onclick="get_nightlife(`+nightobj.id+`)">
								<p id="text">`+nightobj.name+`</p>
						</div>	
		              		`;
			            }
		            innerHTML += `</div>`;
		            div.innerHTML = innerHTML;
  					document.getElementById('nightlife').appendChild(div);
		        }
		        $.getScript('./common/js/slide_image-touch.js');
		    }
		});
}
function randomProperty(obj) {
    var keys = Object.keys(obj);
    return obj[keys[ keys.length * Math.random() << 0]];
};
getbanner();