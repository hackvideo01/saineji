var limit = 4;
				$(document).ready(function(){
				    $('#Image').change(function(){
				        var files = $(this)[0].files;
				        if(files.length > limit){
				            // alert("最大は "+limit+" 画像です。");
				            document.getElementById("amount_file").innerHTML = "最大は "+limit+" 画像です。";
				            $('#Image').val('');
				            return false;
				        }else{
				            return true;
				        }
				    });
				});